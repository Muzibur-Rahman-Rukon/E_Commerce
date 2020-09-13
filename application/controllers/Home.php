<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{    $config = array();
        $config["base_url"] = base_url() . "home/index";
        $config["total_rows"] = $this->modUser->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = '<ul class="uk-pagination uk-text-primary">';
		 $config['full_tag_close'] = '</ul>';
		 $config['cur_tag_open'] = ' <li class="uk-active uk-text-bold uk-text-secondary"><a href="/">';
		 $config['cur_tag_close'] = '</a></li>';
		 $config['prev_tag_open'] = '<li>';
		 $config['prev_tag_close'] = '</li>';
		 $config['next_tag_open'] = '<li>';
		 $config['next_tag_close'] = '</li>';
		 $config['num_tag_open'] = '<li>';
		 $config['num_tag_close'] = '</li>';
		 $config['last_tag_open'] = '<li>';
		 $config['last_tag_close'] = '</li>';
		 $config['first_tag_open'] = '<li>';
		 $config['first_tag_close'] = '</li>';
		 $config['next_link'] = 'Next >';
		 $config['prev_link'] = '< Prev';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["allProduct"] = $this->modUser->
            fetchallProduct($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

		$data['allBrand']=$this->modAdmin->fetchallBrand();
		$data['allCategory']=$this->modAdmin->fetchallCategory();
		/*$data['allProduct']=$this->modAdmin->fetchallProduct();*/
		$this->load->view('FrontEnd/header',$data);
		$this->load->view('FrontEnd/banner');
		$this->load->view('FrontEnd/index',$data);
		$this->load->view('FrontEnd/body');
		$this->load->view('FrontEnd/footer');
	}
	public function signin(){
		$data['allBrand']=$this->modAdmin->fetchallBrand();
		$data['allCategory']=$this->modAdmin->fetchallCategory();
		$this->load->view('FrontEnd/header',$data);
		$this->load->view('FrontEnd/signin');
		$this->load->view('FrontEnd/body');
		$this->load->view('FrontEnd/footer');
	}
	public function signUp(){
		$data['allBrand']=$this->modAdmin->fetchallBrand();
		$data['allCategory']=$this->modAdmin->fetchallCategory();
		$this->load->view('FrontEnd/header',$data);
		$this->load->view('FrontEnd/signUp');
		$this->load->view('FrontEnd/body');
		$this->load->view('FrontEnd/footer');
	}
	public function createAccount(){
		$username=$this->form_validation->set_rules('username', 'username','required|alpha');
		$mobaile=$this->form_validation->set_rules('mobaile_number', 'mobaile_number ', 'required|regex_match[/^[0-9]{11}$/]');
		if ($this->form_validation->run() == FALSE) {
			if ($username==FALSE) {
			$this->session->set_flashdata('class','alert-danger');
			$this->session->set_flashdata('message','Please Give Correct Name!');
			redirect('home/signUp');
			}
			elseif($mobaile==FALSE){
			$this->session->set_flashdata('class','alert-danger');
			$this->session->set_flashdata('message','Enter 11 Degit of Mobaile Numeber!');
			redirect('home/signUp');

			}
		}
		else{
		$data['username']=$this->input->post('username',true);
		$data['mobaile_number']=$this->input->post('mobaile_number',true);
		$data['address']=$this->input->post('address',true);
		$data['email']=$this->input->post('email',true);
		$data['password']=$this->input->post('password',true);
		$chkRegister=$this->modUser->chekRegister($data);
		if ($chkRegister==0) {
			$addCustomer=$this->modUser->addCustomer($data);
			if ($addCustomer) {
					$this->session->set_flashdata('class','alert-success');
					$this->session->set_flashdata('message','You are Successfully Registered!');
					redirect('home/signUp');
                    
				}
		}
		elseif ($chkRegister > 0) {
			        $this->session->set_flashdata('class','alert-danger');
					$this->session->set_flashdata('message','This Email is Already Registered!');
					redirect('home/signUp');
		}
		}
		

	}
	public function chkLogin(){
         $data['email']=$this->input->post('email',true);
         $data['password']=$this->input->post('password',true);
         if (!empty($data['email']) && !empty($data['password'])) {
         	$permitlogin=$this->modUser->permitlogin($data);
         	if (count($permitlogin)==1) {
         		$forSession=array(
                        'id'=> $permitlogin[0]['id'],
                        'username'=> $permitlogin[0]['username'],
                      'mobaile_number'=> $permitlogin[0]['mobaile_number'],
                        'email'=> $permitlogin[0]['email'],
                         'logged_in' => TRUE
                        
                );
                $this->session->set_userdata($forSession);
                    if ($this->session->userdata('id')) {
                        redirect('home');
                    }
         	}
         }
	}
	public function logout(){
		if ($this->session->userdata('id')) {
                $this->session->unset_userdata('id','');
                $this->session->unset_userdata('username','');
                $this->session->unset_userdata('mobaile_number','');
                $this->session->unset_userdata('email','');
                $this->session->unset_userdata('logged_in','');
                redirect('home');
           
            }
            else{
                $this->session->set_flashdata('error','Please log in');
               

            }
	}
	public function addToCart($id,$name,$img,$price,$model){
		$data['product_id']=$id;
		$Model = str_replace('%', ' ', $model);
		$Name = str_replace('%', ' ', $name);
		$data['product_name']=$Name.",".$Model;
		$data['product_img']=$img;
		$data['price']=$price;
		$data['quantity']=1;
		$data['total_price']=0;
		$data['customer_id']=$this->session->userdata('id');
		$uSPOrder=$this->modUser->chekUserOrderProduct($data);

		if ($uSPOrder->num_rows()==0) {
			$addOrder=$this->modUser->addOrder($data);
			redirect('home');
		}
		else{
			$d = $uSPOrder->row()->quantity;
			$data['quantity']=$d+1;
			$addOrder=$this->modUser->updateOrder($data);
			redirect('home');

		}
	}
	public function cart(){
		$data['allBrand']=$this->modAdmin->fetchallBrand();
		$data['allCategory']=$this->modAdmin->fetchallCategory();
		$data['allOrder']=$this->modUser->fetchallOrder();
		$this->load->view('FrontEnd/header',$data);
		$this->load->view('FrontEnd/cart',$data);
		$this->load->view('FrontEnd/body');
		$this->load->view('FrontEnd/footer');
	}
	public function cartUpdate(){
		$data['product_id']=$this->input->post('product_id',true);
		$data['quantity']=$this->input->post('qty',true);
/*$data['payment_methood']=$this->input->post('payment_methood',true);*/
		$data['id']=$this->input->post('id',true);

		$d=$this->modUser->chekStockByProductId($data['product_id']);
		
		if ($d->P_stock>=$data['quantity']) {
			if ($this->input->post('qty')<=0) {
			$this->session->set_flashdata('class','alert-danger');
			$this->session->set_flashdata('message','Please Enter With Positive Number');
			redirect('home/cart');
		}
		else{

		$addOrder=$this->modUser->cartUpdate($data);
		$data['quantity']=$d->P_stock-$data['quantity']+1;
		$a=$this->modUser->productQuantityUpdate($data['quantity'],$data['product_id']);
		if ($addOrder) {
			redirect('home/cart');
		}
		}
		}
		else{
          $this->session->set_flashdata('class','alert-danger');
		  $this->session->set_flashdata('message','We have '.$d->P_stock.' more Products only');

		  redirect('home/cart');
		}
	
		
	}
	public function deleteCartById($id){
		$deleteCartById=$this->modUser->deleteCartById($id);
		if ($deleteCartById) {
			redirect('home/cart');
		}
	}
	public function confirmOrder(){
	$data['customer_id']=$this->input->post('customer_id',true);
$data['payment_methood']=$this->input->post('payment_methood',true);
$addOrder=$this->modUser->cartUpdateForPaymentMethod($data);
		$d=$this->modUser->fetchEmailOFUser($data['customer_id']);
		/*$to =  $d->email;*/  // User email pass here

    /*$subject = 'Welcome To CodingMantra';

    $from = 'moonmumu270294@gmail.com';     // Pass here your mail id

    $emailContent = 'Congretulation!Dear you are requested to buy some product ! That is Successfully Completed';
    $emailContent .='We Will Meet With Your By your given Address';


    $emailContent .= 'Congretulation!Dear you are requested to buy some product ! That is Successfully Completed';*/  //   Post message available here


    /*$emailContent .='Congretulation!Dear you are requested to buy some product ! That is Successfully Completed';
    $emailContent .= "Congretulation!Dear you are requested to buy some product ! That is Successfully Completed";*/
                


    /*$config['protocol']    = 'smtp';
    $config['smtp_host']    = 'ssl://smtp.gmail.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '60';

    $config['smtp_user']    = 'moonmumu270294@gmail.com';    //Important
    $config['smtp_pass']    = 'ItsMeMumu27';  //Important

    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE;*/ // bool whether to validate email or not 

     

    /*$this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($emailContent);
    $this->email->send();*/
		$this->session->set_flashdata('order','Please Check Your Oder History');
        $confirmFinalOrder=$this->modUser->confirmFinalOrder();
        $data['allBrand']=$this->modAdmin->fetchallBrand();
		$data['allCategory']=$this->modAdmin->fetchallCategory();
		$data['allProduct']=$this->modAdmin->fetchallProduct();
		$this->load->view('FrontEnd/header',$data);
		$this->load->view('FrontEnd/successOrder');
		$this->load->view('FrontEnd/index',$data);
		$this->load->view('FrontEnd/body');
		$this->load->view('FrontEnd/footer');
	}
	public function choosePaymentMethood($customer_id){
		$data['allBrand']=$this->modAdmin->fetchallBrand();
		$data['allCategory']=$this->modAdmin->fetchallCategory();
		$this->load->view('FrontEnd/header',$data);
		$this->load->view('FrontEnd/choosePaymentMethood');
		$this->load->view('FrontEnd/body');
		$this->load->view('FrontEnd/footer');

	}
	public function showCategoryById($id){
        $config = array();
        $config["base_url"] = base_url('home/showCategoryById/'.$id);
        $config["total_rows"] = $this->modUser->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = '<ul class="uk-pagination uk-text-primary">';
		 $config['full_tag_close'] = '</ul>';
		 $config['cur_tag_open'] = ' <li class="uk-active uk-text-bold uk-text-secondary"><a href="/">';
		 $config['cur_tag_close'] = '</a></li>';
		 $config['prev_tag_open'] = '<li>';
		 $config['prev_tag_close'] = '</li>';
		 $config['next_tag_open'] = '<li>';
		 $config['next_tag_close'] = '</li>';
		 $config['num_tag_open'] = '<li>';
		 $config['num_tag_close'] = '</li>';
		 $config['last_tag_open'] = '<li>';
		 $config['last_tag_close'] = '</li>';
		 $config['first_tag_open'] = '<li>';
		 $config['first_tag_close'] = '</li>';
		 $config['next_link'] = 'Next >';
		 $config['prev_link'] = '< Prev';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["allProduct"] = $this->modUser->
            showCategoryById($config["per_page"], $page,$id);
        $data["links"] = $this->pagination->create_links();

		$data['allBrand']=$this->modAdmin->fetchallBrand();
		$data['allCategory']=$this->modAdmin->fetchallCategory();
		/*$data['allProduct']=$this->modAdmin->fetchallProduct();*/
		$this->load->view('FrontEnd/header',$data);
		$this->load->view('FrontEnd/banner');
		$this->load->view('FrontEnd/index',$data);
		$this->load->view('FrontEnd/body');
		$this->load->view('FrontEnd/footer');



		/*$data['allBrand']=$this->modAdmin->fetchallBrand();
		$data['allCategory']=$this->modAdmin->fetchallCategory();
		$data['allProduct']=$this->modUser->showCategoryById($id);
		$this->load->view('FrontEnd/header',$data);
		$this->load->view('FrontEnd/banner');
		$this->load->view('FrontEnd/index',$data);
		$this->load->view('FrontEnd/body');
		$this->load->view('FrontEnd/footer');*/
	}
	public function showBrandById($id){
		
        $config = array();
        $config["base_url"] = base_url('home/showBrandById/'.$id);
        $config["total_rows"] = $this->modUser->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = '<ul class="uk-pagination uk-text-primary">';
		 $config['full_tag_close'] = '</ul>';
		 $config['cur_tag_open'] = ' <li class="uk-active uk-text-bold uk-text-secondary"><a href="/">';
		 $config['cur_tag_close'] = '</a></li>';
		 $config['prev_tag_open'] = '<li>';
		 $config['prev_tag_close'] = '</li>';
		 $config['next_tag_open'] = '<li>';
		 $config['next_tag_close'] = '</li>';
		 $config['num_tag_open'] = '<li>';
		 $config['num_tag_close'] = '</li>';
		 $config['last_tag_open'] = '<li>';
		 $config['last_tag_close'] = '</li>';
		 $config['first_tag_open'] = '<li>';
		 $config['first_tag_close'] = '</li>';
		 $config['next_link'] = 'Next >';
		 $config['prev_link'] = '< Prev';

        $this->pagination->initialize($config);
        $d=$this->modUser->fetchBrandNameById($id);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["allProduct"] = $this->modUser->
            showBrandById($config["per_page"],$page,$d->brand_name);
        $data["links"] = $this->pagination->create_links();

		$data['allBrand']=$this->modAdmin->fetchallBrand();
		$data['allCategory']=$this->modAdmin->fetchallCategory();
		/*$data['allProduct']=$this->modAdmin->fetchallProduct();*/
		$this->load->view('FrontEnd/header',$data);
		$this->load->view('FrontEnd/banner');
		$this->load->view('FrontEnd/index',$data);
		$this->load->view('FrontEnd/body');
		$this->load->view('FrontEnd/footer');


		/*$data['allBrand']=$this->modAdmin->fetchallBrand();
		$data['allCategory']=$this->modAdmin->fetchallCategory();
		$d=$this->modUser->fetchBrandNameById($id);
		$data['allProduct']=$this->modUser->showBrandById($d->brand_name);
		$this->load->view('FrontEnd/header',$data);
		$this->load->view('FrontEnd/banner');
		$this->load->view('FrontEnd/index',$data);
		$this->load->view('FrontEnd/body');
		$this->load->view('FrontEnd/footer');*/
	}
	public function contact(){
		$data['allBrand']=$this->modAdmin->fetchallBrand();
		$data['allCategory']=$this->modAdmin->fetchallCategory();
		
		$this->load->view('FrontEnd/header',$data);
		$this->load->view('FrontEnd/contact');
		$this->load->view('FrontEnd/body');
		$this->load->view('FrontEnd/footer');

	}
	public function sendMessage(){
		$data['sender_id']=$this->input->post('sender_id',true);
		$data['sender_name']=$this->input->post('sender_name',true);
		$data['message']=$this->input->post('message',true);
		$insertMessage=$this->modUser->insertMessage($data);
		if ($insertMessage) {
			$this->session->set_flashdata('class','btn btn-success');
			$this->session->set_flashdata('msg','Your Message Sent Successfully');
			redirect('home/contact');
		}
		else{
			$this->session->set_flashdata('class','btn btn-danger');
			$this->session->set_flashdata('msg','Your Message Not Sent');
            redirect('home/contact');
		}
	}
	public function viewProduct($id){
		
		$data['viewProduct']=$this->modUser->viewProductById($id);
		$data['allBrand']=$this->modAdmin->fetchallBrand();
		$data['allCategory']=$this->modAdmin->fetchallCategory();
		$this->load->view('FrontEnd/header',$data);
		$this->load->view('FrontEnd/viewProduct');
		$this->load->view('FrontEnd/body');
		$this->load->view('FrontEnd/footer');

	}
	public function profile(){
		$data['allBrand']=$this->modAdmin->fetchallBrand();
		$data['allCategory']=$this->modAdmin->fetchallCategory();
		$data['allCustomer']=$this->modUser->fetchallCustomer();
		$this->load->view('FrontEnd/header',$data);
		$this->load->view('FrontEnd/profile');
		$this->load->view('FrontEnd/body');
		$this->load->view('FrontEnd/footer');
	}
	public function userOrder(){
		$data['allBrand']=$this->modAdmin->fetchallBrand();
		$data['allCategory']=$this->modAdmin->fetchallCategory();
		$data['allCustomer']=$this->modUser->fetchallCustomer();
		$data['userOrder']=$this->modUser->fetchallUserOrder($this->session->userdata('id'));
		$this->load->view('FrontEnd/header',$data);
		$this->load->view('FrontEnd/userOrder');
		$this->load->view('FrontEnd/body');
		$this->load->view('FrontEnd/footer');

	}
}
