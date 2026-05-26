<?php
defined('BASEPATH')OR exit ('No direct script acces allowed');

class buku_model extends CI_Model{

    private $table='buku';

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }
    public function get_by_id($id_buku)
    {
        //return $this->db->get_where($this->table,['id =>$id'])->row();
        $this->db->where('id_buku',$id_buku);
        return $this->db->get('buku')->row();
    }
    public function insert($data)
    {
        return $this->db->insert($this->table,$data);
    }
    public function delete($id_buku)
    {
        return $this->db->delete($this->table,['id_buku'=>$id_buku]);
    } 
    public function update($id_buku, $data)
    {
        $this->db->where('id_buku', $id_buku);
        return $this->db->update($this->table, $data);
    }
}