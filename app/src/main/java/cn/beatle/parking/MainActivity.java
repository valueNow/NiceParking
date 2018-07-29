package cn.beatle.parking;

import android.app.ListActivity;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ListAdapter;
import android.widget.ListView;

import cn.beatle.parking.R;
import cn.beatle.parking.locationDemo.Jump2Amap_Activity;
import cn.beatle.parking.locationDemo.LastLocation_Activity;
import cn.beatle.parking.locationDemo.Location_Activity;
import cn.beatle.parking.locationDemo.Location_BackGround_Activity;
import cn.beatle.parking.locationDemo.view.FeatureView;

public class MainActivity extends ListActivity {


    private static class DemoDetails {
        private final int titleId;
        private final int descriptionId;
        private final Class<? extends android.app.Activity> activityClass;
        public DemoDetails(int titleId, int descriptionId,
                           Class<? extends android.app.Activity> activityClass) {
            super();
            this.titleId = titleId;
            this.descriptionId = descriptionId;
            this.activityClass = activityClass;
        }
    }


    private static class CustomArrayAdapter extends ArrayAdapter<DemoDetails> {
        public CustomArrayAdapter(Context context, DemoDetails[] demos) {
            super(context, R.layout.feature, R.id.title, demos);
        }

        @Override
        public View getView(int position, View convertView, ViewGroup parent) {
            FeatureView featureView;
            if (convertView instanceof FeatureView) {
                featureView = (FeatureView) convertView;
            } else {
                featureView = new FeatureView(getContext());
            }
            DemoDetails demo = getItem(position);
            featureView.setTitleId(demo.titleId);
            featureView.setDescriptionId(demo.descriptionId);
            return featureView;
        }
    }


    private static final DemoDetails[] demos = {
            new DemoDetails(R.string.location,
                    R.string.location_dec, Location_Activity.class),
            new DemoDetails(R.string.locationBackground,
                    R.string.locationBackground_dec, Location_BackGround_Activity.class),
            new DemoDetails(R.string.lastLocation, R.string.lastLocation_dec,
                    LastLocation_Activity.class),
            new DemoDetails(R.string.jump2Amap, R.string.jump2Amap_dec,
                    Jump2Amap_Activity.class),
    };


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        setTitle(R.string.title_main);
        ListAdapter adapter = new CustomArrayAdapter(
                this.getApplicationContext(), demos);
        setListAdapter(adapter);
    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();
        System.exit(0);
    }

    @Override
    protected void onListItemClick(ListView l, View v, int position, long id) {
        DemoDetails demo = (DemoDetails) getListAdapter().getItem(position);
        startActivity(
                new Intent(this.getApplicationContext(), demo.activityClass));
    }
}
