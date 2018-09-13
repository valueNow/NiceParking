package cn.beatle.parking.activity;

import android.graphics.BitmapFactory;
import android.os.Bundle;
import android.view.View;

import com.amap.api.maps2d.AMap;
import com.amap.api.maps2d.CameraUpdateFactory;
import com.amap.api.maps2d.MapView;
import com.amap.api.maps2d.model.BitmapDescriptorFactory;
import com.amap.api.maps2d.model.CameraPosition;
import com.amap.api.maps2d.model.LatLng;
import com.amap.api.maps2d.model.Marker;
import com.amap.api.maps2d.model.MarkerOptions;

import cn.beatle.parking.Consts;
import cn.beatle.parking.R;
import cn.beatle.parking.view.TitleBar;

public class ParkMapActivity extends BaseFragmentActivity {
    private MapView mapView;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_park_map);
        ((TitleBar)findViewById(R.id.title_bar)).setLeftBtnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });
        mapView = findViewById(R.id.map);
        mapView.onCreate(savedInstanceState);
        String loc = getIntent().getStringExtra(Consts.LOCATION);
        double longitude = Double.parseDouble(loc.substring(1,loc.indexOf(",")));
        double latitude = Double.parseDouble(loc.substring(loc.indexOf(",")+1,loc.lastIndexOf("]")));
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
