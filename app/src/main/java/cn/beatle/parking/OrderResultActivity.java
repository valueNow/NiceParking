package cn.beatle.parking;

import android.graphics.BitmapFactory;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import com.amap.api.maps2d.AMap;
import com.amap.api.maps2d.MapView;
import com.amap.api.maps2d.model.BitmapDescriptorFactory;
import com.amap.api.maps2d.model.LatLng;
import com.amap.api.maps2d.model.MarkerOptions;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import cn.beatle.parking.http.ParkingBean;

public class OrderResultActivity extends BaseFragmentActivity {
    private ParkingBean parkingBean;
    private Toolbar toolbar;
    private TextView orderResTv, parkingName, parkingLoc, orderTime;
    private MapView mapView;
    private Button actionBtn;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_order_result);
        initView(savedInstanceState);
        initData();
    }

    private void initView(Bundle savedInstanceState) {
        toolbar = findViewById(R.id.toolbar);
        toolbar.setNavigationOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });
        orderResTv = findViewById(R.id.order_result_textView);
        parkingName = findViewById(R.id.parking_name);
        parkingLoc = findViewById(R.id.loc_textView);
        orderTime = findViewById(R.id.time_textView);
        mapView = findViewById(R.id.map);
        mapView.onCreate(savedInstanceState);
        actionBtn = findViewById(R.id.action_button);
        actionBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (parkingBean.orderSucc) {

                } else {

                }
            }
        });
    }

    private void initData() {
        Gson gson = new Gson();
        parkingBean = gson.fromJson(getIntent().getStringExtra(Consts.ORDER_INFO), new TypeToken<ParkingBean>() {
        }.getType());
        if (parkingBean.orderSucc) {
            toolbar.setTitle("预约成功");
            orderResTv.setText("恭喜您，预约成功");
            orderResTv.setCompoundDrawablesWithIntrinsicBounds(0, R.mipmap.order_succ, 0, 0);
            actionBtn.setText("导航过去");
        } else {
            toolbar.setTitle("预约失败");
            orderResTv.setText("不好意思，预约失败");
            orderResTv.setCompoundDrawablesWithIntrinsicBounds(0, R.mipmap.order_failed, 0, 0);
            actionBtn.setText("重新预约");
        }
        parkingName.setText(parkingBean.getName());
        parkingLoc.setText(parkingBean.getAddress());
        AMap aMap = mapView.getMap();
        aMap.addMarker(new MarkerOptions()
                .position(new LatLng(39.986919,116.353369))
                .icon(BitmapDescriptorFactory.fromBitmap(BitmapFactory
                        .decodeResource(getResources(),R.mipmap.loc_icon)))
                .draggable(true));
    }

    @Override
    protected void onResume() {
        super.onResume();
        mapView.onResume();
    }

    @Override
    protected void onPause() {
        super.onPause();
        mapView.onPause();
    }

    @Override
    protected void onSaveInstanceState(Bundle outState) {
        super.onSaveInstanceState(outState);
        mapView.onSaveInstanceState(outState);
    }

    @Override
    protected void onDestroy() {
        super.onDestroy();
        mapView.onDestroy();
    }
}
