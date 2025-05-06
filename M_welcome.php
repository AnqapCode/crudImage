<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_welcome extends CI_Model
{
    public function create($id, $filename)
    {
        $data = [
            'id'       => $id,
            'name'     => $this->input->post('name', true),
            'filename' => $filename,
        ];

        $this->db->insert('post', $data);
    }

    public function read($id = false)
    {
        if ($id === false) {
            return $this->db->get('post')->result_array();
        } else {
            $query = $this->db->get_where('post', ['id' => $id]);
            return $query->row();
        }
    }

    public function update($id, $name, $filename = "")
{
    $data = [
        'name' => $name,
    ];

    if ($filename !== "") {
        $data['filename'] = $filename;
    }

    $this->db->where('id', $id);
    $this->db->update('post', $data);
}


    
    public function delete($id){
        $this -> db -> where('id', $id);
        $this -> db -> delete('post');
    }
}
