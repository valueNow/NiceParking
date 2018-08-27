package cn.beatle.parking.http;

import android.os.Handler;
import android.os.Message;
import android.webkit.JavascriptInterface;

/**
 * Created by coolyou on 2017/3/10.
 */

public class JSAction {

    //event id
    public static final int EVENT_ID_JUMP_TO_ORDER = 0x001;//弹框充值

    private Handler mJSEventHandler;

    public JSAction(Handler jsEvent) {
        mJSEventHandler = jsEvent;
    }

    @JavascriptInterface
    public void order(String orderInfo) {
        Message msg = mJSEventHandler.obtainMessage();
        msg.what = EVENT_ID_JUMP_TO_ORDER;
        msg.obj = orderInfo;
        mJSEventHandler.sendMessage(msg);
    }
}
