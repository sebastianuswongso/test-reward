<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Control_Model extends CI_Model {
    private $table;

    function __construct(){
        parent::__construct();
        $this->table = "control";
    }

    public function findAll(){
        $this->db->select("id, control_code, control_value");
        return $this->db->get($this->table);
    }

    public function findById($id){
        $this->db->select("id, control_code, control_value");
        $this->db->where(array("id" => $id));
        return $this->db->get($this->table);
    }

    public function findByControlCode($code){
        $this->db->select("id, control_code, control_value");
        $this->db->where(array("control_code" => $code));
        $result = $this->db->get($this->table);
        return $result;
    }
}