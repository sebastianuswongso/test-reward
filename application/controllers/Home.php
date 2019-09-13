<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH."libraries/RewardService.php");

class Home extends CI_Controller {
    function __construct(){
        parent::__construct();
    }

    public function index(){
        $reward = new RewardService();
        $rewardList = $reward->processReward();

        $data = array();
        $data["user"] = $rewardList["user"];
        $data["dailyLimit"] = $rewardList["dailyLimit"];
		$this->load->view('home', $data);
	}
}
