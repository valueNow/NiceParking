package cn.beatle.parking.http;

import android.text.TextUtils;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Locale;

public class OrderBean {

    /**
     * order_id : 20180828113414
     * order_state : 0
     * order_start_time : 201808280900
     * order_end_time : 201808282000
     * order_price : 0.00
     * order_attribution : 1A02889A-A432-630C-9643-81B778D0B78A
     * park_id : E648D777-E5FD-E6C2-E977-D6D1A46C45D7
     * park_name : 北京市劳动人民文化宫停车场
     * park : {"park_id":"E648D777-E5FD-E6C2-E977-D6D1A46C45D7","name":"北京市劳动人民文化宫停车场","park_num":"54","free_num":"347","business_time":"9:00-24:00","tel":"010-48664841","address":"北京市东城区东华门街道西配殿北京市劳动人民文化宫","position":"[116.39892650984923,39.91144776521974]"}
     * license_plate : 冀AF73L8
     */

    private String order_id;
    private String order_state;
    private String order_start_time;
    private String order_end_time;
    private String order_price;
    private String order_attribution;
    private String park_id;
    private String park_name;
    private ParkingBean park;
    private String license_plate;
    private String order_time;

    public String getOrder_id() {
        return order_id;
    }

    public void setOrder_id(String order_id) {
        this.order_id = order_id;
    }

    public String getOrder_state() {
        return order_state;
    }

    public void setOrder_state(String order_state) {
        this.order_state = order_state;
    }

    public String getOrder_start_time() {
        return order_start_time;
    }

    public void setOrder_start_time(String order_start_time) {
        this.order_start_time = order_start_time;
    }

    public String getOrder_end_time() {
        return order_end_time;
    }

    public void setOrder_end_time(String order_end_time) {
        this.order_end_time = order_end_time;
    }

    public String getOrder_price() {
        return order_price;
    }

    public void setOrder_price(String order_price) {
        this.order_price = order_price;
    }

    public String getOrder_attribution() {
        return order_attribution;
    }

    public void setOrder_attribution(String order_attribution) {
        this.order_attribution = order_attribution;
    }

    public String getPark_id() {
        return park_id;
    }

    public void setPark_id(String park_id) {
        this.park_id = park_id;
    }

    public String getPark_name() {
        return park_name;
    }

    public void setPark_name(String park_name) {
        this.park_name = park_name;
    }

    public ParkingBean getPark() {
        return park;
    }

    public void setPark(ParkingBean park) {
        this.park = park;
    }

    public String getLicense_plate() {
        return license_plate;
    }

    public void setLicense_plate(String license_plate) {
        this.license_plate = license_plate;
    }

    public String getOrder_time() {
        return order_time;
    }

    public void setOrder_time(String order_time) {
        this.order_time = order_time;
    }

    public void setParkingBeanState() {
        if ("0".equals(order_state)) park.orderSucc = true;
        else park.orderSucc = false;
    }

    public void setCarNo(){
        if(!TextUtils.isEmpty(license_plate)){
            String old = license_plate.substring(3,6);
            license_plate = license_plate.replace(old,"***");
        }
    }

    public void formatTime(){
        try {
            SimpleDateFormat sdf = new SimpleDateFormat("yyyyMMddHHmmss", Locale.getDefault());
            SimpleDateFormat sdfT = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
            order_time = sdfT.format(sdf.parse(order_id));
        } catch (ParseException e) {
            e.printStackTrace();
        }
    }
}
