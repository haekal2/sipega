<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    Class C_start extends CI_Controller{
        public function index()
        {
            $this->load->view('v_start');
        }
    }