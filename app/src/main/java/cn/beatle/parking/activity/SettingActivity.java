package cn.beatle.parking.activity;

import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AlertDialog;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import cn.beatle.parking.R;
import cn.beatle.parking.view.TitleBar;

public class SettingActivity extends BaseFragmentActivity implements View.OnClickListener {
    private AlertDialog dialog;
    private Button logoutBtn;
    private View changePwd, changeTel, changeCarNo, adviceFeed;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_setting);
        ((TitleBar) findViewById(R.id.title_bar)).setLeftBtnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });
        logoutBtn = findViewById(R.id.logout_button);
        if (isLogin()) {
            logoutBtn.setVisibility(View.VISIBLE);
            logoutBtn.setOnClickListener(this);
        }
        changePwd = findViewById(R.id.change_pwd_textView);
        changePwd.setOnClickListener(this);
//        DesignEffect.setSelectableItemBackgroundBorderless(this,changePwd,R.drawable.button_pressed_default_bg);
        changeTel = findViewById(R.id.change_tel_textView);
        changeTel.setOnClickListener(this);
//        DesignEffect.setSelectableItemBackgroundBorderless(this,changeTel,R.drawable.button_pressed_default_bg);
        changeCarNo = findViewById(R.id.change_carNo_textView);
        changeCarNo.setOnClickListener(this);
//        DesignEffect.setSelectableItemBackgroundBorderless(this,changeCarNo,R.drawable.button_pressed_default_bg);
        adviceFeed = findViewById(R.id.advice_textView);
        adviceFeed.setOnClickListener(this);
//        DesignEffect.setSelectableItemBackgroundBorderless(this,adviceFeed,R.drawable.button_pressed_default_bg);
    }

    private void logout() {
        if (dialog == null) {
            dialog = new AlertDialog.Builder(this).setMessage("确定要退出登录?")
                    .setPositiveButton("确定", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialogInterface, int i) {
                            clearData();
                            finish();
                        }
                    }).setNegativeButton("取消", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialogInterface, int i) {
                            dialogInterface.dismiss();
                        }
                    }).create();
        }
        dialog.show();
    }

    @Override
    public void onClick(View view) {
        switch (view.getId()) {
            case R.id.change_pwd_textView:
                if(isLogin()){
                    Intent updatePwd = new Intent(this,UpdatePwdActivity.class);
                    startActivity(updatePwd);
                }else{
                    Toast.makeText(this, "您未登录", Toast.LENGTH_SHORT).show();
                }
                break;
            case R.id.change_tel_textView:
                Toast.makeText(this, "敬请期待,马上开放", Toast.LENGTH_SHORT).show();
                break;
            case R.id.change_carNo_textView:
                Toast.makeText(this, "敬请期待,马上开放", Toast.LENGTH_SHORT).show();
                break;
            case R.id.advice_textView:
                Toast.makeText(this, "敬请期待,马上开放", Toast.LENGTH_SHORT).show();
                break;
            case R.id.logout_button:
                clearData();
                finish();
                break;
        }
    }
}
