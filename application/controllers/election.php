<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Election extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('cookie');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('election_model');
		$this->load->helper('html');
		
		$data['home'] = strtolower(__CLASS__).'/';
		$this->load->vars($data);
	}
	public function index()
	{
		$data['title']="Chairman of Student Council Election";
        if(! $this->session->userdata('validated')){
            redirect('index.php?/election/login');
        }
		$data['r'] = $this->election_model->get_candidate();
		$this->load->view('election/vote', $data);
	}
	public function login()
	{
		$data['title']="Chairman of Student Council Election";
        if($this->session->userdata('validated')){
            redirect('index.php?/election/');
        }
		$this->load->view('election/login', $data);
	}
	public function vote()
	{
        if(! $this->session->userdata('validated')){
            redirect('index.php?/election/login');
        }
		$nis = $this->session->userdata('nis');
		$data['title']="Chairman of Student Council Election";
		$this->election_model->vote();
		if (($nis % 5)==3) $this->election_model->qvote();
		$this->load->view('election/thanks', $data);
		$this->output->set_header('refresh:2;url=index.php');  
		$this->election_model->invalidate();
	}
	public function sign()
	{
		$data['title']="Chairman of Student Council Election";
		$result = $this->election_model->validate();
		echo $result;
		if(!$result){
			$this->load->view('election/login_failed', $data);
			$this->output->set_header('refresh:2;url=index.php');  
		}else{
			redirect('index.php');
		}       
	}

	// ***************************** Administrator Function ********************************* //
	public function admin()
	{
		$data['title']="Chairman of Student Council Election";
        if(! $this->session->userdata('admin_validated')){
            redirect('index.php?/election/admin_login');
        }
		$this->load->view('election/admin/panel', $data);
	}
	
	public function final_count(){
		$data['title']="Chairman of Student Council Election";
        if(! $this->session->userdata('admin_validated')){
            redirect('index.php?/election/admin_login');
        }
		$this->load->library('highcharts');
		$res = $this->election_model->get_vote_count();
		$sum=0;
		$i=0; $j=0;
		$sum=0;
		foreach ($res as $row)
		{
		   $serie['data'][$i][0]= $row['nama'];
		   $sum+=(int)$row['count'];
		   $serie['data'][$i][1]= (int)$row['count'];
		   $i++;
		}
		if ($sum>0) for ($j=0; $j<$i; $j++) $serie['data'][$j][0] .= " - " . round(($serie['data'][$j][1]/$sum)*100,2) . "%";
		$this->highcharts->set_type('pie');
		$this->highcharts->set_title('FINAL COUNT', 'Insan Cendekia Election System');
		$data['sum'] = $sum; $data['v'] = TRUE; $data['res'] = $res;
		$data['charts'] = $this->highcharts->set_serie($serie)->render();
		$this->output->set_header('refresh:4;url=index.php?/election/final_count');
		$this->load->view('election/admin/finalcount', $data);
	}

	public function quick_count(){
		$data['title']="Chairman of Student Council Election";
        if(! $this->session->userdata('admin_validated')){
            redirect('index.php?/election/admin_login');
        }
		$this->load->library('highcharts');
		$res = $this->election_model->get_qvote_count();
		$sum=0;
		$i=0; $j=0;
		$sum=0;
		foreach ($res as $row)
		{
		   $serie['data'][$i][0]= $row['nama'];
		   $sum+=(int)$row['count'];
		   $serie['data'][$i][1]= (int)$row['count'];
		   $i++;
		}
		if ($sum>0) for ($j=0; $j<$i; $j++) $serie['data'][$j][0] .= " - " . round(($serie['data'][$j][1]/$sum)*100,2) . "%";
		$this->highcharts->set_type('pie');
		$this->highcharts->set_title('QUICK COUNT', 'Insan Cendekia Election System');
		$data['sum'] = $sum; $data['v'] = FALSE;
		$data['charts'] = $this->highcharts->set_serie($serie)->render();
		$this->output->set_header('refresh:4;url=index.php?/election/quick_count');
		$this->load->view('election/admin/finalcount', $data);
	}
	
	public function admin_login()
	{
		$data['title']="Chairman of Student Council Election";
        if($this->session->userdata('admin_validated')){
            redirect('index.php?/election/admin');
        }
		$this->load->view('election/admin_login', $data);
	}
	
	public function admin_sign()
	{
		$data['title']="Chairman of Student Council Election";
		$result = $this->election_model->admin_validate();
		echo $result;
		if(!$result){
			$this->load->view('election/login_failed', $data);
			$this->output->set_header('refresh:2;url=index.php?/election/admin');  
		}else{
			redirect('index.php?/election/admin');
		}       
	}
	public function admin_out()
	{
		$this->session->sess_destroy(); 
		redirect('index.php?/election/admin');
	}

	//*********************** Admin Panel **************************
	public function reset_user_login()
	{
        if(! $this->session->userdata('admin_validated')){
            redirect('index.php?/election/admin_login');
        }
		$this->election_model->reset_user_login();
		redirect('index.php?/election/admin');
	}
	public function reset_vote()
	{
        if(! $this->session->userdata('admin_validated')){
            redirect('index.php?/election/admin_login');
        }
		$this->election_model->reset_vote();
		$this->election_model->reset_qvote();
		redirect('index.php?/election/admin');
	}
	public function add_candidate()
	{
		$data['title']="Chairman of Student Council Election";
        if(! $this->session->userdata('admin_validated')){
            redirect('index.php?/election/admin_login');
        }
		$this->load->view('election/admin/addcandidate', $data);
	}
	
	public function picture($id)
	{
	$pic=$this->election_model->get_picture($id);
	$this->output->set_header('Content-type: image/jpg');
	$this->output->set_output($pic[0]['foto']);  
	}
	
	public function do_add_candidate()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg';
		$nama = $this->input->post('nama');

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto')) {
			$error = array('error' => $this->upload->display_errors()); print_r($error);
		}
		else {$data = $this->upload->data();}
		
		$data['title']="Chairman of Student Council Election";
        if(! $this->session->userdata('admin_validated')){
            redirect('index.php?/election/admin_login');
        }
		$this->election_model->add_candidate($nama, $data);
		echo img(base_url('index.php?/election/picture/'));
		redirect('index.php?/election/candidate');
	}
	
	public function dismiss($id)
	{
        if(! $this->session->userdata('admin_validated')){
            redirect('index.php?/election/admin_login');
        }
		$this->election_model->erase_candidate($id);
		redirect('index.php?/election/candidate');
	}
	public function candidate()
	{
        if(! $this->session->userdata('admin_validated')){
            redirect('index.php?/election/admin_login');
        }
		$data['title']="Chairman of Student Council Election";
		$data['r'] = $this->election_model->get_candidate();
		$this->load->view('election/admin/candidate', $data);
	}
	
	public function voters()
	{
        if(! $this->session->userdata('admin_validated')){
            redirect('index.php?/election/admin_login');
        }
		$data['title']="Chairman of Student Council Election";
		$data['r'] = $this->election_model->get_voters();
		$this->load->view('election/admin/voters', $data);
	}
}