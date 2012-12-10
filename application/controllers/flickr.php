
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Flickr extends CI_Controller{
    function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		session_start();

		$qry = $this->input->post('text1');
		if($qry != '')
			$this->session->set_userdata('query',$qry);
    }

    function index()
    {
		$this->load->view('flickr_view');
    }

	function search()
	{
		if($this->session->userdata('query'))
			$query = $this->session->userdata('query');
		else
			$query = null;

		$page_no = ($this->uri->segment(3)/10) + 1;

		$this->load->model('flickr_model');
		$results = $this->flickr_model->get_images($page_no, $query);
		$data['result'] = $results;
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/flickr/search';
		$config['total_rows'] = $results['photos']['total'];
		$config['per_page'] = '10';
		$config['num_links'] = '4';
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';

		$this->pagination->initialize($config);


		$this->load->view('flickr_view', $data);

	}
}

?>