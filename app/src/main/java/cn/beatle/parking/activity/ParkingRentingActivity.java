package cn.beatle.parking.activity;

import android.os.Bundle;
import android.util.Log;
import android.view.View;

import cn.beatle.parking.R;
import cn.beatle.parking.view.TitleBar;

public class ParkingRentingActivity extends BaseFragmentActivity {

    private TitleBar titleBar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_parking_renting);
<<<<<<< HEAD

=======
        initView(savedInstanceState);

    }

    private void initView(Bundle savedInstanceState) {
>>>>>>> 75825a3f0142dc946ed3e0b1e653722fa5b848dd
        titleBar = findViewById(R.id.title_bar_rent);
        titleBar.setLeftBtnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Log.d("zhao.yanan","this is in setLeftBtnClickListener");
                onBackPressed();
            }
        });

    }
}
