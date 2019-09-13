<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH."libraries/RewardService.php");

class Testing extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library("unit_test");
    }

    public function index(){
        $reward = new RewardService();
        $this->unit->run($reward->processReward(), true, "Testing Reward Function");

        $this->load->view("test");
    }
}
