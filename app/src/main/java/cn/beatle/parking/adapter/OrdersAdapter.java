package cn.beatle.parking.adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import cn.beatle.parking.R;

public class OrdersAdapter extends BaseAdapter {

    private Context context;
    private LayoutInflater inflater;
    public OrdersAdapter(Context context) {
        this.context = context;
        inflater = LayoutInflater.from(context);
    }

    @Override
    public int getCount() {
        return 0;
    }

    @Override
    public Object getItem(int i) {
        return null;
    }

    @Override
    public long getItemId(int i) {
        return 0;
    }

    @Override
    public View getView(int i, View view, ViewGroup viewGroup) {
        ViewHolder vh;
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
        return view;
    }

    class ViewHolder{
        TextView carNo,orderStatus,parkName,time;
    }
}
