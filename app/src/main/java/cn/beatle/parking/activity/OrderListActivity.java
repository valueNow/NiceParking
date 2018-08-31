package cn.beatle.parking.activity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.Toast;

import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;
import com.loopj.android.http.AsyncHttpResponseHandler;

import java.util.ArrayList;
import java.util.List;

import cn.beatle.parking.Consts;
import cn.beatle.parking.R;
import cn.beatle.parking.adapter.OrdersAdapter;
import cn.beatle.parking.http.HttpUtil;
import cn.beatle.parking.http.OrderBean;
import cn.beatle.parking.http.ParkingBean;
import cn.beatle.parking.http.Urls;
import cn.beatle.parking.view.TitleBar;

public class OrderListActivity extends BaseFragmentActivity {
    private TitleBar titleBar;
    private ListView listView;
    private OrdersAdapter mAdapter;
    private List<OrderBean> mData = new ArrayList<>();
    private Gson gson;

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
        mAdapter = new OrdersAdapter(this, mData);
        listView.setAdapter(mAdapter);
        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                ParkingBean bean = mData.get(i).getPark();
                Intent orderResult =new Intent(OrderListActivity.this,OrderResultActivity.class);
                orderResult.putExtra(Consts.ORDER_INFO, gson.toJson(bean, new TypeToken<ParkingBean>() {
                }.getType()));
                startActivity(orderResult);
            }
        });
        gson = new Gson();
        getOrders();
    }

    private void getOrders() {
        StringBuilder orders = new StringBuilder(Urls.GET_ORDERS_URL);
        orders.append("account_id=").append(getAccount());
        HttpUtil.get(orders.toString(), new AsyncHttpResponseHandler() {
            @Override
            public void onSuccess(int i, String s) {
                super.onSuccess(i, s);
                if (i == 200) {
                    if ("err".equals(s)) {
                        Toast.makeText(OrderListActivity.this, "获取数据失败", Toast.LENGTH_SHORT).show();
                    } else {
                        List<OrderBean> list = gson.fromJson(s, new TypeToken<ArrayList<OrderBean>>() {
                        }.getType());
                        if (list != null && list.size() > 0) {
                            for(OrderBean order:list){
                                order.setParkingBeanState();
                                order.setCarNo();
                                order.formatTime();
                            }
                            mData.addAll(list);
                            mAdapter.notifyDataSetChanged();
                        } else {
//                            listView.setEmptyView();
                        }
                    }
                }
            }

            @Override
            public void onFailure(Throwable throwable) {
                super.onFailure(throwable);
            }

            @Override
            public void onFinish() {
                super.onFinish();
            }
        });
    }
}
