<?php

class Guanjia_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
        parent::__construct();
        // Your own constructor code
    }
    public function insert($query){
        $sql = "insert into house_keeper (keeper_surname,keeper_name,e_name,phone,address,keeper_sex)values(";
        $sql.="'{$this->db->escape($query['keeper_surname'])}',";
        $sql.="'{$this->db->escape($query['keeper_name'])}',";
        $sql.="'{$this->db->escape($query['e_name'])}',";
        $sql.="'{$this->db->escape($query['phone'])}',";
        $sql.="'{$this->db->escape($query['address'])}',";
        $sql.="'{$this->db->escape($query['keeper_sex'])}'";
        $sql .=")";
        $query = $this->db->query($sql);
        $num = $this->db->affected_rows();
        if($num>0){
            return true;
        }else{
            return false;
        }
    }

    public function getList() {
        $result = array();
        $query = $this->db->query('SELECT keeper_surname,keeper_name, keeper_desc, phone,pic,level FROM house_keeper where is_del=0');
        foreach ($query->result() as $row) {
            $temp = array();
            $temp['name'] = $row->keeper_surname.$row->keeper_name;
            $temp['desc'] = $row->keeper_desc;
            $temp['phone'] = $row->phone;
            $temp['pic'] = $row->pic;
            $temp['level'] = $row->level;
            $result[] = $temp;
        }
        return $result;
    }

}
