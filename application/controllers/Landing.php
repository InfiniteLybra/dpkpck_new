<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    {
        $this->load->view('templates/landing');
    }
    public function landingv4()
    {
        $this->load->view('templates/landingv4');
    }
}
