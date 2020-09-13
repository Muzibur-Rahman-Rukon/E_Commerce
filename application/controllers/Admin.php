<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function index()
	{
		$this->load->view('Admin/login');
		
	}
	public function deshboard(){
		$this->load->view('Admin/header');
		$this->load->view('Admin/admin_header');
		$this->load->view('Admin/deshboard');
		$this->load->view('Admin/admin_footer');
		$this->load->view('Admin/footer');
	}
	        public function chkUser(){
        	$data['name']=$this->input->post('name',true);
            $data['password']=$this->input->post('password',true);
            if(!empty($data['name']) && !empty($data['password'])){
                 $admin=$this->modAdmin->chkUser($data);
            
                if (count($admin)==1) {
                    
                     $forSession=array(
                        'id'=> $admin[0]['id'],
                        'name'=> $admin[0]['name'],
                        'panelUserType'=> $admin[0]['panelUserType'],
                         'logged_in' => TRUE
                        
                );
                    $this->session->set_userdata($forSession);
                    if ($this->session->userdata('id')) {
                        redirect('Admin/deshboard');
                    }
                    else{
                        echo "Session not Created";
                    }
                    
                }
                else{
                	$this->session->set_flashdata('class','alert-danger');
                	$this->session->set_flashdata('message','Please Chek Email or Password Correctly');
                	redirect('Admin/index');
                }
            }
            else{
                $this->session->set_flashdata('class','alert-danger');
                	$this->session->set_flashdata('message','Please Chek The Required Field');
                	redirect('Admin/index');
            }
        }
        public function logout(){
            if ($this->session->userdata('id')) {
                $this->session->set_userdata('id','');
                $this->session->set_flashdata('class','alert-success');
                $this->session->set_flashdata('message','You Have Successfully Loged Out');
                redirect('admin');
            }
            else{
                $this->session->set_flashdata('error','Please log in');
            }
        }
        public function addUser(){
        $data['allCat']=$this->modAdmin->fetchallUserType();
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/addUser',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');
        }
        public function addUserType(){
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/addUserType');
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer'); 
        }
        public function addUrType(){
            $data['type_name']= $this->input->post('type_name','true');
                if (!empty($data['type_name'])) {
                    
                    $addData=$this->modAdmin->checkUrType($data);
                    if ($addData->num_rows()>0) {
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Sorry This User Type is Alredy Exist');
                        redirect('admin/addUserType');
                       
                    }
                    else{
                        $addData=$this->modAdmin->addType($data);
                    if ($addData) {
                        $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','User Type Added Successfully');
                        redirect('admin/addUserType');
                    }
                    else{
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','User Type not Added');
                        redirect('admin/addUserType');
                    }
                    }
                    
                }
                else{
                   
                   $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','User Type Name Required');
                        redirect('admin/addUserType'); 

                }
        }
        public function viewUserType(){
        $data['allUserType']=$this->modAdmin->fetchallType();
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/viewUserType',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');
        }
        public function editUserType($id){
         if(!empty($id) && isset($id)){
                $data['userType']=$this->modAdmin->chekUserTypeById($id);
                  if (count($data['userType'])==1) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/editUserType',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
                  }
                  else{
                   setFlashData('alert-danger','User Type not found','home/viewUserType');
                  }
                }
                else{
                    setFlashData('alert-danger','User Type not found','home/viewUserType');


                }
        }
        public function updateUserType(){
             $data['type_name']=$this->input->post('name',true);
                $id=$this->input->post('id',true);
                if (!empty($data['type_name'])&& isset($data['type_name'])) {

            $reply=$this->modAdmin->updateUserType($data,$id);
                    if ($reply) {
                        $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','User Type is successfully updated');
                        redirect('admin/viewUserType');
                    }
                    else{
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','You can not updated now');
                        redirect('admin/viewUserType');
                    }
                }
                else{
                    
                    $this->session->set_flashdata('class','alert-danger');
                    $this->session->set_flashdata('message','User Type Name is required');
                        redirect('admin/viewUserType');


                }
        }
        public function deleteUserType($id){
                    if(!empty($id) && isset($id)){
                  $data=$this->modAdmin->deleteUserType($id);
                  if ($data) {
                    $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','User Type Delated');
                        redirect('admin/viewUserType');
                    
                  }
                  else{
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Panel not found');
                    redirect('admin/viewUserType');
                  }
                }
                else{
                    $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Panel Anot found');
                    redirect('admin/viewUserType');


                }
        }
        public function adUser(){
        $data['addedBy']= $this->input->post('addedBy','true');
        $data['name']= $this->input->post('name','true');
        $data['type']= $this->input->post('type','true');
        $data['password']= $this->input->post('password','true');
                if (!empty($data['type'])) {
                    
                    $addData=$this->modAdmin->checkUrUser($data);
                    if ($addData->num_rows()>0) {
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Sorry This User is Alredy Exist');
                        redirect('admin/addUser');
                       
                    }
                    else{
                        $addData=$this->modAdmin->addUser($data);
                    if ($addData) {
                        $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','User Added Successfully');
                        redirect('admin/addUser');
                    }
                    else{
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','User not Added');
                        redirect('admin/addUser');
                    }
                    }
                    
                }
                else{
                   
                   $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','User  Name Required');
                        redirect('admin/addUser'); 

                }
        }
        public function viewUser(){
        $data['allUser']=$this->modAdmin->fetchallUser();
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/viewUser',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');

        }
        public function editUser($id){
                     if(!empty($id) && isset($id)){
                $data['userType']=$this->modAdmin->chekUserById($id);
                $data['allCat']=$this->modAdmin->fetchallUserType();
                  if (count($data['userType'])==1) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/editUser',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
                  }
                  else{
                   setFlashData('alert-danger','User Type not found','home/viewUserType');
                  }
                }
                else{
                    setFlashData('alert-danger','User Type not found','home/viewUserType');


                }
        }
               public function updateUser(){
             $data['name']= $this->input->post('name','true');
        $data['type']= $this->input->post('type','true');
        $data['password']= $this->input->post('password','true');
                $id=$this->input->post('id',true);
                if (!empty($data['name'])&& isset($data['type'])) {

            $reply=$this->modAdmin->updateUser($data,$id);
                    if ($reply) {
                        $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','User Type is successfully updated');
                        redirect('admin/viewUser');
                    }
                    else{
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','You can not updated now');
                        redirect('admin/viewUser');
                    }
                }
                else{
                    
                    $this->session->set_flashdata('class','alert-danger');
                    $this->session->set_flashdata('message','User Type Name is required');
                        redirect('admin/viewUser');


                }
        }
        public function deleteUser($id){
                    if(!empty($id) && isset($id)){
                  $data=$this->modAdmin->deleteUser($id);
                  if ($data) {
                    $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','User Delated');
                        redirect('admin/viewUser');
                    
                  }
                  else{
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Panel not found');
                    redirect('admin/viewUser');
                  }
                }
                else{
                    $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Panel Anot found');
                    redirect('admin/viewUserType');


                }
        }
        public function addCategory(){
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/addCategory');
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer'); 
        }
        public function adCat(){
            $data['cat_name']= $this->input->post('cat_name','true');
                if (!empty($data['cat_name'])) {
                    
                    $addData=$this->modAdmin->checkCatExistence($data);
                    if ($addData->num_rows()>0) {
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Sorry This Category is Alredy Exist');
                        redirect('admin/addCategory');
                       
                    }
                    else{
                        $addData=$this->modAdmin->addCat($data);
                    if ($addData) {
                        $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Category Added Successfully');
                        redirect('admin/addCategory');
                    }
                    else{
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Category not Added');
                        redirect('admin/addCategory');
                    }
                    }
                    
                }
                else{
                   
                   $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Category Name Required');
                        redirect('admin/addCategory'); 

                }
        }
        public function viewCategory(){
        $data['allCategory']=$this->modAdmin->fetchallCategory();
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/viewCategory',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer'); 
        }
        public function editCat($cat_id){
         if(!empty($cat_id) && isset($cat_id)){
                $data['userType']=$this->modAdmin->chekCatById($cat_id);
                  if (count($data['userType'])==1) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/editCat',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
                  }
                  else{
                   setFlashData('alert-danger','User Type not found','home/viewUserType');
                  }
                }
                else{
                    setFlashData('alert-danger','User Type not found','home/viewUserType');


                }
        }
         public function updateCat(){
             $data['cat_name']=$this->input->post('cat_name',true);
                $cat_id=$this->input->post('cat_id',true);
                if (!empty($data['cat_name'])&& isset($data['cat_name'])) {

            $reply=$this->modAdmin->updateCategory($data,$cat_id);
                    if ($reply) {
                        $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Category is successfully updated');
                        redirect('admin/viewCategory');
                    }
                    else{
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','You can not updated now');
                        redirect('admin/viewCategory');
                    }
                }
                else{
                    
                    $this->session->set_flashdata('class','alert-danger');
                    $this->session->set_flashdata('message','Category Name is required');
                        redirect('admin/viewCategory');


                }
        }
            public function deleteCat($cat_id){
                    if(!empty($cat_id) && isset($cat_id)){
                  $data=$this->modAdmin->deleteCat($cat_id);
                  if ($data) {
                    $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Category Delated');
                        redirect('admin/viewCategory');
                    
                  }
                  else{
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Category not found');
                    redirect('admin/viewCategory');
                  }
                }
                else{
                    $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Panel Anot found');
                    redirect('admin/viewCategory');


                }
        }
    public function addBrand(){
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/addBrand');
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer'); 
    }
            public function adBrand(){
            $data['brand_name']= $this->input->post('brand_name','true');
                if (!empty($data['brand_name'])) {
                    
                    $addData=$this->modAdmin->checkBrandExistence($data);
                    if ($addData->num_rows()>0) {
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Sorry This Brand is Alredy Exist');
                        redirect('admin/addBrand');
                       
                    }
                    else{
                        $addData=$this->modAdmin->addBrand($data);
                    if ($addData) {
                        $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Brand Added Successfully');
                        redirect('admin/addBrand');
                    }
                    else{
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Brand not Added');
                        redirect('admin/addBrand');
                    }
                    }
                    
                }
                else{
                   
                   $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Brand Name Required');
                        redirect('admin/addBrand'); 

                }
        }
        public function viewBrand(){
        $data['allCategory']=$this->modAdmin->fetchallBrand();
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/viewBrand',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer'); 
        }
        public function editBrand($brand_id){
         if(!empty($brand_id) && isset($brand_id)){
        $data['userType']=$this->modAdmin->chekBrandById($brand_id);
                  if (count($data['userType'])==1) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/editBrand',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
                  }
                  else{
                   setFlashData('alert-danger','User Type not found','home/viewUserType');
                  }
                }
                else{
                    setFlashData('alert-danger','User Type not found','home/viewUserType');


                }
        }
                 public function updateBrand(){
             $data['brand_name']=$this->input->post('brand_name',true);
                $brand_id=$this->input->post('brand_id',true);
                if (!empty($data['brand_name'])&& isset($data['brand_name'])) {

            $reply=$this->modAdmin->updateBrand($data,$brand_id);
                    if ($reply) {
                        $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Brand is successfully updated');
                        redirect('admin/viewBrand');
                    }
                    else{
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','You can not updated now');
                        redirect('admin/viewBrand');
                    }
                }
                else{
                    
                    $this->session->set_flashdata('class','alert-danger');
                    $this->session->set_flashdata('message','Category Name is required');
                        redirect('admin/viewBrand');


                }
        }
    public function deleteBrand($brand_id){
         if(!empty($brand_id) && isset($brand_id)){
                  $data=$this->modAdmin->deleteBrand($brand_id);
                  if ($data) {
                    $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Brand Delated');
                        redirect('admin/viewBrand');
                    
                  }
                  else{
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Brand not found');
                    redirect('admin/viewBrand');
                  }
                }
                else{
                    $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Panel Anot found');
                    redirect('admin/viewBrand');


                }
    }
    public function addProduct(){
        $data['allCategory']=$this->modAdmin->fetchallCategory();
        $data['allBrand']=$this->modAdmin->fetchallBrand();
           $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/addProduct',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');

    }
        public function adProduct(){
        $data['p_title']= $this->input->post('p_title','true');
        $data['cat_id']= $this->input->post('p_category','true');
        $data['p_brand']= $this->input->post('p_brand','true');
        $data['p_model']= $this->input->post('p_model','true');
        $data['p_details']= $this->input->post('p_details','true');
        $data['P_stock']= $this->input->post('P_stock','true');
        $data['price']= $this->input->post('price','true');
        $data['features1']= $this->input->post('features1','true');
        $data['features2']= $this->input->post('features2','true');
        $data['features3']= $this->input->post('features3','true');
        $data['features4']= $this->input->post('features4','true');
        $data['processor']= $this->input->post('processor','true');
        $data['display']= $this->input->post('display','true');
        $data['memory']= $this->input->post('memory','true');
        $data['storage']= $this->input->post('storage','true');
        $data['graphics']= $this->input->post('graphics','true');
        $data['chipset']= $this->input->post('chipset','true');
        $data['operating_System']= $this->input->post('operating_System','true');
        $data['battery']= $this->input->post('battery','true');
        $data['adapter']= $this->input->post('adapter','true');
        $data['audio']= $this->input->post('audio','true');
       
                if (!empty($data['P_stock'])) {
                    $path=realpath('assets/img/');
                    $config['upload_path']=$path;
                    $config['allowed_types']='gif|png|jpg|jpeg';
                    $this->load->library('upload',$config);
                    if (!$this->upload->do_upload('p_img')) {
                        $error=$this->upload->display_errors();
                        
                         $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Image not found');
                    redirect('admin/postNews');
                    }
                    else{
                        $fileName=$this->upload->data();
                        $data['p_img']=$fileName['file_name'];
                       
                       

                    }
                     $addData=$this->modAdmin->checkProduct($data);
                    if ($addData->num_rows()>0) {
                        
                        $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Sorry This Product is Alredy Exist');
                    redirect('admin/addProduct');
                       
                    }
                    else{
                        $addData=$this->modAdmin->addProduct($data);
                    if ($addData) {
                       
                        $this->session->set_flashdata('class','alert-success');
                   $this->session->set_flashdata('message','Product Added Successfully');
                    redirect('admin/addProduct');
                    }
                    else{
                       
                         $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Product not Added');
                    redirect('admin/addProduct');
                    }
                    }
                    
                }
                else{
                   
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Product Required');
                    redirect('admin/addProduct');

                }
        }
    public function viewProduct(){
        $data['allProduct']=$this->modAdmin->fetchallProduct();
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/viewProduct',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer'); 
        }
    public function editProduct($p_id){
         if(!empty($p_id) && isset($p_id)){
    $data['viewProduct']=$this->modUser->viewProductById($p_id);
    $data['allCategory']=$this->modAdmin->fetchallCategory();
    $data['allBrand']=$this->modAdmin->fetchallBrand();
            if (count($data['viewProduct'])==1) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/editProduct',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
                  }
                  else{
                   setFlashData('alert-danger','User Type not found','home/viewUserType');
                  }
                }
                else{
                    setFlashData('alert-danger','User Type not found','home/viewUserType');


                }

    }
        public function viewproductbyid($id){
        
        $data['viewProduct']=$this->modUser->viewProductById($id);
        $data['allBrand']=$this->modAdmin->fetchallBrand();
        $data['allCategory']=$this->modAdmin->fetchallCategory();
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/viewProductById',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer'); 

    }
    public function updateProduct(){
        $data['p_id']=$this->input->post('p_id',true);          
        $data['p_title']=$this->input->post('p_title',true);
        $data['cat_id']= $this->input->post('p_category','true');
        $data['p_brand']= $this->input->post('p_brand','true');
        $data['p_model']= $this->input->post('p_model','true');
        $data['p_details']= $this->input->post('p_details','true');
        $data['P_stock']= $this->input->post('P_stock','true');
        $data['price']= $this->input->post('price','true');
        $data['features1']= $this->input->post('features1','true');
        $data['features2']= $this->input->post('features2','true');
        $data['features3']= $this->input->post('features3','true');
        $data['features4']= $this->input->post('features4','true');
        $data['processor']= $this->input->post('processor','true');
        $data['display']= $this->input->post('display','true');
        $data['memory']= $this->input->post('memory','true');
        $data['storage']= $this->input->post('storage','true');
        $data['graphics']= $this->input->post('graphics','true');
        $data['chipset']= $this->input->post('chipset','true');
        $data['operating_System']= $this->input->post('operating_System','true');
        $data['battery']= $this->input->post('battery','true');
        $data['adapter']= $this->input->post('adapter','true');
        $data['audio']= $this->input->post('audio','true');
        if (!empty($data['p_id'])&& isset($data['p_details'])&& isset($data['cat_id'])) {
        if(isset($_FILES['p_img']) && is_uploaded_file($_FILES['p_img']['tmp_name'])){
        $path=realpath('assets/img/');
        $config['upload_path']=$path;
        $config['allowed_types']='gif|png|jpg|jpeg';
        $this->load->library('upload',$config);
        if (!$this->upload->do_upload('p_img')) {
        $error=$this->upload->display_errors();
        setFlashData('alert-danger','$error','admin/viewProduct');
                    }
        else{
            $fileName=$this->upload->data();
            $data['p_img']=$fileName['file_name'];
                        
                    }

                    }//Image Chaking Here
                    $reply=$this->modAdmin->updateProduct($data);
                    if ($reply) {
                        if (!empty($data['p_img']) && isset($data['p_img'])) {
            $data['Oldp_img']=$this->input->post('Oldp_img',true);
                            if (file_exists($path.'/'.$Oldp_img)) {
                                unlink($path.'/'.$Oldp_img);
                            }
                        }
                $this->session->set_flashdata('class','alert-success');
                $this->session->set_flashdata('message','Product Updated Successfully');
                redirect('admin/viewProduct');
                        
                    }
                    else{
                        setFlashData('alert-danger','You can not updated now','admin/viewProduct');
                    }
                }
                else{
                    setFlashData('alert-danger','Category Name is required','admin/viewProduct');

                }
           
            
        }
    public function deleteProduct($p_id){
      if(!empty($p_id) && isset($p_id)){
                  $data=$this->modAdmin->deleteProduct($post_id);
                  if ($data) {
                    $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Product Delated');
                        redirect('admin/viewProduct');
                    
                  }
                  else{
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Product not found');
                    redirect('admin/viewProduct');
                  }
                }
                else{
                    $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Product not found');
                    redirect('admin/viewProduct');


                }

        }
    public function customerOrder(){
        $data['customerOrder']=$this->modAdmin->customerOrder();
        
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/customerOrder',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');
    }
    public function changeDeliveryStatus($id){
$changeDeliveryStatus=$this->modAdmin->changeDeliveryStatus($id);
      if ($changeDeliveryStatus) {
          redirect('admin/customerOrder');
      }
    }
    public function changePaymentStatus($id){
$changeDeliveryStatus=$this->modAdmin->changePaymentStatus($id);
      if ($changeDeliveryStatus) {
          redirect('admin/customerOrder');
      }
    }
    public function changeSeenStatus($id){
$changeDeliveryStatus=$this->modAdmin->changeSeenStatus($id);
      if ($changeDeliveryStatus) {
          redirect('admin/customerOrder');
      }
    }
    public function changeMessageStatus($id){
$changeMessageStatus=$this->modAdmin->changeMessageStatus($id);
      if ($changeMessageStatus) {
          redirect('admin/customerMessage');
      }
    }
    public function deleteCOrder($id){
        $deleteCOrder=$this->modAdmin->deleteCOrder($id);
        if ($deleteCOrder) {
            redirect('admin/customerOrder');
        }
    }
    public function deleteCMessage($id){
        $deleteCOrder=$this->modAdmin->deleteCMessage($id);
        if ($deleteCOrder) {
            redirect('admin/customerMessage');
        }
    }
    public function customerMessage(){
        $data['customerMessage']=$this->modAdmin->customerMessage();
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/customerMessage',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');
    }
    public function test(){
        $data['allCat']=$this->modAdmin->fetchallUserType();
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/test',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');
    }
    public function seeCustomerInfo($customer_id){
        $d=$this->modAdmin->fetchCustomerInfoById($customer_id);
        $this->session->set_flashdata('class','alert-success');
        $this->session->set_flashdata('order','Name : '.$d->username.'<br> Mobaile Number :'.$d->mobaile_number);
        redirect('admin/customerOrder');
    }
    public function viewCustomerDetails($id){
        $data['allCustomer']=$this->modUser->viewCustomerDetails($id);
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/viewCustomerDetails',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');
    }
 

}
