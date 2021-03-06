<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_user extends CI_Model {

    public function save_log($param) {
        $sql = $this->db->insert_string('ys_log', $param);
        $ex = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

    public function cek_user($data) {
        $query = $this->db->get_where('login', $data);
        return $query;
    }

    public function getAll($data) {
        return $this->db->get($data);
    }

    public function getAllDataLimited($table, $limit, $offset) {
        return $this->db->get($table, $limit, $offset);
    }

    public function insertData($tabelName, $data) {
        $res = $this->db->insert($tabelName, $data);
        return $res;
    }

    function user() {
        $query = $this->db->get('ys_login');
        return $query->result_array();
    }

    public function UpdateData($tabelName, $data, $where) {
        $res = $this->db->update($tabelName, $data, $where);
        return $res;
    }

    function tambah($data) {
        $this->db->insert('ys_login', $data);
        return TRUE;
    }

    function edit($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('ys_login', $data);
        return TRUE;
    }

    public function deletedata($tabelName, $where) {
        $res = $this->db->delete($tabelName, $where);
        return $res;
    }

    public function getakun($table, $data) {
        return $this->db->get_where($table, $data);
    }

    function updateakun($table, $data, $field_key) {
        $this->db->update($table, $data, $field_key);
    }

    function ambildata($perPage, $uri, $ringkasan) {
        $this->db->select('*');
        $this->db->from('ys_login');
        if (!empty($ringkasan)) {
            $this->db->like('username', $ringkasan);
        }
        $this->db->order_by('id', 'asc');
        $getData = $this->db->get('', $perPage, $uri);

        if ($getData->num_rows() > 0)
            return $getData->result_array();
        else
            return null;
    }
    function getArtikel()
    {
        $query = $this->db->get('ys_berita');
        return $query->result_array();
    }
    function new_artikel($data) {
        $this->db->insert('ys_berita', $data);
        return TRUE;
    }
    function tampilartikel() {
        $this->db->where('stts','aktif');
        $query = $this->db->get('ys_berita');        
        return $query->result_array();
    }
    //pagination
    function data($number,$offset){
        return $query = $this->db->get('ys_login',$number,$offset)->result();
        
    }
    function jumlah_data(){
        return $this->db->get('ys_login')->num_rows();
    }
    public function editArtikel($where,$table){
        return $this->db->get_where($table,$where);
    }
    public function do_edit_artikel($where,$data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function status() {
        $query = $this->db->get('status');
        return $query->result_array();
    }
}

?>