<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login extends CI_Controller {
     public function index() {
        $this->load->model('Admin_model');
        $this->load->helper('url');
        if(!empty($_GET['tel'])){
            $modle = new Admin_model();
            $check_login = $modle->checkLogin($_GET['tel'], $_GET['tel_code']);
            if($check_login){
                $modle->insertLogin($_GET['tel']);
                setcookie("login_tel",$_GET['tel'], time()+3600*2);
                redirect('StaticHtml/packages');
                exit;
            }
        }
        $data['host'] = "http://" . $_SERVER['HTTP_HOST'] . "/";
        $this->load->view('login/login', $data);
    }
    public function Ok() {
        $data['host'] = "http://" . $_SERVER['HTTP_HOST'] . "/";
        $this->load->view('login/ok', $data);
    }

    public function getcode(){
        $this->load->model('Admin_model');
        $this->load->model('Phone_model');
         $modle = new Admin_model();
         $phone = new Phone_model();
         $code = $this->getCodeRand();
         $send_result = $phone->sendCode($code,$_REQUEST['phone']);
         $insert_code = $modle->insertCode(array('phone'=>$_REQUEST['phone'],'code'=>$code,'result'=>$phone->_error));
         if(!$send_result){
             echo "false:{$phone->_error}";exit;
         }        
         if($insert_code){
             echo "ok";
         }else{
             echo "false";
         }
    }
    private function getCodeRand(){
        return rand(10000, 99999);
    }
}