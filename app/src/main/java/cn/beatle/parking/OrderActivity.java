package cn.beatle.parking;

import android.app.Activity;
import android.os.Bundle;
import android.text.TextUtils;
import android.widget.Toast;

import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import cn.beatle.parking.http.ParkingBean;

public class OrderActivity extends BaseFragmentActivity {
    private ParkingBean parkingBean;
    private Gson gson;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_order);
        gson = new Gson();
        String parkInfo = getIntent().getStringExtra(Consts.ORDER_INFO);
        if(!TextUtils.isEmpty(parkInfo)){
            parkingBean = gson.fromJson(parkInfo,new TypeToken<ParkingBean>(){}.getType());
        }else{
            Toast.makeText(this,"parking info is empty",Toast.LENGTH_SHORT).show();
        }
    }
}
