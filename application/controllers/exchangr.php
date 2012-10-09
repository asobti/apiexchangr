<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exchangr extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('curl');		
	}

    public function index()
    {
    	//print_r($_GET); die();
		// make the API call using the same Request method the user used
		$endpoint = $this->input->get_post('endpoint');

		if ($endpoint !== FALSE) {

			$endpoint = urldecode($endpoint);
			$response = '';

			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$response = $this->post($endpoint);
			} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
				$response = $this->get($endpoint);
			}

			print_r($response);

		} else {
			// change this to an appropriate reply
			// with correct headers. 
			die('No endpoint specified');
		}
    }

    private function post($endpoint) {
    	$payload = array();

    	foreach($_POST as $key=>$value) {
    		if ($key == 'endpoint') {
    			continue;
    		}

    		$payload[$key] = $value;
    	}

    	return $this->curl->simple_post($endpoint, $payload);
    }

    private function get($endpoint) {
    	return $this->curl->simple_get('$endpoint');
    }

}

/* End of file exchangr.php */
/* Location: ./application/controllers/exchangr.php */
