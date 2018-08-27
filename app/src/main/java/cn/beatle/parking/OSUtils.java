package cn.beatle.parking;

import android.text.TextUtils;

import java.lang.reflect.Method;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

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


    //用户名字符匹配：由字母数字下划线组成且开头必须是字母，不能超过16位
    public static boolean checkAccountName(String account_name) {

        Pattern p = Pattern.compile("[a-zA-Z]{1}[a-zA-Z0-9_]{1,15}");
        Matcher m = p.matcher(account_name);
        return m.matches();
    }

    //匹配密码：字母和数字构成，不能超过16位

    public static boolean checkPassword(String password) {
        Pattern p = Pattern.compile("[a-zA-Z0-9]{1,16}");
        Matcher m = p.matcher(password);
        return m.matches();
    }

    //匹配电话：全数字，长度为11位
    public static boolean checkPhoneNum(String phoneNum) {
        Pattern p = Pattern.compile("[0-9]{11}");
        Matcher m = p.matcher(phoneNum);
        return m.matches();
    }

    //匹配电话：全数字，长度为11位
    public static boolean check(String phoneNum) {
        Pattern p = Pattern.compile("[0-9]{11}");
        Matcher m = p.matcher(phoneNum);
        return m.matches();
    }

    //匹配车牌
    public static boolean isCarnumberNO(String carnumber) {
        /*
        1.常规车牌号：仅允许以汉字开头，后面可录入六个字符，由大写英文字母和阿拉伯数字组成。如：粤B12345；
        2.武警车牌：允许前两位为大写英文字母，后面可录入五个或六个字符，由大写英文字母和阿拉伯数字组成，其中第三位可录汉字也可录大写英文字母及阿拉伯数字，第三位也可空，如：WJ警00081、WJ京1234J、WJ1234X。
        3.最后一个为汉字的车牌：允许以汉字开头，后面可录入六个字符，前五位字符，由大写英文字母和阿拉伯数字组成，而最后一个字符为汉字，汉字包括“挂”、“学”、“警”、“军”、“港”、“澳”。如：粤Z1234港。
        4.新军车牌：以两位为大写英文字母开头，后面以5位阿拉伯数字组成。如：BA12345。
        */
        String pattern = "([京津沪渝冀豫云辽黑湘皖鲁新苏浙赣鄂桂甘晋蒙陕吉闽贵粤青藏川宁琼]{1}(([A-HJ-Z]{1}[A-HJ-NP-Z0-9]{5})|([A-HJ-Z]{1}(([DF]{1}[A-HJ-NP-Z0-9]{1}[0-9]{4})|([0-9]{5}[DF]{1})))|([A-HJ-Z]{1}[A-D0-9]{1}[0-9]{3}警)))|([0-9]{6}使)|((([沪粤川云桂鄂陕蒙藏黑辽渝]{1}A)|鲁B|闽D|蒙E|蒙H)[0-9]{4}领)|(WJ[京津沪渝冀豫云辽黑湘皖鲁新苏浙赣鄂桂甘晋蒙陕吉闽贵粤青藏川宁琼·•]{1}[0-9]{4}[TDSHBXJ0-9]{1})|([VKHBSLJNGCE]{1}[A-DJ-PR-TVY]{1}[0-9]{5})";
        Pattern p = Pattern.compile(pattern);
        Matcher m = p.matcher(carnumber);

        return m.matches();
    }

    public static  void main(String[] args){

        System.out.println(checkAccountName("1234567"));
        System.out.println(checkPassword("@1234567"));
        System.out.println(checkPhoneNum("22345678901"));
        System.out.println(isCarnumberNO("粤B12345"));


    }

}
