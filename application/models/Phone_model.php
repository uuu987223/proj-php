<?php

class Phone_model extends CI_Model {

    private $serverUrl = "http://sms2.infocall.cn/SendSmsUTF8.ashx";  //服务器http地址
    public $_error  =null;

    private function getReqData($code,$phone) {

        $reqSignKey = "ZKXB2005";                   //密码
        $user = "ZKXB";                      //账户
        $mobiles = $phone;                 //接受短信号码【请替换成测试号码】
        $content = "您的验证码是" . $code . "，5分钟内有效"; //生成短信验证码，需要提前备案
        $spcode = "";                         //无特殊说明，赋值为空
        $smssign = "中科讯博";                    //短信签名，需要提前备案
        $reqsign = hash("sha256", $content . "&" . $reqSignKey . "&" . $mobiles); //验证串

        $reqData = "user=" . $user . "&reqsign=" . $reqsign . "&mobiles=" . $mobiles . "&content=" . $content . "&spcode=" . $spcode . "&smssign=" . $smssign; //http请求数据
        return $reqData;
    }
    
    public function sendCode($code,$phone){
        $dataStr  = $this->getReqData($code,$phone);
        $result = $this->sendCurlPost($this->serverUrl, $dataStr);
        $this->_error = $result;
        $result = json_decode($result,true);
        if($result['result']==-400 or $result['result']==-200){
            return false;
        }
        if($result['result']==0){
            return true;
        }
        return false;
    }

    private function sendCurlPost($url, $dataStr) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dataStr);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $ret = curl_exec($curl);

        if (false == $ret) {
            //请求失败
            $result = "{ \"result\":" . -400 . ",\"msg\":\"" . curl_error($curl) . "\"}";
        } else {
            $rsp = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if (200 != $rsp) {//服务器返回非200状态
                $result = "{ \"result\":" . -200 . ",\"msg\":\"" . $rsp . " " . curl_error($curl) . "\"}";
            } else {
                $result = $ret;
            }
        }
        curl_close($curl);
        return $result;
    }

}