<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        parent::__construct();
        date_default_timezone_set("Asia/Shanghai");
        // Your own constructor code
    }

    public function insertLogin($phone) {
        $phone = $this->db->escape($phone);
        $sql = "insert into admin (login_name,login_type,login_time,create_date)values({$phone},1,now(),";
        $sql .="now())ON DUPLICATE KEY UPDATE login_time=now()";
        $query = $this->db->query($sql);
        $num = $this->db->affected_rows();
        if ($num > 0) {
            return true;
        } else {
            return false;
        }      
    }

    public function checkLogin($phone, $code) {
        $phone = $this->db->escape($phone);
        $code = (int) $code;
        $time = date('Y-m-d H:i:s', time() - 15 * 60);
        $sql = "select phone_code_id from phone_code where phone={$phone} and code={$code} and create_date>'{$time}' order "
                . "by phone_code_id desc limit 1";
        $query = $this->db->query($sql);
        foreach ($query->result() as $row) {
            if ($row->phone_code_id > 0) {
                return TRUE;
            }
        }
        return false;
    }

    public function insertCode($query) {
        $sql = "insert into phone_code (phone,code,result,create_date)values(";
        $sql.="{$this->db->escape($query['phone'])},";
        $sql.="{$this->db->escape($query['code'])},";
        if (!empty($query['result'])) {
            $sql.="{$this->db->escape($query['result'])},";
        } else {
            $sql.="' ',";
        }
        $sql .="now())";
        $query = $this->db->query($sql);
        $num = $this->db->affected_rows();
        if ($num > 0) {
            return true;
        } else {
            return false;
        }
    }

}
