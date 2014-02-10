<?php 


class Newsletter extends CI_Controller {
    
        function index(){ 
            $this->load->view('newsletter_view.php');
        }

	function send() {
		
                $this->load->library('form_validation');
                $this->form_validation->set_rules('name', 'Username', 'trim|required');   // name, error message, rule
                $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
                if ($this->form_validation->run()==FALSE) {
                    $this->load->view('newsletter_view.php');
                
                }
                else {
                    //$name=$this->input->post('name');
                    //$email=$this->input->post('email');            
                    $data=array(
                        "name"=>$this->input->post('name'),
                        "email"=>$this->input->post('email')
                    );
                    $config['protocol'] = 'smtp'; // how we are going to send the mail
                    $config['smtp_host'] = 'ssl://smtp.googlemail.com';
                    $config['smtp_port'] = 465;  // 465 and 587
                    $config['smtp_user'] = 'bhalin@gmail.com';
                    $config['smtp_pass'] = 'Carina54002';
                    
                    $this->load->library('email', $config); 
                    $this->email->set_newline("\r\n");
                    $this->email->from('bhalin@gmail.com','Bhalin');
                    $this->email->to($data["email"]);
                    $this->email->subject('Newsletter Subscription Confirmatio');
                    $message= $this->load->view('message',$data,true);
                    $this->email->message($message);
                    //$this->email->message('You are now subscribed to Newsletter');

                    $path=$this->config->item('server_root');
                    $file=$path.'/attachments/newsletter.txt';

                    $this->email->attach($file);
                    if($this->email->send()) {
			$this->load->view('subscriptionconfiramtion',$data);
                       
                    }

                    else {
			$r=$this->email->print_debugger();
			var_dump($r);
                    }

                }
	}
}