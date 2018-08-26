package cn.beatle.parking;

import android.text.TextUtils;

import java.lang.reflect.Method;

public class OSUtils {
    private static final String KEY_MIUI_VERSION_CODE = "ro.miui.ui.version.code";
    private static final String KEY_MIUI_VERSION_NAME = "ro.miui.ui.version.name";
    private static final String KEY_MIUI_INTERNAL_STORAGE = "ro.miui.internal.storage";
    private static final String KEY_FLYME_ICON_FALG = "persist.sys.use.flyme.icon";
    private static final String KEY_FLYME_SETUP_FALG = "ro.meizu.setupwizard.flyme";
    private static final String KEY_FLYME_PUBLISH_FALG = "ro.flyme.published";
    private static final String KEY_DISPLAY = "ro.build.display.id";

    public static boolean isMIUI() {
        String propertyName = getSystemProperty(KEY_MIUI_VERSION_NAME, "");
        String propertyCode = getSystemProperty(KEY_MIUI_VERSION_CODE, "");
        String propertyStorage = getSystemProperty(KEY_MIUI_INTERNAL_STORAGE, "");
        return !TextUtils.isEmpty(propertyCode) || !TextUtils.isEmpty(propertyName) || !TextUtils.isEmpty(propertyStorage);
    }

    public static boolean isFlyme() {
        return getFlymeOSFlag().toLowerCase().contains("flyme");
    }

    private static String getMIUIOSFlag() {
        return getSystemProperty(KEY_DISPLAY, "");
    }

    private static String getFlymeOSFlag() {
        return getSystemProperty(KEY_DISPLAY, "");
    }

    public static String getFlymeOSVersion() {
        return isFlyme() ? getSystemProperty(KEY_DISPLAY, "") : "";
    }

    private static String getSystemProperty(String key, String defaultValue) {
        try {
            Class<?> clz = Class.forName("android.os.SystemProperties");
            Method get = clz.getMethod("get", String.class, String.class);
            return (String) get.invoke(clz, key, defaultValue);
        } catch (Exception e) {
            e.printStackTrace();
        }
        return defaultValue;
    }

}
