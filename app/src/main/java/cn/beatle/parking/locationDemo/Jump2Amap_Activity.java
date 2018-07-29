package cn.beatle.parking.locationDemo;


import android.content.Context;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import java.net.URISyntaxException;

import cn.beatle.parking.R;

public class Jump2Amap_Activity extends CheckPermissionsActivity  {


    private Button btn_showView,btn_showGudie,btn_showNavi;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_jump2_amap);

        btn_showView = findViewById(R.id.btn_2amap_show_Loc);
        btn_showGudie = findViewById(R.id.btn_2amap_show_guide);
        btn_showNavi = findViewById(R.id.btn_2amap_show_navi);

        initOnclieckListener();

    }


    public void initOnclieckListener() {

        btn_showView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent intent = null;
                try {
                    openGaoDeViewMap(view.getContext(),39.981399,116.463439,
                            "poiName");

                } catch (URISyntaxException e) {
                    e.printStackTrace();
                }

            }
        });


        btn_showGudie.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                openGaodeMapToGuide(view.getContext(),
                        "40.0253350","116.4616080","北五环");

            }
        });

        btn_showNavi.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                openGaodeMap2Navi(view.getContext(), "39.981399","116.463439");

            }
        });
    }


    /**
     *
     * @param context
     * @param locationLat 终点纬度 【dlat】
     * @param locationLon 终点经度 【dlon】
     * @param poiname 重点POI名称
     * 以用户当前位置为起点进行到目的地导航规划，未进入导航页面
     *
     */
    public void  openGaoDeViewMap(Context context ,double locationLat, double locationLon,
                                  String poiname) throws URISyntaxException {

        String sourceApplication = this.getString(R.string.app_name);

        StringBuilder loc = new StringBuilder();
        loc.append("androidamap://viewMap?sourceApplication=");
        loc.append(sourceApplication);
        loc.append("&poiname=");
        loc.append(poiname);
        loc.append("&lat=");
        loc.append(locationLat);
        loc.append("&lon=");
        loc.append(locationLon);
        loc.append("&dev=0");

        Intent intent = Intent.getIntent(loc.toString());
        context.startActivity(intent);
    }

    /**
     *
     * @param context
     * @param locationLat 终点纬度 【dlat】
     * @param locationLon 终点经度 【dlon】
     * @param storeName 重点POI名称
     * 以用户当前位置为起点进行到目的地导航规划，未进入导航页面
     *
     */

    public void  openGaodeMapToGuide(Context context ,String locationLat, String locationLon, String storeName) {
        Intent intent = new Intent();
        intent.setAction(Intent.ACTION_VIEW);
        intent.addCategory(Intent.CATEGORY_DEFAULT);
        String sourceApplication = this.getString(R.string.app_name);

        String url = "androidamap://route?sourceApplication="+sourceApplication
                + "&sname=我的位置"
                + "&dlat=" + locationLat
                + "&dlon=" + locationLon
                + "&dname=" + storeName
                + "&dev=0&t=0";

        //Log.d("zhaoyanan",url);
        Uri uri = Uri.parse(url);
        intent.setData(uri);

        // 启动该页面即可
        context.startActivity(intent);
    }


/**
 *
 * @param context
 * @param endLat 终点纬度 【dlat】
 * @param endLng 终点经度 【dlon】
 * 以用户当前位置为起点进行到目的地导航，直接进入导航模式。
 *
 */

public  void openGaodeMap2Navi(Context context, String endLat, String endLng){
        Intent intent = new Intent();
        intent.setAction(Intent.ACTION_VIEW);
        intent.addCategory(Intent.CATEGORY_DEFAULT);
        String sourceApplication = this.getString(R.string.app_name);


        StringBuffer stringBuffer = new StringBuffer("androidamap://navi?sourceApplication=")
                .append(sourceApplication).append("&lat=").append(endLat)
                .append("&lon=").append(endLng)
                .append("&dev=").append(1)
                .append("&style=").append(0);

        Uri uri = Uri.parse(stringBuffer.toString());

        // 将功能Scheme以URI的方式传入data
        intent.setData(uri);
        context.startActivity(intent);

    }

}
