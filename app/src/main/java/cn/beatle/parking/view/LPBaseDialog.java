package cn.beatle.parking.view;

import android.content.Context;
import android.graphics.drawable.Drawable;
import android.util.TypedValue;
import android.view.Gravity;
import android.view.KeyEvent;
import android.view.View;
import android.view.WindowManager;
import android.widget.FrameLayout;
import android.widget.LinearLayout;

import cn.beatle.parking.R;


/**
 * 
 * @author coolyou
 * 
 */
public class LPBaseDialog extends BaseWindow implements ILPDialog {

	protected static final int INVALID = -1;

	protected Builder mBuilder;

	protected LinearLayout mNBDialogContainer;

	protected FrameLayout mHeaderContainer;

	protected FrameLayout mFooterContainer;

	protected FrameLayout mViewContainer;

	public LPBaseDialog(Context context, Builder builder) {
		super(context);
		mBuilder = builder;
	}

	public LPBaseDialog(Context context, int theme, Builder builder) {
		super(context, theme);
		mBuilder = builder;
	}

	@Override
	public void initContentView() {
		setContentView(R.layout.lp_dialog_root);
		mNBDialogContainer = (LinearLayout) findViewById(R.id.live_dialog_container);
		mHeaderContainer = (FrameLayout) findViewById(R.id.header_container);
		mFooterContainer = (FrameLayout) findViewById(R.id.footer_container);
		mViewContainer = (FrameLayout) findViewById(R.id.view_container);

		if (mBuilder.windowAnimations != INVALID) {
			getWindow().setWindowAnimations(mBuilder.windowAnimations);
		} else {
			getWindow().setWindowAnimations(
					getAnimationResource(mBuilder.gravity));
		}

		if (mBuilder.isFullscreen) {
			getWindow().setLayout(FrameLayout.LayoutParams.MATCH_PARENT,
					FrameLayout.LayoutParams.WRAP_CONTENT);
		}

		switch (mBuilder.gravity) {
		case CENTER:
			getWindow().setGravity(Gravity.CENTER);
			break;
		case TOP:
			getWindow().setGravity(Gravity.TOP);
			break;
		case BOTTOM:
			getWindow().setGravity(Gravity.BOTTOM);
			break;
		case RIGHT_BOTTOM:
			getWindow().setGravity(Gravity.BOTTOM| Gravity.RIGHT);
			break;
		default:
			break;
		}

		if (mBuilder.backgroud != null) {
			mNBDialogContainer.setBackgroundDrawable(mBuilder.backgroud);
		}

		if (mBuilder.params != null) {
			mNBDialogContainer.setLayoutParams(mBuilder.params);
		}

		if (mBuilder.attribute != null) {
			getWindow().setAttributes(mBuilder.attribute);
		}

		if (mBuilder.headerView == null) {
			View headerView = createHeaderView();

			if (headerView != null) {
				mHeaderContainer.addView(headerView);
			}

		} else {
			mHeaderContainer.addView(mBuilder.headerView);
		}

		if (mBuilder.contentView == null) {

			View contentView = createContentView();

			if (contentView != null) {
				mViewContainer.addView(contentView);
			}

		} else {
			mViewContainer.addView(mBuilder.contentView);
		}

		if (mBuilder.footerView == null) {

			View footerView = createFooterView();

			if (footerView != null) {
				mFooterContainer.addView(footerView);
			}

		} else {
			mFooterContainer.addView(mBuilder.footerView);
		}

	}

	public void setupContainerParams(int width, int height) {
		FrameLayout.LayoutParams params = new FrameLayout.LayoutParams(width,
				height);
		mNBDialogContainer.setLayoutParams(params);
	}

	@Override
	public void show() {
		super.show();

		mNBDialogContainer.setOnKeyListener(mOnKeyListener);
	}

	private View.OnKeyListener mOnKeyListener = new View.OnKeyListener() {
		@Override
		public boolean onKey(View v, int keyCode, KeyEvent event) {
			switch (event.getAction()) {
				case KeyEvent.ACTION_UP:
					if (keyCode == KeyEvent.KEYCODE_BACK) {
						dismiss();
						return true;
					}
					break;
			}
			return false;
		}
	};

	private int getAnimationResource(LPGravity gravity) {
		switch (gravity) {
		case TOP:
			return R.style.WindowSlideTopAnim;
		case BOTTOM:
			return R.style.WindowSlideBottomAnim;
		case CENTER:
			return R.style.WindowFadeAnim;
		case RIGHT_BOTTOM:
				return R.style.WindowSlideRightAnim;
		default:
		}
		return INVALID;
	}

	public float dp2px(float dp) {
		return TypedValue.applyDimension(TypedValue.COMPLEX_UNIT_DIP, dp,
				mBuilder.context.getResources().getDisplayMetrics());
	}

	public static class Builder {

		protected Context context;

		protected View footerView;
		protected View headerView;
		protected View contentView;
		protected LPGravity gravity = LPGravity.CENTER;
		public FrameLayout.LayoutParams params;
		public WindowManager.LayoutParams attribute;

		protected Drawable backgroud;

		protected boolean isFullscreen = false;

		public int windowAnimations = INVALID;

		public Builder(Context context) {
			if (context == null) {
				throw new NullPointerException("Context may not be null");
			}
			this.context = context;
		}

		public Builder setFooter(View view) {
			this.footerView = view;
			return this;
		}

		public Builder setHeader(View view) {
			this.headerView = view;
			return this;
		}

		public Builder setContentView(View view) {
			this.contentView = view;
			return this;
		}

		public Builder setDialogBackgroud(Drawable backgroud) {
			this.backgroud = backgroud;
			return this;
		}

		public Builder setGravity(LPGravity gravity) {
			this.gravity = gravity;
			return this;
		}

		public Builder setWindowAnimations(int windowAnimations) {
			this.windowAnimations = windowAnimations;
			return this;
		}

		public Builder setFullscreen(boolean isFullscreen) {
			this.isFullscreen = isFullscreen;
			return this;
		}

		public Builder setContainerParams(FrameLayout.LayoutParams params) {
			this.params = params;
			return this;
		}

		public Builder setContainerAttribute(WindowManager.LayoutParams attribute) {
			this.attribute = attribute;
			return this;
		}

		public LPBaseDialog create() {
			return new LPBaseDialog(context, this);
		}
	}

	@Override
	public View createContentView() {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public View createHeaderView() {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public View createFooterView() {
		// TODO Auto-generated method stub
		return null;
	}
}
