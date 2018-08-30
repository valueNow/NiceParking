package cn.beatle.parking.activity;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.loopj.android.http.AsyncHttpResponseHandler;

import cn.beatle.parking.Consts;
import cn.beatle.parking.utils.Prefs;
import cn.beatle.parking.R;
import cn.beatle.parking.http.HttpUtil;
import cn.beatle.parking.http.Urls;

public class LoginActivity extends BaseFragmentActivity implements View.OnClickListener {
    private EditText accountEt, passwordEt;
    private TextView forgetPWTv, registerTv;
    private Button loginBtn;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login_layout);
        initView();
    }

    private void initView() {
        accountEt = findViewById(R.id.account_editText);
        passwordEt = findViewById(R.id.password_editText);
        forgetPWTv = findViewById(R.id.forget_password);
        registerTv = findViewById(R.id.register_tips);
        loginBtn = findViewById(R.id.login_button);
        loginBtn.setOnClickListener(this);
        forgetPWTv.setOnClickListener(this);
        registerTv.setOnClickListener(this);
    }

    @Override
    public void onClick(View view) {
        switch (view.getId()) {
            case R.id.forget_password:
                Intent retrieve = new Intent(this, RetrievePwdActivity.class);
                startActivity(retrieve);
                break;
            case R.id.register_tips:
                Intent register = new Intent(this, RegisterActivity.class);
                startActivity(register);
                break;
            case R.id.login_button:
                login();
                break;
        }
    }

    private void login() {
        final String account = accountEt.getText().toString();
        if (TextUtils.isEmpty(account)) {
            Toast.makeText(this, getResources().getString(R.string.account_empty), Toast.LENGTH_SHORT).show();
            return;
        }
        String password = passwordEt.getText().toString();
        if (TextUtils.isEmpty(password)) {
            Toast.makeText(this, getResources().getString(R.string.password_empty), Toast.LENGTH_SHORT).show();
            return;
        }
        StringBuilder login = new StringBuilder(Urls.LOGIN_URL);
        login.append("login_name=").append(account.trim()).append("&password=").append(password.trim());
        HttpUtil.get(login.toString(), new AsyncHttpResponseHandler() {
            @Override
            public void onSuccess(int status, String result) {
                super.onSuccess(status, result);
                Log.i(LoginActivity.class.getSimpleName(), " status = " + status + " result = " + result+" s = "+result);
                if(status==200){
                    if("err".equals(result)){
                        Toast.makeText(LoginActivity.this,"登录失败",Toast.LENGTH_SHORT).show();
                    }else{
                        Prefs.putString(Consts.USER_ID,result);
                        Prefs.putString(Consts.USER_NAME,account);
                        setResult(RESULT_OK);
                        finish();
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
}
