package cn.beatle.parking.utils;

import android.content.Context;
import android.os.Build;
import android.util.TypedValue;
import android.view.View;

/**
 * Created by coolyou on 2016/6/15.
 */
public class DesignEffect {

    /**
     * 无边界波纹效果
     * @param context
     * @param view
     * @param defaultResId
     */

    public static void setSelectableItemBackgroundBorderless(Context context, View view, int defaultResId) {

        try {
            if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.LOLLIPOP) {
                TypedValue outValue = new TypedValue();
                context.getTheme().resolveAttribute(android.R.attr.selectableItemBackgroundBorderless, outValue, true);
                view.setBackgroundResource(outValue.resourceId);
            } else {
                view.setBackgroundResource(defaultResId);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    /**
     * 有边界ripple效果
     * @param context
     * @param view
     * @param defaultResId
     */
    public static void setSelectableItemBackground(Context context, View view, int defaultResId) {
        try {
            if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.LOLLIPOP) {
                TypedValue outValue = new TypedValue();
                context.getTheme().resolveAttribute(android.R.attr.selectableItemBackground, outValue, true);
                view.setBackgroundResource(outValue.resourceId);
            } else {
                view.setBackgroundResource(defaultResId);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

}
