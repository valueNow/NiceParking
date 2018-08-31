package cn.beatle.parking.adapter;

import android.content.Context;
import android.graphics.Color;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import java.util.List;

import cn.beatle.parking.R;
import cn.beatle.parking.http.OrderBean;

public class OrdersAdapter extends BaseAdapter {

    private Context context;
    private LayoutInflater inflater;
    private List<OrderBean> mData;
    public OrdersAdapter(Context context,List<OrderBean> list) {
        this.context = context;
        mData = list;
        inflater = LayoutInflater.from(context);
    }

    @Override
    public int getCount() {
        return mData.size();
    }

    @Override
    public Object getItem(int i) {
        return mData.get(i);
    }

    @Override
    public long getItemId(int i) {
        return i;
    }

    @Override
    public View getView(int i, View view, ViewGroup viewGroup) {
        ViewHolder vh;
        OrderBean order = mData.get(i);
        if(view==null){
            vh = new ViewHolder();
            view = inflater.inflate(R.layout.order_list_item_layout,viewGroup,false);
            vh.carNo = view.findViewById(R.id.carNo_textView);
            vh.orderStatus = view.findViewById(R.id.order_status_textView);
            vh.parkName = view.findViewById(R.id.parking_name_textView);
            vh.time = view.findViewById(R.id.time_textView);
            view.setTag(vh);
        }else{
            vh = (ViewHolder) view.getTag();
        }
        vh.carNo.setText(order.getLicense_plate());
        if("0".equals(order.getOrder_state())){
            vh.orderStatus.setText("预约成功");
            vh.orderStatus.setTextColor(Color.parseColor("#59a464"));
        }else{
            vh.orderStatus.setText("预约失败");
            vh.orderStatus.setTextColor(Color.parseColor("#e90000"));
        }
        vh.parkName.setText(order.getPark_name());
        vh.time.setText(order.getOrder_time());
        return view;
    }

    class ViewHolder{
        TextView carNo,orderStatus,parkName,time;
    }
}
