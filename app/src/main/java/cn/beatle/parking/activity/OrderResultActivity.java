package cn.beatle.parking.activity;

import android.content.Intent;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.amap.api.location.AMapLocation;
import com.amap.api.location.AMapLocationClient;
import com.amap.api.location.AMapLocationListener;
import com.amap.api.maps2d.AMap;
import com.amap.api.maps2d.CameraUpdateFactory;
import com.amap.api.maps2d.MapView;
import com.amap.api.maps2d.model.BitmapDescriptorFactory;
import com.amap.api.maps2d.model.CameraPosition;
import com.amap.api.maps2d.model.LatLng;
import com.amap.api.maps2d.model.Marker;
import com.amap.api.maps2d.model.MarkerOptions;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import java.net.URISyntaxException;
import java.text.SimpleDateFormat;
import java.util.Date;

import cn.beatle.parking.Consts;
import cn.beatle.parking.R;
import cn.beatle.parking.http.ParkingBean;
import cn.beatle.parking.utils.OSUtils;
import cn.beatle.parking.view.TitleBar;

public class OrderResultActivity extends BaseFragmentActivity implements AMapLocationListener{
    private ParkingBean parkingBean;
    private TitleBar titleBar;
    private TextView orderResTv, parkingName, parkingLoc, orderTime;
    private MapView mapView;
    private Button actionBtn;
    private AMapLocationClient aMapLocationClient;
    private double longitude;
    private double latitude;
    private double mLocationLat;
    private double mLocationLon;
    private String mLocationAddr;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_order_result);
        initView(savedInstanceState);
        initData();
    }

    private void initView(Bundle savedInstanceState) {
        titleBar = findViewById(R.id.title_bar);
        titleBar.setLeftBtnClickListener(new View.OnClickListener() {
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
                    Intent intent = new Intent();
                    if (OSUtils.isInstalled(OrderResultActivity.this, "com.baidu.BaiduMap")) {
                        try {
                            intent = Intent.parseUri("intent://map/direction?" +
                                    "origin=latlng:" + mLocationLat + "," + mLocationLon +
                                    "|name:" + mLocationAddr +
                                    "&destination=latlng:" + latitude + "," + longitude +
                                    "|name:" + parkingBean.getAddress() +
                                    "&mode=driving" +
                                    "&src=Name|AppName" +
                                    "#Intent;scheme=bdapp;package=com.baidu.BaiduMap;end", 0);
                        } catch (URISyntaxException e) {
                            Log.d(OrderResultActivity.class.getSimpleName(),"URISyntaxException : " + e.getMessage());
                            e.printStackTrace();
                        }
                        startActivity(intent);
                    } else if (OSUtils.isInstalled(OrderResultActivity.this, "com.autonavi.minimap")) {
                        intent.setData(Uri
                                .parse("androidamap://route?" +
                                        "sourceApplication=softname" +
                                        "&slat=" + mLocationLat +
                                        "&slon=" + mLocationLon +
                                        "&dlat=" + latitude +
                                        "&dlon=" + longitude +
                                        "&dname=" + parkingBean.getAddress() +
                                        "&dev=0" +
                                        "&m=0" +
                                        "&t=2"));
                        startActivity(intent);
                    } else {
                        Toast.makeText(OrderResultActivity.this,"请安装导航软件，亲",Toast.LENGTH_SHORT).show();
                    }
                } else {
                    finish();
                }
            }
        });
    }

    private void initData() {
        Gson gson = new Gson();
        parkingBean = gson.fromJson(getIntent().getStringExtra(Consts.ORDER_INFO), new TypeToken<ParkingBean>() {
        }.getType());
        if (parkingBean.orderSucc) {
            titleBar.setTitle("预约成功");
            orderResTv.setText("恭喜您，预约成功");
            orderResTv.setCompoundDrawablesWithIntrinsicBounds(0, R.mipmap.order_succ, 0, 0);
            actionBtn.setText("导航过去");
        } else {
            titleBar.setTitle("预约失败");
            orderResTv.setText("不好意思，预约失败");
            orderResTv.setCompoundDrawablesWithIntrinsicBounds(0, R.mipmap.order_failed, 0, 0);
            actionBtn.setText("重新预约");
        }
        try {
//            SimpleDateFormat sdf = new SimpleDateFormat("yyyyMMddHHmmss", Locale.getDefault());
            SimpleDateFormat sdfT = new SimpleDateFormat("MM/dd  HH:mm:ss");
//            orderTime.setText(sdfT.format(sdf.parse(parkingBean.getId())));
            orderTime.setText(sdfT.format(new Date()));
        } catch (Exception e) {
            e.printStackTrace();
        }
        parkingName.setText(parkingBean.getName());
        parkingLoc.setText(parkingBean.getAddress());
        try {
            longitude = Double.parseDouble(parkingBean.getPosition().substring(1,parkingBean.getPosition().indexOf(",")));
            latitude = Double.parseDouble(parkingBean.getPosition().substring(parkingBean.getPosition().indexOf(",")+1,parkingBean.getPosition().lastIndexOf("]")));
            LatLng latLng = new LatLng(latitude, longitude);

            AMap aMap = mapView.getMap();
            Marker marker = aMap.addMarker(new MarkerOptions()
                    .anchor(0.5f,0.5f)
                    .position(latLng)
                    .icon(BitmapDescriptorFactory.fromBitmap(BitmapFactory
                            .decodeResource(getResources(),R.mipmap.loc_icon)))
                    .draggable(true));
            marker.showInfoWindow();
            aMap.moveCamera(CameraUpdateFactory.newCameraPosition(new CameraPosition(
                    latLng, 18, 0, 30)));

            aMapLocationClient = new AMapLocationClient(getApplicationContext());
            aMapLocationClient.setLocationListener(this);

            //启动定位
            aMapLocationClient.startLocation();
        } catch (NumberFormatException e) {
            e.printStackTrace();
        }
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
        if(aMapLocationClient!=null){
            aMapLocationClient.onDestroy();
            aMapLocationClient = null;
        }
    }

    @Override
    public void onLocationChanged(AMapLocation aMapLocation) {
        if (aMapLocation != null && aMapLocation.getErrorCode() == 0) {
            mLocationLat = aMapLocation.getLatitude();
            mLocationLon = aMapLocation.getLongitude();
            mLocationAddr = aMapLocation.getAddress();
            Log.d(OrderResultActivity.class.getSimpleName(),"onLocationChanged mLocationAddr : " + mLocationAddr);
            Log.d(OrderResultActivity.class.getSimpleName(),"onLocationChanged mLocationLon : " + mLocationLon);
            Log.d(OrderResultActivity.class.getSimpleName(),"onLocationChanged mLocationLat : " + mLocationLat);
        } else {
            Log.d(OrderResultActivity.class.getSimpleName(),"location Error, ErrCode:"
                    + aMapLocation.getErrorCode() + ", errInfo:"
                    + aMapLocation.getErrorInfo());
        }

    }
}
