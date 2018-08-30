package cn.beatle.parking.activity;

import android.os.Bundle;
import android.view.View;
import android.widget.ListView;

import cn.beatle.parking.R;
import cn.beatle.parking.view.TitleBar;

public class OrderListActivity extends BaseFragmentActivity {
    private TitleBar titleBar;
    private ListView listView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_order_list);
        titleBar = findViewById(R.id.title_bar);
        titleBar.setLeftBtnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });
        listView = findViewById(R.id.orders_listView);
        // TODO: 2018/8/30 get orders data
    }
}
