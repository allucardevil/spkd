<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Instore extends CI_Controller {

	public function index()
	{
		$this->load->model('incoming_model');
		$data['result'] = $this->incoming_model->get_list_smu_instore();
		$this->load->view('incoming/list_smu_instore_marquee_vertical',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */