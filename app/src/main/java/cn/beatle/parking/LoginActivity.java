package cn.beatle.parking;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class LoginActivity extends Activity implements View.OnClickListener {
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
    }

    @Override
    public void onClick(View view) {
        switch (view.getId()) {
            case R.id.forget_password:
                Intent retrieve = new Intent(this,RetrievePwdActivity.class);
                startActivity(retrieve);
                break;
            case R.id.register_tips:
                Intent register = new Intent(this,RegisterActivity.class);
                startActivity(register);
                break;
            case R.id.login_button:
                login();
                break;
        }
    }

    private void login() {
        String account = accountEt.getText().toString();
        if (TextUtils.isEmpty(account)) {
            Toast.makeText(this,getResources().getString(R.string.account_empty),Toast.LENGTH_SHORT).show();
            return;
        }
        String password = passwordEt.getText().toString();
        if (TextUtils.isEmpty(password)) {
            Toast.makeText(this,getResources().getString(R.string.password_empty),Toast.LENGTH_SHORT).show();
            return;
        }
        // TODO: 2018/8/22 登录
    }
}
