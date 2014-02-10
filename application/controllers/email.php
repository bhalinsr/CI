<?php 


class Email extends CI_Controller {

	/*function __construct() {
		parent::Controller();
		
	} */

	function index() {

		$config['protocol'] = 'smtp'; // how we are going to send the mail
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port'] = 465;  // 465 and 587
		$config['smtp_user'] = 'bhalin@gmail.com';
		$config['smtp_pass'] = 'Carina54002';

		$this->load->library('email', $config); 
		$this->email->set_newline("\r\n");
		$this->email->from('bhalin@gmail.com','Bhalin');
		$this->email->to('bramabhadran@inviqa.com','Inviqa');
		$this->email->subject('Hello This is my subject');
		$this->email->message('This is my message');

		$path=$this->config->item('server_root');
		$file=$path.'/attachments/yourinfo.txt';

		$this->email->attach($file);

		if($this->email->send()) {
			echo "Email Send succesfully";
		}

		else {
			$r=$this->email->print_debugger();
			var_dump($r);
		}

	}
}