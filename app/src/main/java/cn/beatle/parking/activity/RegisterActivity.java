package cn.beatle.parking.activity;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.loopj.android.http.AsyncHttpResponseHandler;

import cn.beatle.parking.utils.OSUtils;
import cn.beatle.parking.R;
import cn.beatle.parking.http.HttpUtil;
import cn.beatle.parking.http.Urls;
import cn.beatle.parking.view.TitleBar;

public class RegisterActivity extends BaseFragmentActivity implements View.OnClickListener {
    private EditText accountEt, passwordEt, phoneEt,carNoEt;
    private Button registerBtn;
    private TitleBar titleBar;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
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
        accountEt = findViewById(R.id.account_editText);
        passwordEt = findViewById(R.id.tel_editText);
        phoneEt = findViewById(R.id.phone_editText);
        carNoEt = findViewById(R.id.carNo_editText);
        registerBtn = findViewById(R.id.register_button);
        registerBtn.setOnClickListener(this);
        findViewById(R.id.register_tips).setOnClickListener(this);
    }

    @Override
    public void onClick(View view) {
        switch (view.getId()) {
            case R.id.register_button:
                register();
                break;
            case R.id.register_tips:
                jumpToLogin();
                break;
        }
    }

    private void register() {
        String account = accountEt.getText().toString();
        if (TextUtils.isEmpty(account)) {
            Toast.makeText(this, getResources().getString(R.string.account_empty), Toast.LENGTH_SHORT).show();
            return;
        }else if(!OSUtils.checkAccountName(account)){
                Toast.makeText(this, getResources().getString(R.string.account_rule), Toast.LENGTH_SHORT).show();
                return ;
        }
        String password = passwordEt.getText().toString();
        if (TextUtils.isEmpty(password)) {
            Toast.makeText(this, getResources().getString(R.string.password_empty), Toast.LENGTH_SHORT).show();
            return;

         //判断是否符合规范
        }else if(!OSUtils.checkPassword(password)){
            Toast.makeText(this, getResources().getString(R.string.password_rule), Toast.LENGTH_SHORT).show();
            return ;
        }

        String phone = phoneEt.getText().toString();
        if (TextUtils.isEmpty(phone)) {
            Toast.makeText(this, getResources().getString(R.string.phone_empty), Toast.LENGTH_SHORT).show();
            return;
        }else if(!OSUtils.checkPhoneNum(phone)){
            Toast.makeText(this, getResources().getString(R.string.phone_rule), Toast.LENGTH_SHORT).show();
            return ;
        }

        String carNo = carNoEt.getText().toString();
        if (TextUtils.isEmpty(carNo)) {
            Toast.makeText(this, getResources().getString(R.string.carNo_empty), Toast.LENGTH_SHORT).show();
            return;
        }else if(!OSUtils.isCarnumberNO(carNo)){
            Toast.makeText(this, getResources().getString(R.string.carNo_rule), Toast.LENGTH_SHORT).show();
            return;
        }
        StringBuilder register = new StringBuilder(Urls.REGISTER_URL);
        register.append("register_name=").append(account.trim()).append("&register_password=").append(password.trim())
                .append("&register_license_plate=").append(carNo.trim()).append("&register_tel=").append(phone.trim());
        HttpUtil.get(register.toString(),new AsyncHttpResponseHandler(){
            @Override
            public void onSuccess(int status, String s) {
                super.onSuccess(status, s);
                Log.i(RegisterActivity.class.getSimpleName()," result = "+s);
                if(status==200){
                    if("suc".equals(s)){
                        Toast.makeText(RegisterActivity.this, "注册成功,请前往登录页面登录", Toast.LENGTH_SHORT).show();
                        finish();
                    }else{
                        Toast.makeText(RegisterActivity.this, "register failure", Toast.LENGTH_SHORT).show();
                    }
                }
            }

            @Override
            public void onFailure(Throwable throwable) {
                super.onFailure(throwable);
            }

            @Override
            public void onFinish() {
                super.onFinish();
            }
        });
    }

    private void jumpToLogin() {
        Intent intent = new Intent(this,LoginActivity.class);
        startActivity(intent);
        finish();
    }
}
