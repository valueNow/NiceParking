package cn.beatle.parking.activity;

import android.os.Bundle;
import android.view.View;

import cn.beatle.parking.R;
import cn.beatle.parking.view.TitleBar;

public class ParkingRentingActivity extends BaseFragmentActivity {

    private TitleBar titleBar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_parking_renting);
        //  initView(savedInstanceState);

    }

    private void initView(Bundle savedInstanceState){
        titleBar = findViewById(R.id.title_bar);
        titleBar.setLeftBtnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                ParkingRentingActivity.super.onBackPressed();
            }
        });
    }
}
