package cn.beatle.parking.activity;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.content.IntentFilter;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.support.annotation.Nullable;
import android.support.design.widget.NavigationView;
import android.support.v4.content.LocalBroadcastManager;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.widget.Toolbar;
import android.text.TextUtils;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewTreeObserver;
import android.webkit.WebChromeClient;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.RadioGroup;
import android.widget.TextView;
import android.widget.Toast;

import com.amap.api.location.AMapLocation;
import com.amap.api.location.AMapLocationClient;
import com.amap.api.location.AMapLocationClientOption;
import com.amap.api.location.AMapLocationListener;
import com.amap.api.maps2d.MapView;
import com.amap.api.maps2d.UiSettings;

import java.lang.ref.WeakReference;

import cn.beatle.parking.Consts;
import cn.beatle.parking.ParkingApplication;
import cn.beatle.parking.R;
import cn.beatle.parking.http.JSAction;
import cn.beatle.parking.http.Urls;
import cn.beatle.parking.http.UserInfo;


public class MainActivity extends CheckPermissionsActivity implements NavigationView.OnNavigationItemSelectedListener,
        AMapLocationListener {


    private MapView mapView;
    private AMapLocationClient mlocationClient;
    private AMapLocationClientOption mLocationOption;
    private RadioGroup mGPSModeGroup;
    private UiSettings mUiSettings;

    private TextView mLocationErrText;

    private ImageButton im_location_btn;
    private WebView mapWebView;
    private MyHandler mHandler;
    private ImageView avatarImg;
    private TextView telTextView,carNoTextView;

    private BroadcastReceiver receiver = new BroadcastReceiver() {
        @Override
        public void onReceive(Context context, Intent intent) {
            String action = intent.getAction();
            if(!TextUtils.isEmpty(action)){
                initLoginState();
            }
        }
    };

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);

//        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
//        fab.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View view) {
//                Snackbar.make(view, "Replace with your own action", Snackbar.LENGTH_LONG)
//                        .setAction("Action", new View.OnClickListener() {
//                            @Override
//                            public void onClick(View view) {
//
//                            }
//                        }).show();
//            }
//        });

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();

        final NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);
        navigationView.getViewTreeObserver().addOnGlobalLayoutListener(new ViewTreeObserver.OnGlobalLayoutListener() {
            @Override
            public void onGlobalLayout() {
                initLoginState();
                navigationView.getViewTreeObserver().removeGlobalOnLayoutListener(this);
            }
        });

        mapView = (MapView) findViewById(R.id.map);
        mapView.onCreate(savedInstanceState);// 此方法必须重写

        init();

        mapWebView = findViewById(R.id.map_webView);
        mapWebView.setWebViewClient(mWebViewClient);
        WebSettings settings = mapWebView.getSettings();
        settings.setJavaScriptEnabled(true);
        settings.setJavaScriptCanOpenWindowsAutomatically(true);
        settings.setPluginState(WebSettings.PluginState.ON);
        settings.setAllowFileAccess(true);
        settings.setLoadWithOverviewMode(true);
        settings.setUseWideViewPort(true);
        settings.setCacheMode(WebSettings.LOAD_NO_CACHE);
        settings.setCacheMode(WebSettings.LOAD_DEFAULT);

        mHandler = new MyHandler(this);
        JSAction action = new JSAction(mHandler);
        mapWebView.addJavascriptInterface(action, "NiceParkingJS");
        mapWebView.loadUrl(Urls.MAP_URL);

        mapWebView.setWebChromeClient(new WebChromeClient());
        avatarImg = findViewById(R.id.imageView);
        telTextView = findViewById(R.id.tel_textView);
        carNoTextView = findViewById(R.id.carNo_textView);
        initLoginState();
        IntentFilter filter = new IntentFilter();
        filter.addAction(Consts.LOGIN_ACTION);
        filter.addAction(Consts.LOGOUT_ACTION);
        LocalBroadcastManager.getInstance(this).registerReceiver(receiver,filter);
    }

    private void initLoginState() {
        if(telTextView ==null || avatarImg==null){
            avatarImg = findViewById(R.id.imageView);
            telTextView = findViewById(R.id.tel_textView);
            carNoTextView = findViewById(R.id.carNo_textView);
        }
        if(telTextView ==null || avatarImg==null)return;
        if(isLogin()){
            carNoTextView.setVisibility(View.VISIBLE);
            if(ParkingApplication.getInstance().getUserInfo()==null){
                ParkingApplication.getInstance().initUserInfo();
            }
            UserInfo userInfo = ParkingApplication.getInstance().getUserInfo();
            telTextView.setText(userInfo.getTel());
            carNoTextView.setText(userInfo.getLicense_plate());
            avatarImg.setOnClickListener(null);
            findViewById(R.id.userInfo_layout).setOnClickListener(null);
        }else{
            telTextView.setText("未登录");
            findViewById(R.id.userInfo_layout).setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    Intent login = new Intent(MainActivity.this,LoginActivity.class);
                    startActivityForResult(login,0);
                }
            });
            carNoTextView.setVisibility(View.GONE);
        }
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if(requestCode==0 && resultCode == RESULT_OK){
            initLoginState();
        }
    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            super.onBackPressed();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();
        switch (item.getItemId()) {
            case R.id.my_orders:
                if(isLogin(true)){
                    Intent orderList = new Intent(this,OrderListActivity.class);
                    startActivity(orderList);
                }
                break;
            case R.id.parking_rent:
                Intent parking_ret_intent = new Intent(this,ParkingRentingActivity.class);
                startActivity(parking_ret_intent);
                break;
            case R.id.system_setting:
                Intent orderList = new Intent(this,SettingActivity.class);
                startActivity(orderList);
                break;
            case R.id.version_info:
                Toast ts = Toast.makeText(this.getBaseContext(),"已经是最新版本！", Toast.LENGTH_LONG);
                ts.show() ;//这个是打开的意思,就是调用的意思。
                break;
            case R.id.service_center:
                Intent service_center_intent = new Intent(this,ServiceCenter.class);
                startActivity(service_center_intent);
                break;
           /* case R.id.item_location:
                Intent intent = new Intent(MainActivity.this, Location_Activity.class);
                startActivity(intent);
                break;
            case R.id.item_locationBackground:
                Intent locBack = new Intent(MainActivity.this, Location_BackGround_Activity.class);
                startActivity(locBack);
                break;
            case R.id.item_lastLocation:
                Intent lastLoc = new Intent(MainActivity.this, LastLocation_Activity.class);
                startActivity(lastLoc);
                break;

            case R.id.item_jump2Amap:
                Intent jump2Amap = new Intent(MainActivity.this, Jump2Amap_Activity.class);
                startActivity(jump2Amap);
                break;
            case R.id.item_login:
                Intent login = new Intent(MainActivity.this, LoginActivity.class);
                startActivity(login);
                break;*/
            default:
                break;
        }
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }

    /**
     * 初始化
     */
    private void init() {

        mLocationErrText = (TextView) findViewById(R.id.location_errInfo_text);
        mLocationErrText.setVisibility(View.GONE);

        im_location_btn = (ImageButton) findViewById(R.id.im_location_btn);
        im_location_btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                activate();
            }
        });


    }


    /**
     * 方法必须重写
     */
    @Override
    protected void onResume() {
        super.onResume();
//        mapView.onResume();
    }


    /**
     * 方法必须重写
     */
    @Override
    protected void onPause() {
        super.onPause();
        mapView.onPause();
        deactivate();
    }

    /**
     * 方法必须重写
     */
    @Override
    protected void onSaveInstanceState(Bundle outState) {
        super.onSaveInstanceState(outState);
        mapView.onSaveInstanceState(outState);
    }


    /**
     * 方法必须重写
     */
    @Override
    protected void onDestroy() {
        super.onDestroy();
        mapView.onDestroy();
        if (null != mlocationClient) {
            mlocationClient.onDestroy();
        }
        LocalBroadcastManager.getInstance(this).unregisterReceiver(receiver);
    }

    /**
     * 定位成功后回调函数
     */
    @Override
    public void onLocationChanged(AMapLocation amapLocation) {
//        if (mListener != null && amapLocation != null) {
        if (amapLocation != null
                && amapLocation.getErrorCode() == 0) {

            //拼接传输数据字符串
            String loctionInfo = "[" + amapLocation.getLongitude() + "," + //lon
                    amapLocation.getLatitude() + "]";
            String loadurl_str = "javascript:showInfoFromApp('" + loctionInfo + "')";

            //发送数据
            Log.d("zhao.yanan", "onLocationChanged:loadurl_str=" + loadurl_str);
            mapWebView.loadUrl(loadurl_str);

            //停止定位
            deactivate();

        }
    }

    /**
     * 激活定位
     */
    public void activate() {
        if (mlocationClient == null) {
            mlocationClient = new AMapLocationClient(this);
            mLocationOption = new AMapLocationClientOption();
            //设置定位监听
            mlocationClient.setLocationListener(this);
            //设置为高精度定位模式
            mLocationOption.setLocationMode(AMapLocationClientOption.AMapLocationMode.Hight_Accuracy);
            //设置定位参数
            mlocationClient.setLocationOption(mLocationOption);
            // 此方法为每隔固定时间会发起一次定位请求，为了减少电量消耗或网络流量消耗，
            // 注意设置合适的定位时间的间隔（最小间隔支持为2000ms），并且在合适时间调用stopLocation()方法来取消定位请求
            // 在定位结束后，在合适的生命周期调用onDestroy()方法
            // 在单次定位情况下，定位无论成功与否，都无需调用stopLocation()方法移除请求，定位sdk内部会移除
            mlocationClient.startLocation();
        }
    }

    /**
     * 停止定位
     */
    public void deactivate() {
//        mListener = null;
        if (mlocationClient != null) {
            mlocationClient.stopLocation();
            mlocationClient.onDestroy();
        }
        mlocationClient = null;
    }

    private static class MyHandler extends Handler {
        private WeakReference<MainActivity> mOut;

        public MyHandler(MainActivity out) {
            mOut = new WeakReference<>(out);
        }

        @Override
        public void handleMessage(Message msg) {
            switch (msg.what) {
                case JSAction.EVENT_ID_JUMP_TO_ORDER:
                    if (mOut != null && mOut.get() != null) {
                        mOut.get().jumpToOrder((String) msg.obj);
                    }
                    break;
            }
        }
    }

    private void jumpToOrder(String orderInfo) {
        Intent intent = new Intent(this, OrderActivity.class);
        intent.putExtra(Consts.ORDER_INFO, orderInfo);
        startActivity(intent);
    }

    private WebViewClient mWebViewClient = new WebViewClient() {
        public boolean shouldOverrideUrlLoading(WebView view, String url) {
            if (url.startsWith("http:") || url.startsWith("https:")) {
                return false;
            } else {
                return true;
            }
        }

        public void onPageStarted(WebView view, String url, android.graphics.Bitmap favicon) {
        }

        public void onPageFinished(WebView view, String url) {

        }

        @Override
        public void doUpdateVisitedHistory(WebView view, String url, boolean isReload) {
            super.doUpdateVisitedHistory(view, url, isReload);
        }
    };

}
