<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Jump extends CI_Controller {

    public function Ok() {
        $data['host'] = "http://" . $_SERVER['HTTP_HOST'] . "/";
        $this->load->view('ok', $data);
    }

}
