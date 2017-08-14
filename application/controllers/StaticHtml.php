<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaticHtml extends CI_Controller {
    public function about(){
        $data['host'] = "http://".$_SERVER['HTTP_HOST']."/";
        $this->load->view('about/about',$data);
    }
    public function fzs(){
        $data['host'] = "http://".$_SERVER['HTTP_HOST']."/";
        $this->load->view('fanwei/fzs',$data);
    }
    
    public function guanjia(){
        $this->load->model('Guanjia_model');
        $data['host'] = "http://".$_SERVER['HTTP_HOST']."/";
        $modle = new Guanjia_model();
        $list = $modle->getList();
        $data['list'] = $list;
        $this->load->view('guanjia/guanjia',$data);
    }
    
    public function service(){
        $data['host'] = "http://".$_SERVER['HTTP_HOST']."/";
        $this->load->view('about/service',$data);
    }
    
    public function packages(){
        $data['host'] = "http://".$_SERVER['HTTP_HOST']."/";
        $this->load->view('about/packages',$data);
    }
    
     public function shenqing(){
        if(!empty($_POST)){
            $query = array();
            $query['keeper_surname'] = $_POST['surname'];
            $query['keeper_sex'] = $_POST['radio-1-set'];
            $query['keeper_name'] = $_POST['name'];
            $query['e_name'] = $_POST['englishName'];
            $query['phone'] = $_POST['tel'];
            $query['address'] = $_POST['sqAdress'];
            $guanjia = new Guanjia_model();
            $result = $guanjia->insert($query);
            if($result){
                redirect('Jump/ok');
            }else{
                redirect('Jump/ok?false=true');
            }
        }
        $data['host'] = "http://".$_SERVER['HTTP_HOST']."/";
        $this->load->view('guanjia/shenqing',$data);
    }

    public function chongzhi(){
        $data['host'] = "http://".$_SERVER['HTTP_HOST']."/";
        $this->load->view('chongzhi/chongzhi',$data);
    }
    public function fanwei(){
        $data['host'] = "http://".$_SERVER['HTTP_HOST']."/";
        $this->load->view('fanwei/fanwei',$data);
    }

    public function fankui(){
        if(!empty($_POST)){
             $this->load->database();
             $this->load->helper('url');
             $sql = "INSERT INTO feedback_detail (detail, contact,create_date) "
                     . "VALUES (".$this->db->escape($_POST['desc']).", ".$this->db->escape($_POST['call']).",now())";
             $this->db->query($sql);
             $num = $this->db->affected_rows();
             if($num>0){
                 redirect('Jump/ok');
             }else{
                 redirect('Jump/ok?false=true');
             }
        }

        $data['host'] = "http://".$_SERVER['HTTP_HOST']."/";
        $this->load->view('fankui/fankui',$data);
    }
}