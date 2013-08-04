<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Harian extends CI_Controller {

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
		redirect('harian/outgoing');
	}
	
	public function outgoing()
	{
		$this->load->model('airline_model');
		$data['airline'] = $this->airline_model->get_all_airline();
		$this->load->view('template/header');
		$this->load->view('template/breadcumb');
		$this->load->view('harian/outgoing', $data);
		$this->load->view('template/footer');	
	}
	
	
	
	public function outgoing_result()
	{
		$date = mdate('%Y-%m-%d', strtotime($this->input->post('date')));
		$data['date'] = $date;
		$airline = $this->input->post('airline');
		$data['airline'] = $airline;
		
		$this->load->model('harian_model');
		$data['details'] = $this->harian_model->details_outgoing($date, $airline);
		$data['total'] = $this->harian_model->get_total_outgoing($date, $airline);
		
		$this->load->view('template/header');
		$this->load->view('template/breadcumb');
		$this->load->view('harian/details_outgoing', $data);
		$this->load->view('template/footer');
	}
	

	public function outgoing_pdf()
	{
		$date = $this->uri->segment(4, mdate("%Y-%m-%d", time()));
		$data['date'] = $date;
		$airline = $this->uri->segment(3, 'ga');
		$data['airline'] = $airline;
		
		$this->load->model('harian_model');
		$data['details'] = $this->harian_model->details_outgoing($date, $airline);
		$data['total'] = $this->harian_model->get_total_outgoing($date, $airline);
		
		$this->load->helper('sigap_pdf');
		$stream = TRUE; 
		$papersize = 'legal'; 
		$orientation = 'landscape';
		$filename = 'lpkh-outgoing-'.$airline.'-'.$date;
		$stn = $this->input->post('hs_service_site');
		$html = $this->load->view('harian/details_pdf_outgoing',$data, true); 
     	pdf_create($html, $filename, $stream, $papersize, $orientation, $stn);
		$full_filename = $filename . '.pdf';
	}

	public function incoming()
	{
		$this->load->model('airline_model');
		$data['airline'] = $this->airline_model->get_all_airline();
		$this->load->view('template/header');
		$this->load->view('template/breadcumb');
		$this->load->view('harian/incoming', $data);
		$this->load->view('template/footer');	
	}
	
	
	public function incoming_result()
	{
		$date = mdate('%Y-%m-%d', strtotime($this->input->post('date')));
		$data['date'] = $date;
		$airline = $this->input->post('airline');
		$data['airline'] = $airline;
		
		# redirect model due database change on 01-08-2013
		if($date < '2013-08-02')
		{
			$data_type = 'v2';
		}
		else
		{
			$data_type = 'v3';
		}
		
		$this->load->model('harian_model');
		$data['details'] = $this->harian_model->details_incoming($date, $airline, $data_type);
		#$data['total'] = $this->harian_model->get_total_incoming($date, $airline);
		
		#print_r($data);
		
		if($data_type == 'v2')
		{
			$this->load->view('template/header');
			$this->load->view('template/breadcumb');
			$this->load->view('harian/details_incoming', $data);
			$this->load->view('template/footer');
		}
		else
		{
			$this->load->view('template/header');
			$this->load->view('template/breadcumb');
			$this->load->view('harian/v3_details_incoming', $data);
			$this->load->view('template/footer');
		}

	}
	
	public function incoming_pdf()
	{
		$date = $this->uri->segment(4, mdate("%Y-%m-%d", time()));
		$data['date'] = $date;
		$airline = $this->uri->segment(3, 'ga');
		$data['airline'] = $airline;
    
	# redirect model due database change on 01-08-2013
		if($date < '2013-08-02')
		{
			$data_type = 'v2';
		}
		else
		{
			$data_type = 'v3';
		}
	
		$this->load->model('harian_model');
		$data['details'] = $this->harian_model->details_incoming($date, $airline, $data_type);
		$data['total'] = $this->harian_model->get_total_incoming($date, $airline);
		
	   /*$this->load->view('template/header');
		$this->load->view('template/breadcumb');
		$this->load->view('harian/details', $data);
		$this->load->view('template/footer');*/
    
    	$this->load->helper('sigap_pdf');
    
		# PDF Maker
		$stream = TRUE; 
		$papersize = 'legal'; 
		$orientation = 'landscape';
		$filename = 'lpkh-incoming-'.$airline.'-'.$date;
		$stn = $this->input->post('hs_service_site');
    
			if($data_type == 'v2')
			{
				$html = $this->load->view('harian/details_pdf_incoming',$data, true); 
			}
			else
			{
				$html = $this->load->view('harian/v3_details_pdf_incoming',$data, true); 
			}
		
		pdf_create($html, $filename, $stream, $papersize, $orientation, $stn);
		$full_filename = $filename . '.pdf';		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */