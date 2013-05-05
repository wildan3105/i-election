<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Election_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
     
    public function validate(){
        // grab user input
        $username = $this->input->post('nis');
        $password = $this->input->post('pass');
        // Prep the query
        $this->db->where('B', $username);
        $this->db->where('C', $password);
		$this->db->where('D', 0);
		
        // Run the query
        $query = $this->db->get('login');
		
        if($query->num_rows == 1)
        {
            $row = $query->row();
            $data = array(
                    'nis' => $username,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        return false;
    }
    public function invalidate(){
		$data = array(
			'nis' => '',
			'validated' => false
			);
		$this->session->set_userdata($data);
		return false;
    }
    public function admin_validate(){
        // grab user input
        $username = $this->input->post('username');
        $password = $this->input->post('pass');
        // Prep the query
        $this->db->where('username', $username);
        $this->db->where('pass', md5($password.".islam"));
         
        // Run the query
        $query = $this->db->get('admin');
		
        if($query->num_rows == 1)
        {
            $row = $query->row();
            $data = array(
                    'nis' => $row->nis,
                    'admin_validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        return false;
    }
    public function vote(){
        $vote = $this->input->post('vote');
		$this->db->set('count', 'count+1', FALSE);
		$this->db->where('id', $vote);
		$this->db->update('result');

		$username=$this->session->userdata('nis');
                // hak login telah dipakai
                $this->db->set('D', '1', FALSE);
                $this->db->where('B', $username);
                $this->db->update('login');
    }
    public function qvote(){
        $vote = $this->input->post('vote');
		$this->db->set('count', 'count+1', FALSE);
		$this->db->where('id', $vote);
		$this->db->update('qresult');
    }
    public function reset_user_login(){
		$this->db->set('D', '0', FALSE);
		$this->db->where('D', '1');
		$this->db->update('login'); 
    }
    public function reset_vote(){
		$this->db->set('count', '0', FALSE);
		$this->db->update('result'); 
    }
    public function reset_qvote(){
		$this->db->set('count', '0', FALSE);
		$this->db->update('qresult'); 
    }
	public function get_vote_count(){
		$this->db->select('candidate.nama, count');
		$this->db->from('result');
		$this->db->join('candidate', 'result.id = candidate.id');
		$query = $this->db->get();
		return $query->result_array();
    }
	
	public function get_qvote_count(){
		$this->db->select('candidate.nama, count');
		$this->db->from('qresult');
		$this->db->join('candidate', 'qresult.id = candidate.id');
		$query = $this->db->get();
		return $query->result_array();
    }
	
	public function add_candidate($nama, $data){
	
		$this->db->select('max(id)');
		$this->db->from('candidate');
		$query = $this->db->get();
		$z = $query->result_array();
		$insert_data = array(
			'id'   => $z[0]['max(id)']+1, 
			'nama' => $nama,
			'foto' => file_get_contents($data['full_path'])
		);
		$insert_data2 = array('id'   => $z[0]['max(id)']+1, 'count' => 0);
		$this->db->insert('candidate', $insert_data);
		$this->db->insert('result', $insert_data2);
		$this->db->insert('qresult', $insert_data2);
	}
	public function get_picture($id){
		$this->db->select('foto');
		$this->db->from('candidate');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_candidate(){
		$this->db->select('partai, id, nama');
		$this->db->from('candidate');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_voters(){
		$this->db->select('A, B, C, D');
		$this->db->from('login');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function erase_candidate($id){
		$this->db->delete('result', array('id' => $id)); 
		$this->db->delete('qresult', array('id' => $id)); 
		$this->db->delete('candidate', array('id' => $id)); 
	}
}
?>
