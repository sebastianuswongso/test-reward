<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {
    private $table;

    function __construct(){
        parent::__construct();
        $this->table = "public.users";
    }

    public function randomUser(){
        $from = 1;
        $to = $this->getMax();
        $randomId = rand($from, $to);

        $user = $this->findById($randomId);
        return $user;
    }

    private function getMax(){
        $this->db->select("max(id) max");
        return $this->db->get($this->table)->row()->max;
    }

    public function findAll(){
        $this->db->select("id, name, range_from, range_to");
        $this->db->order_by("id");
        return $this->db->get($this->table);
    }

    public function findById($id){
        $this->db->select("id, name, range_from, range_to");
        $this->db->where(array("id" => $id));
        return $this->db->get($this->table);
    }
}