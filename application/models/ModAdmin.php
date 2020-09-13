<?php 

      class ModAdmin extends CI_Model{

      	public function chkUser($data){
      $this->load->database();
      $this->db;
      return $this->db->get_where('tbl_user',$data)->result_array();
    }
    public function checkUrType($data){
   		$array = array('type_name' => $data['type_name']);
   		return $this->db->get_where('tbl_user_type',$array);
   	}
   	public function addType($data){
   		return $this->db->insert('tbl_user_type',$data);
   	}
   	public function fetchallType(){
         $query= $this->db->get('tbl_user_type');
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
    public function chekUserTypeById($id){
         $array = array('id' => $id);
         return $this->db->get_where('tbl_user_type',$array)->result_array();
      }
    public function updateUserType($data,$id){
         $this->db->where('id',$id);
         return $this->db->update('tbl_user_type',$data);
      }
      public function deleteUserType($id){
         $this->db->where('id',$id);
         return $this->db->delete('tbl_user_type');
      }
      public function fetchallUserType(){
         $query= $this->db->get('tbl_user_type');
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
      public function checkUrUser($data){
      $array = array('name' => $data['name']);
      return $this->db->get_where('tbl_user',$array);
    }
    public function addUser($data){
      return $this->db->insert('tbl_user',$data);
    }
    public function fetchallUser(){
         $query= $this->db->get('tbl_user');
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
    public function chekUserById($id){
         $array = array('id' => $id);
         return $this->db->get_where('tbl_user',$array)->result_array();
      }
      public function updateUser($data,$id){
         $this->db->where('id',$id);
         return $this->db->update('tbl_user',$data);
      }
      public function deleteUser($id){
         $this->db->where('id',$id);
         return $this->db->delete('tbl_user');
      }
      public function checkCatExistence($data){
      $array = array('cat_name' => $data['cat_name']);
      return $this->db->get_where('tbl_category',$array);
    }
    public function addCat($data){
      return $this->db->insert('tbl_category',$data);
    }
    public function fetchallCategory(){
         $query= $this->db->get('tbl_category');
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
    public function chekCatById($cat_id){
         $array = array('cat_id' => $cat_id);
         return $this->db->get_where('tbl_category',$array)->result_array();
      }
    public function updateCategory($data,$cat_id){
         $this->db->where('cat_id',$cat_id);
         return $this->db->update('tbl_category',$data);
      }
    public function deleteCat($cat_id){
         $this->db->where('cat_id',$cat_id);
         return $this->db->delete('tbl_category');
      }
      public function checkBrandExistence($data){
      $array = array('brand_name' => $data['brand_name']);
      return $this->db->get_where('tbl_brand',$array);
    }
    public function addBrand($data){
      return $this->db->insert('tbl_brand',$data);
    }
    public function fetchallBrand(){
         $query= $this->db->get('tbl_brand'); 
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
    public function chekBrandById($brand_id){
         $array = array('brand_id' => $brand_id);
         return $this->db->get_where('tbl_brand',$array)->result_array();
      }
    public function updateBrand($data,$brand_id){
         $this->db->where('brand_id',$brand_id);
         return $this->db->update('tbl_brand',$data);
      }
    public function deleteBrand($brand_id){
         $this->db->where('brand_id',$brand_id);
         return $this->db->delete('tbl_brand');
      }
    public function checkProduct($data){
      $array = array('p_model' => $data['p_model']);
      return $this->db->get_where('tbl_product',$array);
    }
    public function addProduct($data){
      return $this->db->insert('tbl_product',$data);
    }
    public function fetchallProduct(){
         $query= $this->db->get('tbl_product');
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
    public function chekProductById($p_id){
         $array = array('p_id' => $p_id);
        return $this->db->get_where('tbl_product',$array)->result_array();
      }
      public function fetchCategoryById($id){
        $array=array(
           'cat_id'=>$id
        );
           
            $result = $this->db->get_where('tbl_category',$array);
            return $result->row();
        }
      public function updateProduct($data){
         $this->db->where('p_id',$data['p_id']);
         return $this->db->update('tbl_product',$data);
      }
      public function deleteProduct($post_id){
        $this->db->where('p_id',$p_id);
         return $this->db->delete('tbl_product');
      }
      public function deleteCOrder($id){
        $this->db->where('id',$id);
         return $this->db->delete('tbl_customer_order');
      }
      public function deleteCMessage($id){
        $this->db->where('id',$id);
         return $this->db->delete('tbl_message');
      }
      public function customerOrder(){
        $array=array(
           'final_order'=>'1'
        );
        $this->db->order_by('id desc');
        $query = $this->db->get_where('tbl_customer_order',$array);
            if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
      public function changeDeliveryStatus($id){
        $data['delivery_status']='1';
        $this->db->where('id',$id);
         return $this->db->update('tbl_customer_order',$data);
      }
      public function changePaymentStatus($id){
        $data['payment_status']='1';
        $this->db->where('id',$id);
         return $this->db->update('tbl_customer_order',$data);
      }
      public function changeSeenStatus($id){
        $data['seen_unseen']='1';
        $this->db->where('id',$id);
         return $this->db->update('tbl_customer_order',$data);
      }
      public function changeMessageStatus($id){
        $data['status']='1';
        $this->db->where('id',$id);
         return $this->db->update('tbl_message',$data);
      }
        public function fetchCustomerInfoById($id){
          
        $array=array(
           'id'=>$id
        );
           
            $result = $this->db->get_where('tbl_customer',$array);
            return $result->row();
        }
        public function customerMessage(){
           
        $query= $this->db->get('tbl_message');
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
      public function numberOfProduct(){
           
            $result = $this->db->get('tbl_product');
            return $result->num_rows();
        }
        public function numberOfCustomer(){
           
            $result = $this->db->get('tbl_customer');
            return $result->num_rows();
        }
        public function chkUnSeenOrder(){
      $array = array('seen_unseen' => '0'
                       );
      return $this->db->get_where('tbl_customer_order',$array)->result_array();
    }


      }


 ?>
 