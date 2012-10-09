<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exchangr extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('curl');
	}

    public function index()
    {
		// make the API call using the same Request method the user used
		$endpoint = $this->input->get_post('endpoint');

		if ($endpoint !== FALSE) {

			$endpoint = urldecode($endpoint);

			$post_payload = array();			

			foreach($_POST as $key=>$value) {
				if ($key == 'endpoint') {
					continue;
				}

				$post_payload[$key] = $value;
			}			

		} else {
			// change this to an appropriate reply
			// with correct headers. 
			die('No endpoint specified');
		}
    }

}

/* End of file exchangr.php */
/* Location: ./application/controllers/exchangr.php */
