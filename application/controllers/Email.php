<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function send(){
		$from_email = "email_pengirim@gmail.com";							// ========> parameter yg harus diganti
        $to_email = "email_penerima@gmail.com";								// ========> parameter yg harus diganti
		
		//Email config
		$config = array();
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';						// ========> parameter yg harus diganti
		$config['smtp_user'] = 'email_utama@gmail.com';						// ========> parameter yg harus diganti
		$config['smtp_port'] = 465;
		
		/* CARA SETUP APP PASSWORD */
		// 1. login akun google yg akan dijadikan email master 
		// 2. klik pada avatar akun di pojok kanan atas dan klik "Manage your Google Account"
		// 3. lakukan pencarian pada search box di tengah atas halaman "app password" dan pilih "App Passwords / Security"
		// 4. setelah itu akan diminta memasukkan password akun google lagi
		// 5. pada bagian "Select the app and device you want to generate the app password for." 
		//	  - pada bagian "select app" pilih "Mail"
		//	  - pada bagian "select device" pilih "Other (Custom Name)"
		// 6. klik "GENERATE"
		// 7. Catat 16 digit App Password untuk dimasukkan pada variable $config['smtp_pass'] sebagai pengganti password akun
		/* CARA SETUP APP PASSWORD */
		
		$config['smtp_pass'] = 'app_password';								// ========> parameter yg harus diganti
		
        //Load email library
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		
        $this->email->from($from_email, 'Identification');
        $this->email->to($to_email);
        $this->email->subject('Send Email Codeigniter');					// ========> parameter yg harus diganti
        $this->email->message('The email send using codeigniter library');	// ========> parameter yg harus diganti
        //Send mail
        if($this->email->send()){
            echo "Congragulation Email Send Successfully.";
		} else {
            echo "You have encountered an error.";
		}
	}
}
