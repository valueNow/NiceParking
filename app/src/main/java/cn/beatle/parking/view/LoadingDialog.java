package cn.beatle.parking.view;

import android.content.Context;
import android.graphics.drawable.AnimationDrawable;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.ImageView;

import cn.beatle.parking.R;


public class LoadingDialog extends LPBaseDialog {

    private AnimationDrawable mAnim;

    public LoadingDialog(Context context, Builder builder) {
        super(context, R.style.LPDialogTranTheme, builder);
    }

    @Override
    public View createContentView() {
        mBuilder.contentView = LayoutInflater.from(mContext).inflate(R.layout.lp_dialog_loading_new, null);
        int res = R.drawable.car_anim_list;
        mAnim = (AnimationDrawable) mContext.getResources().getDrawable(res);
        ImageView imageView = (ImageView) mBuilder.contentView.findViewById(R.id.image);
        imageView.setImageDrawable(mAnim);
        mAnim.stop();
        mAnim.start();
        return mBuilder.contentView;
    }

    public void setContent(String content) {

    }

    public static class LoadingBuilder extends Builder {

        protected String content;

        public LoadingBuilder(Context context) {
            super(context);
        }

        public LoadingBuilder setContent(String content) {
            this.content = content;
            return this;
        }

        public LoadingDialog create() {
            return new LoadingDialog(context, this);
        }
    }

}
