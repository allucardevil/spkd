<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Incoming extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		redirect('incoming/add_manifest_instore');
	}
	
	############ Instore #############
	
	public function add_manifest_instore()
	{
		$this->load->model('incoming_model');
		$smu = $this->uri->segment(3);
		
		$data['result'] = $this->incoming_model->get_data_inbreakdown($smu);	
		$this->load->view('template/header');
		$this->load->view('template/breadcumb');
		$this->load->view('incoming/menu');
		$this->load->view('incoming/add_manifestin_instore',$data);
		$this->load->view('template/footer');	
	}
	
	public function insert_manifest_instore()
	{
		if(substr_count($this->input->post('incoming') , '/') !== 3 )
		{	
			# fail format input, redirect to form add
			redirect('incoming/add_manifest_instore/error');
		}
		else
		{
			#format input true, check type data input
			$incoming = explode('/',$this->input->post('incoming'));
			
			// pemberian nilai variabel
			$airlines = $incoming[0];
			$smu = $incoming[1];
			$koli = $incoming[2];
			$berat = $incoming[3];
			$status = 'instore';
			
			# call model
			$this->load->model('incoming_model');
			
			if ( ($this->incoming_model->is_alphanumeric($airlines) == FALSE) OR (!is_numeric($koli)) OR (!is_numeric($berat))  )
			{
				# fail redirect to form add
				redirect('incoming/add_manifest_instore/'.$smu.'/error');
			} 
			else 
			{
				# success
				$this->load->model('incoming_model');
				$this->incoming_model->insert_data_in_breakdown($airlines,$smu,$koli,$berat,$status);
				
				redirect('incoming/add_manifest_instore/'.$smu.'/success');
			}
		}
	}
	
	############ Outstore ##############
	public function add_manifest_outstore()
	{
		$this->load->model('incoming_model');
		$smu = $this->uri->segment(3);
		$data['result'] = $this->incoming_model->get_data_inbreakdown($smu);	
		$this->load->view('template/header');
		$this->load->view('template/breadcumb');
		$this->load->view('incoming/menu');
		$this->load->view('incoming/add_manifestin_outstore',$data);
		$this->load->view('template/footer');	
	}
	
	
	public function insert_manifest_outstore()
	{
		if(substr_count($this->input->post('incoming') , '/') !== 4 )
		{	
			# fail format input, redirect to form add
			redirect('incoming/add_manifest_outstore/error');
		}
		else
		{
			#format input true, check type data input
			$incoming = explode('/',$this->input->post('incoming'));
			
			// pemberian nilai variabel
			$airlines = $incoming[0];
			$flt = $incoming[1];
			$smu = $incoming[2];
			$koli = $incoming[3];
			$berat = $incoming[4];
			$status = 'outstore';
			$date = mdate("%Y-%m-%d", time());
			# call model
			$this->load->model('incoming_model');
			
			if ( ($this->incoming_model->is_alphanumeric($airlines) == FALSE) OR (!is_numeric($koli)) OR (!is_numeric($berat))  )
			{
				# fail redirect to form add
				redirect('incoming/add_manifest_outstore/'.$smu.'/error');
			} 
			else 
			{
				# success
				$this->load->model('incoming_model');
				$this->incoming_model->insert_data_in_breakdown_outstore($airlines,$flt,$smu,$koli,$berat,$status, $date);
				
				redirect('incoming/add_manifest_outstore/'.$smu.'/success');
			}
		}
	}
	
	############ BTB #############
	public function form_create_btb()
	{
		$this->load->model('incoming_model');
		$id_breakdown = $this->uri->segment(3, 0);
		$data['typebarang'] = $this->incoming_model->get_all_type_barang();
		$data['agent'] = $this->incoming_model->get_all_agent();
		
		if($id_breakdown == 0)
		{
			$this->load->view('template/header');
			$this->load->view('template/breadcumb');
			$this->load->view('incoming/menu');
			$this->load->view('incoming/form_create_btb',$data);
			$this->load->view('template/footer');	
		}
		else
		{
			$this->load->model('incoming_model');
			$data['result'] = $this->incoming_model->get_data_in_breakdown_by_id($id_breakdown);
			$this->load->view('template/header');
			$this->load->view('template/breadcumb');
			$this->load->view('incoming/menu');
			$this->load->view('incoming/form_create_btb',$data);
			$this->load->view('template/footer');	
		}
	}
	
	public function search_form_create_btb()
	{
		$smu = $this->input->post('smu');
		$this->load->model('incoming_model');
		
		$id_breakdown = $this->incoming_model->get_id_breakdown($smu);
		redirect('incoming/form_create_btb/'.$id_breakdown);
	}
	
	public function create_btb()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('agent', 'agent', 'required');
		$this->form_validation->set_rules('airline', 'airline', 'required');		
		$this->form_validation->set_rules('typebarang', 'typebarang', 'required');		
		if ($this->form_validation->run() == FALSE)
		{
			$smu = $this->input->post('smu');
			redirect('incoming/add_manifest_instore/'.$smu);
		}
		else
		{
			$inb_id = $this->input->post('inb_id');
			$agent = $this->input->post('agent');
			$airline = $this->input->post('airline');
			$asal = $this->input->post('asal');
			$tujuan = $this->input->post('tujuan');
			$smu = $this->input->post('smu');
			$typebarang = $this->input->post('typebarang');
			$noflight = $this->input->post('noflight');
			$koli = $this->input->post('koli');
			$berataktual = $this->input->post('berataktual');
			$beratvolume = $this->input->post('beratvolume');
			//$tglmanifest = $this->input->post('tglmanifest');
			
			$tglmanifest = date('Y-m-d');
			
			$this->load->model('incoming_model');
			#generate_btb_no
			$btb_no = $this->incoming_model->generate_btb_no();
			
			
			#insert btb
			$data_btb = array(
				'in_btb' => $btb_no,
				'in_agent' => $agent,
				'in_airline' => $airline,
				'in_asal' => $asal,
				'in_tujuan' => $tujuan,
				'in_smu' => $smu,
				'in_jenisbarang' => $typebarang,
				'in_noflight' => $noflight,
				'in_tgl_manifest' => $tglmanifest,
				'in_koli' => $koli,
				'in_berat_datang' => $berataktual,
				
			);
			
			$this->incoming_model->insert_data_btb($data_btb);
			redirect('incoming/print_incoming_btb/'.$btb_no);
		}
	}
	
	public function print_incoming_btb($btb_no)
	{
		$this->load->model('incoming_model');
		$data['detail'] = $this->incoming_model->get_detail_btb_by_btb_no($btb_no);
		$data['detail_berat'] = $this->incoming_model->get_detail_berat_btb_by_btb_no($btb_no);
		
		#View Call
		$this->load->helper('sigap_pdf');
		$this->load->view('incoming/print_btb_incoming',$data);
		
		//PDF Maker
		$stream = TRUE; 
		$papersize = 'legal'; 
		$orientation = 'potrait';
		$filename = 'print-incoming-btb';
		$stn = $this->input->post('hs_service_site');
		$html = $this->load->view('incoming/print_btb_incoming', $data, true);
		pdf_create($html, $filename, $stream, $papersize, $orientation, $stn);
		$full_filename = $filename . '.pdf';
	}
	
	public function form_search_btb()
	{
		$smu = $this->uri->segment(3);
		$this->load->model('incoming_model');
		$data['result'] = $this->incoming_model->get_data_breakdown($smu);
		#print_r($data);
		$this->load->view('template/header');
		$this->load->view('template/breadcumb');
		$this->load->view('incoming/menu');
		$this->load->view('incoming/form_search_btb',$data);
		$this->load->view('template/footer');	
	}
	
	public function search_btb()
	{
		$smu = $this->input->post('smu');
		redirect('incoming/form_search_btb/'.$smu);
	}
	
	public function void_breakdown()
	{
		$inb_id = $this->uri->segment(3,0);
		$this->load->model('incoming_model');
		$this->incoming_model->update_status_void_breakdown($inb_id);
		redirect('incoming');
	}
	
	public function void_breakdown_btb()
	{
		$inb_id = $this->uri->segment(3,0);
		$this->load->model('incoming_model');
		$this->incoming_model->update_status_void_breakdown($inb_id);
		redirect('incoming');
	}
	
	public function search_smu_breakdown()
	{
		$this->load->model('incoming_model');
		$smu = $this->uri->segment(3,0);
		if($smu == 0){
			$data['result'] = $this->incoming_model->get_data_inbreakdown_btb($smu);	
			$this->load->view('template/header');
			$this->load->view('template/breadcumb');
			$this->load->view('incoming/menu');
			$this->load->view('incoming/list_btb_breakdown',$data);
			$this->load->view('template/footer');	
		} else {
			$date = date('Y-m-d');
			$data['result'] = $this->incoming_model->get_data_inbreakdown_btb_by_date($date);	
			$this->load->view('template/header');
			$this->load->view('template/breadcumb');
			$this->load->view('incoming/menu');
			$this->load->view('incoming/list_btb_breakdown',$data);
			$this->load->view('template/footer');	
		}
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */