package cn.beatle.parking.activity;

import android.content.Intent;
import android.os.Bundle;
import android.text.Html;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;
import com.loopj.android.http.AsyncHttpResponseHandler;

import cn.beatle.parking.Consts;
import cn.beatle.parking.R;
import cn.beatle.parking.utils.OSUtils;
import cn.beatle.parking.utils.VolleyUtils;
import cn.beatle.parking.http.HttpUtil;
import cn.beatle.parking.http.ParkingBean;
import cn.beatle.parking.http.Urls;
import cn.beatle.parking.view.TitleBar;

public class OrderActivity extends BaseFragmentActivity implements View.OnClickListener {
    private ParkingBean parkingBean;
    private Gson gson;
    private ImageView cover;
    private TextView name, address, parkingInfo, openTime, tel;
    private Button order;
    private int height;
    private TitleBar titleBar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_order);
        gson = new Gson();
        String parkInfo = getIntent().getStringExtra(Consts.ORDER_INFO);
        if (!TextUtils.isEmpty(parkInfo)) {
            parkingBean = gson.fromJson(parkInfo, new TypeToken<ParkingBean>() {
            }.getType());
        } else {
            Toast.makeText(this, "parking info is empty", Toast.LENGTH_SHORT).show();
            finish();
        }
        initView();
    }

    private void initView() {
        titleBar = findViewById(R.id.title_bar);
        titleBar.setLeftBtnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });
        height = (int) (getResources().getDisplayMetrics().widthPixels / 16f * 9);
        cover = findViewById(R.id.cover_imageView);
        cover.getLayoutParams().height = height;
        name = findViewById(R.id.name_textView);
        address = findViewById(R.id.address_textView);
        address.setOnClickListener(this);
        parkingInfo = findViewById(R.id.parking_num);
        openTime = findViewById(R.id.open_time);
        tel = findViewById(R.id.tel_textView);
        tel.setOnClickListener(this);
        order = findViewById(R.id.order_button);
        order.setOnClickListener(this);


        VolleyUtils.loadImage(parkingBean.getImg(), cover);
        name.setText(parkingBean.getName());
        address.setText(parkingBean.getAddress());
        String parkingNoInfo = getResources().getString(R.string.parking_info, parkingBean.getCount(),
                parkingBean.getLostCount());
        parkingInfo.setText(Html.fromHtml(parkingNoInfo));
        openTime.setText(parkingBean.getYysj());
        tel.setText(parkingBean.getNumber());
    }

    @Override
    public void onClick(View view) {
        switch (view.getId()) {
            case R.id.order_button:
                order();
                break;
            case R.id.tel_textView:
                OSUtils.callPhone(parkingBean.getNumber(), this);
                break;
            case R.id.address_textView:
                Intent intent = new Intent(this, ParkMapActivity.class);
                intent.putExtra(Consts.LOCATION, parkingBean.getPosition());
                startActivity(intent);
                break;
        }
    }

    private void order() {
        if (!isLogin(true)) {
            return;
        }
        openLoadingDialog("");
        StringBuilder order = new StringBuilder(Urls.ORDER_URL);
        order.append("park_id=").append(parkingBean.getId()).append("&park_name=").append(parkingBean.getName())
                .append("&book_st=").append("201808280900").append("&book_ed=").append("201808282000").append("&book_account=")
                .append(getAccount());
        HttpUtil.get(order.toString(), new AsyncHttpResponseHandler() {
            @Override
            public void onSuccess(int i, String s) {
                super.onSuccess(i, s);
                Log.i(OrderActivity.class.getSimpleName(), "result = " + s);
                if (i == 200) {
                    Intent orderResult = new Intent(OrderActivity.this, OrderResultActivity.class);
                    if ("suc".equals(s)) {
                        parkingBean.orderSucc = true;
                    } else {
                        parkingBean.orderSucc = false;
                    }
                    orderResult.putExtra(Consts.ORDER_INFO, gson.toJson(parkingBean, new TypeToken<ParkingBean>() {
                    }.getType()));
                    startActivity(orderResult);
                    finish();
                } else {
                    Toast.makeText(OrderActivity.this, "预约失败", Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Throwable throwable) {
                super.onFailure(throwable);
            }

            @Override
            public void onFinish() {
                super.onFinish();
                closeLoadingDialog();
            }
        });

    }
}
