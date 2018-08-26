package cn.beatle.parking.http;

import com.loopj.android.http.AsyncHttpClient;
import com.loopj.android.http.AsyncHttpResponseHandler;
import com.loopj.android.http.BinaryHttpResponseHandler;
import com.loopj.android.http.JsonHttpResponseHandler;
import com.loopj.android.http.RequestParams;

public class HttpUtil {
    private static AsyncHttpClient client = new AsyncHttpClient(); // 实例话对象

    static {
        client.setTimeout(11000); // 设置链接超时，如果不设置，默认为10s
    }

    public static void get(String urlString, AsyncHttpResponseHandler res) // 用一个完整url获取一个string对象
    {
        client.get(urlString, res);
    }

    public static void get(String urlString, RequestParams params,
                           AsyncHttpResponseHandler res) // url里面带参数
    {
        client.get(urlString, params, res);
    }

    public static void get(String urlString, JsonHttpResponseHandler res) // 不带参数，获取json对象或者数组
    {
        client.get(urlString, res);
    }

    public static void get(String urlString, RequestParams params, JsonHttpResponseHandler res) // 带参数，获取json对象或者数组
    {
        client.get(urlString, params, res);
    }

    public static void get(String uString, BinaryHttpResponseHandler bHandler) // 下载数据使用，会返回byte数据
    {
        client.get(uString, bHandler);
    }

    public static AsyncHttpClient getClient() {
        return client;
    }

    public static void post(String url, RequestParams params, AsyncHttpResponseHandler res) {
        client.post(url, params, res);
    }
    public static void postVideoSign(String url, RequestParams params, AsyncHttpResponseHandler res) {
        AsyncHttpClient client = new AsyncHttpClient();
        client.addHeader("Referer","http://www.zhibo.tv/");
//        client.addHeader("user-agent","http://www.zhibo.tv/");
        client.post(url, params, res);
    }

    public static RequestParams getMD5RequestParams(String... params) {
        RequestParams requestParams = new RequestParams();
        StringBuffer stringBuffer = new StringBuffer(Urls.REQUEST_PRIVATE_KEY);

        for (String s : params) {
            stringBuffer.append(s);
        }

        String addition = "" + System.currentTimeMillis();
        stringBuffer.append(addition);
        requestParams.put("key", MD5Util.getMD5Str("rest" + MD5Util.getMD5Str(stringBuffer.toString()) + "upload"));
        requestParams.put("addition", addition);

        return requestParams;
    }

}
