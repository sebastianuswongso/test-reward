<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RewardService{
    private $CI;

    function __construct(){
        $this->CI =& get_instance();

        $this->CI->load->helper("ovo");
        $this->CI->load->model("Control_Model", "controlModel");
        $this->CI->load->model("User_Model", "userModel");
    }

    function processReward(){
        try {
            $limit = $this->CI->controlModel->findByControlCode("DAILY_LIMIT_REWARD")->row()->control_value;
            $dailyLimit = $limit;
            $user = $this->CI->userModel->findAll()->result();

            foreach ($user as $ruser => $fuser) {
                if ($dailyLimit >= 0) {
                    $reward = randomNumber($fuser->range_from, $fuser->range_to);
                    $overLimit = ($dailyLimit - $reward) < 0 ? true : false;

                    if (!$overLimit) {
                        $dailyLimit = $dailyLimit - $reward;

                        $fuser->reward = $reward;
                        $fuser->dailyLimit = $dailyLimit;

                    } else {
                        $fuser->reward = $dailyLimit;

                        $dailyLimit = 0;
                        $fuser->dailyLimit = 0;
                    }
                } else {
                    $fuser->reward = 0;
                    $fuser->dailyLimit = $dailyLimit;
                }
            }

            $return = array();
            $return["user"] = $user;
            $return["dailyLimit"] = $limit;
            return $return;

        }catch (Exception $e){
            return false;
        }
    }
}