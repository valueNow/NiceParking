package cn.beatle.parking.view;

import android.app.Dialog;
import android.content.Context;
import android.os.Bundle;

import cn.beatle.parking.R;


public abstract class BaseWindow extends Dialog {

	public Context mContext;

	private boolean isCanceledOnTouchOutside = false;

	public BaseWindow(Context context) {
		super(context, R.style.LPDialogDimTheme);
		mContext = context;
		setCanceledOnTouchOutside(isCanceledOnTouchOutside);
	}

	public BaseWindow(Context context, int theme) {
		super(context, theme);
		mContext = context;
		setCanceledOnTouchOutside(isCanceledOnTouchOutside);
	}

	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		initContentView();
	}

	public abstract void initContentView();

	@Override
	public void dismiss() {
		super.dismiss();
	}

	@Override
	public void show() {
		super.show();
	}

}
