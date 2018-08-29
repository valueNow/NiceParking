package cn.beatle.parking.http;

public class    ParkingBean {

    /**
     * img : http://114.215.45.240:90/img/station/67.jpg
     * count : 694
     * lostCount : 375
     * yysj : 9:00-24:00
     * position : [116.40051803392168,39.91041394071083]
     * distance : 295
     * name : 北京市劳动人民文化宫停车场
     * address : 北京市东城区东华门街道中国艺术节基金会北京市劳动人民文化宫
     * number : 010-56648165
     * id : E31C9DC3-767F-C5C3-C301-45DBB4FD271E
     */

    private String img;
    private int count;
    private int lostCount;
    private String yysj;
    private String position;
    private int distance;
    private String name;
    private String address;
    private String number;
    private String id;
    public boolean orderSucc;

    public String getImg() {
        return img;
    }

    public void setImg(String img) {
        this.img = img;
    }

    public int getCount() {
        return count;
    }

    public void setCount(int count) {
        this.count = count;
    }

    public int getLostCount() {
        return lostCount;
    }

    public void setLostCount(int lostCount) {
        this.lostCount = lostCount;
    }

    public String getYysj() {
        return yysj;
    }

    public void setYysj(String yysj) {
        this.yysj = yysj;
    }

    public String getPosition() {
        return position;
    }

    public void setPosition(String position) {
        this.position = position;
    }

    public int getDistance() {
        return distance;
    }

    public void setDistance(int distance) {
        this.distance = distance;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public String getNumber() {
        return number;
    }

    public void setNumber(String number) {
        this.number = number;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }
}
