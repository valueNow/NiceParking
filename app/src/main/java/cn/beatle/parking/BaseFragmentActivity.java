package cn.beatle.parking;

import android.os.Build;
import android.os.Bundle;
import android.support.v4.app.FragmentActivity;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;

/**
 * @author coolyou|M
 */
public class BaseFragmentActivity extends FragmentActivity{


    private static final int STATUS_LOGIN_QQ = 1;
    private static final int STATUS_SHARE_QQ = STATUS_LOGIN_QQ+1;

    private static final int STATUS_LOGIN_SINA = STATUS_SHARE_QQ + 1;

    private int mCurrentStatus = 0;


    private boolean mSlideToFinishEnable = true;

    public static boolean isForeground = false;//极光推送

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if(isTransparencyStatus())setupTransparencyStatus();
        prepareSlideToFinish();

    }

    protected boolean isTransparencyStatus(){
        return true;
    }

    /**
     * 设置透明状态栏
     */
    protected void setupTransparencyStatus() {

        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.KITKAT
                && Build.VERSION.SDK_INT < Build.VERSION_CODES.LOLLIPOP) {
            getWindow().addFlags(
                    WindowManager.LayoutParams.FLAG_TRANSLUCENT_STATUS);

        } else if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.LOLLIPOP) {
            final Window window = getWindow();
            window.clearFlags(WindowManager.LayoutParams.FLAG_TRANSLUCENT_STATUS
                    | WindowManager.LayoutParams.FLAG_TRANSLUCENT_NAVIGATION);
            if (isLightStatusBar()) {
                window.getDecorView().setSystemUiVisibility(
                        View.SYSTEM_UI_FLAG_LAYOUT_FULLSCREEN | View.SYSTEM_UI_FLAG_LAYOUT_STABLE | View.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
            } else {
                window.getDecorView().setSystemUiVisibility(
                        View.SYSTEM_UI_FLAG_LAYOUT_FULLSCREEN | View.SYSTEM_UI_FLAG_LAYOUT_STABLE);
            }

            window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);
            window.setStatusBarColor(getResources().getColor(R.color.transparent));
        }

        if(isLightStatusBar())setupLightStatus();
    }

    protected void setupLightStatus(){
        if (OSUtils.isFlyme()) {
            StatusBarLight.setFlymeStatusBarLightMode(this,true);
        } else if (OSUtils.isMIUI()) {
            StatusBarLight.setMiuiStatusBarLightMode(this,true);
        }
    }

    protected boolean isLightStatusBar(){
        return true;
    }

    protected void setSlideToFinishEnable(boolean enable) {
        mSlideToFinishEnable = enable;
    }

    private void prepareSlideToFinish() {
        if (mSlideToFinishEnable) {
//            new SlideFinishFrameLayout(getApplicationContext()).attachToActivity(this);
        }
    }


    @Override
    protected void onResume() {
        super.onResume();
    }

    @Override
    protected void onPause() {
        super.onPause();
    }

    @Override
    public void finish() {
        super.finish();
    }

    @Override
    protected void onDestroy() {
        super.onDestroy();
    }

}