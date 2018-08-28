package cn.beatle.parking;

import android.app.Activity;
import android.app.Application;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.support.v4.util.LruCache;

import com.android.volley.RequestQueue;
import com.android.volley.toolbox.ImageLoader;
import com.android.volley.toolbox.Volley;

/**
 * Created by hongming.wang on 2018/1/23.
 */

public class ParkingApplication extends Application{
    private int count = 0;
    private static ImageLoader imageLoader;

    private class VolleyImageCache implements ImageLoader.ImageCache {
        private LruCache<String, Bitmap> mCache;
        public VolleyImageCache() {
            int maxCacheSize = 1024 * 1024 * 10;
            mCache = new LruCache<String, Bitmap>(maxCacheSize) {
                @Override
                protected int sizeOf(String key, Bitmap value) {
                    return value.getRowBytes() * value.getHeight();
                }
            };
        }

        @Override
        public Bitmap getBitmap(String url) {
            return mCache.get(url);
        }

        @Override
        public void putBitmap(String url, Bitmap bitmap) {
            mCache.put(url, bitmap);
        }
    }

    @Override
    public void onCreate() {
        super.onCreate();
        registerActivityLifecycleCallbacks(new ActivityLifecycleCallbacks() {
            @Override
            public void onActivityCreated(Activity activity, Bundle savedInstanceState) {
            }

            @Override
            public void onActivityStarted(Activity activity) {
                count ++;
            }

            @Override
            public void onActivityResumed(Activity activity) {
            }

            @Override
            public void onActivityPaused(Activity activity) {
            }

            @Override
            public void onActivityStopped(Activity activity) {
                if(count > 0) {
                    count--;
                }
            }

            @Override
            public void onActivitySaveInstanceState(Activity activity, Bundle outState) {

            }

            @Override
            public void onActivityDestroyed(Activity activity) {
            }
        });
        RequestQueue queue = Volley.newRequestQueue(this);
        imageLoader = new ImageLoader(queue,new VolleyImageCache());
        Prefs.initPrefs(this);
    }

    /**
     * 判断app是否在后台
     * @return
     */
    public boolean isBackground(){
        return count <= 0;
    }

    public static ImageLoader getImageLoader() {
        return imageLoader;
    }
}
