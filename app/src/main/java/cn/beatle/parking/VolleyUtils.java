package cn.beatle.parking;

import android.view.View;
import android.widget.ImageView;

import com.android.volley.toolbox.ImageLoader;

public class VolleyUtils {
    public static void loadImage(String url, View view) {
        ImageLoader.ImageListener listener = ImageLoader.getImageListener((ImageView)view, R.mipmap.ic_launcher, R.mipmap.ic_launcher);
        ParkingApplication.getImageLoader().get(url, listener);
    }
}
