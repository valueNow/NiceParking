package cn.beatle.parking.activity;

import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.loopj.android.http.AsyncHttpResponseHandler;

import cn.beatle.parking.R;
import cn.beatle.parking.http.HttpUtil;
import cn.beatle.parking.http.Urls;
import cn.beatle.parking.utils.OSUtils;
import cn.beatle.parking.view.TitleBar;

public class UpdatePwdActivity extends BaseFragmentActivity {
    private TitleBar titleBar;
    private EditText pwdEt, newPwdEt, confirmPwdEt;
    private Button submitBtn;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_update_pwd);
        initView();
    }

    private void initView() {
        titleBar = findViewById(R.id.title_bar);
        titleBar.showBottomLine(false);
        titleBar.setLeftBtnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });
        pwdEt = findViewById(R.id.password_edittext);
        newPwdEt = findViewById(R.id.new_password_editText);
        confirmPwdEt = findViewById(R.id.confirm_password_editText);
        submitBtn = findViewById(R.id.submit_button);
        submitBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                submit();
            }
        });
    }

    private void submit() {
        String pwd = pwdEt.getText().toString();
        if (TextUtils.isEmpty(pwd)) {
            Toast.makeText(this, getResources().getString(R.string.password_empty), Toast.LENGTH_SHORT).show();
            return;
        } else if (!OSUtils.checkPassword(pwd)) {
            Toast.makeText(this, getResources().getString(R.string.password_rule), Toast.LENGTH_SHORT).show();
            return;
        }

        String newPwd = newPwdEt.getText().toString();
        if (TextUtils.isEmpty(newPwd)) {
            Toast.makeText(this, getResources().getString(R.string.new_password_empty), Toast.LENGTH_SHORT).show();
            return;
        } else if (!OSUtils.checkPassword(newPwd)) {
            Toast.makeText(this, getResources().getString(R.string.password_rule), Toast.LENGTH_SHORT).show();
            return;
        }

        String confirmPwd = confirmPwdEt.getText().toString();
        if (TextUtils.isEmpty(confirmPwd)) {
            Toast.makeText(this, getResources().getString(R.string.confirm_password_empty), Toast.LENGTH_SHORT).show();
            return;
        } else if (!OSUtils.checkPassword(confirmPwd)) {
            Toast.makeText(this, getResources().getString(R.string.password_rule), Toast.LENGTH_SHORT).show();
            return;
        }

        if(!newPwd.equals(confirmPwd)){
            Toast.makeText(this, getResources().getString(R.string.confirm_error), Toast.LENGTH_SHORT).show();
            return;
        }
        StringBuilder updatePwd = new StringBuilder(Urls.UPDATE_PWD_URL);
        updatePwd.append("account_id=").append(getAccount())
                .append("&password=").append(confirmPwd.trim()).append("&oldpassword=").append(pwd.trim());
        HttpUtil.get(updatePwd.toString(),new AsyncHttpResponseHandler(){
            @Override
            public void onSuccess(int status, String s) {
                super.onSuccess(status, s);
                if(status==200){
                    if("suc".equals(s)){
                        Toast.makeText(UpdatePwdActivity.this,"修改密码成功，下次登录请使用新密码哦",Toast.LENGTH_SHORT).show();
                        finish();
                    }else{
                        Toast.makeText(UpdatePwdActivity.this,"修改密码失败",Toast.LENGTH_SHORT).show();
                    }
                }else{
                    Toast.makeText(UpdatePwdActivity.this,"修改密码失败",Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Throwable throwable) {
                super.onFailure(throwable);
                Toast.makeText(UpdatePwdActivity.this,"修改密码失败",Toast.LENGTH_SHORT).show();
            }

            @Override
            public void onFinish() {
                super.onFinish();
            }
        });

    }
}
