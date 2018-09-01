package cn.beatle.parking;

import android.app.Activity;
import android.app.Application;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.support.v4.util.LruCache;
import android.text.TextUtils;

import com.android.volley.RequestQueue;
import com.android.volley.toolbox.ImageLoader;
import com.android.volley.toolbox.Volley;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import cn.beatle.parking.http.UserInfo;
import cn.beatle.parking.utils.Prefs;

/**
 * Created by hongming.wang on 2018/1/23.
 */

public class ParkingApplication extends Application {
    private static ParkingApplication sInstance;
    private int count = 0;
    private static ImageLoader imageLoader;
    private UserInfo userInfo;

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
        sInstance = this;
        registerActivityLifecycleCallbacks(new ActivityLifecycleCallbacks() {
            @Override
            public void onActivityCreated(Activity activity, Bundle savedInstanceState) {
            }

            @Override
            public void onActivityStarted(Activity activity) {
                count++;
            }

            @Override
            public void onActivityResumed(Activity activity) {
            }

            @Override
            public void onActivityPaused(Activity activity) {
            }

            @Override
            public void onActivityStopped(Activity activity) {
                if (count > 0) {
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
        imageLoader = new ImageLoader(queue, new VolleyImageCache());
        Prefs.initPrefs(this);
        if (!TextUtils.isEmpty(Prefs.getString(Consts.USER_INFO, ""))) {
            initUserInfo();
        }
    }

    public void initUserInfo() {
        Gson gson = new Gson();
        userInfo = gson.fromJson(Prefs.getString(Consts.USER_INFO, ""), new TypeToken<UserInfo>() {
        }.getType());
    }

    /**
     * 判断app是否在后台
     *
     * @return
     */
    public boolean isBackground() {
        return count <= 0;
    }

    public static ImageLoader getImageLoader() {
        return imageLoader;
    }

    public static ParkingApplication getInstance() {
        return sInstance;
    }

    public UserInfo getUserInfo() {
        return userInfo;
    }

    public void setUserInfo(UserInfo userInfo) {
        this.userInfo = userInfo;
    }
}
