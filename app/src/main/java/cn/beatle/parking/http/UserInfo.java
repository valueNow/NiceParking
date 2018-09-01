package cn.beatle.parking.http;

public class UserInfo {

    /**
     * account_id : 8305EB05-8EA9-1149-D019-EB14E7087930
     * username : zhaoyanan
     * password :
     * license_plate : 京A8***
     * tel : 186***5717
     * account_type : 0
     */

    private String account_id;
    private String username;
    private String password;
    private String license_plate;
    private String tel;
    private String account_type;

    public String getAccount_id() {
        return account_id;
    }

    public void setAccount_id(String account_id) {
        this.account_id = account_id;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getLicense_plate() {
        return license_plate;
    }

    public void setLicense_plate(String license_plate) {
        this.license_plate = license_plate;
    }

    public String getTel() {
        return tel;
    }

    public void setTel(String tel) {
        this.tel = tel;
    }

    public String getAccount_type() {
        return account_type;
    }

    public void setAccount_type(String account_type) {
        this.account_type = account_type;
    }
}
