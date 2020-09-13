<?php 
     
     class ModUser extends CI_Model{

     	public function chekRegister($data){
     		$this->db->select('id');
     		$this->db->from('tbl_customer');
	        $this->db->where('email', $data['email']);
	        $query = $this->db->get();
	        return $num = $query->num_rows();
     	}
     	public function addCustomer($data){
     		return $this->db->insert('tbl_customer',$data);
     	}
     	public function permitlogin($data){
   		$this->load->database();
   		$this->db;
   		return $this->db->get_where('tbl_customer',$data)->result_array();
   	    }
   	    public function addOrder($data){
        $d=$this->modUser->chekStockByProductId($data['product_id']);
        if ($d->P_stock>0) {
          $updateStock=$d->P_stock-1;
          $array1 = array('P_stock' =>$updateStock
          );
          $arr=array(
            'p_id'=>$data['product_id']
          );
          $this->db->where($arr);
          $this->db->update('tbl_product',$array1);
          return $this->db->insert('tbl_customer_order',$data);
        }
        else
          return false;
   	    	
   	    }
   	    public function chekUserOrderProduct($data){
   	    	$array = array('customer_id' => $data['customer_id'],
   	    		'product_id' =>$data['product_id'],
            'final_order' =>'0'
   	    	 );
   	    	$this->db->from('tbl_customer_order');
   	    	$this->db->where($array);
   	    	return $query =$this->db->get();
   	    }
   	    public function updateOrder($data){
   	    	$array = array('customer_id' => $data['customer_id'],
   	    		'product_id' =>$data['product_id']
   	    	 );
   	    	$array1 = array('quantity' =>$data['quantity']
   	    	);
   	    	$this->db->where($array);
            return $this->db->update('tbl_customer_order',$array1);
   	    }
   	    public function countNumberOfOrder(){
   	    	$array = array('customer_id' => $this->session->userdata('id'),
            'final_order'=>'0'
   	    	 );
   	    	$this->db->from('tbl_customer_order');
   	    	$this->db->where($array);
   	    	return $query =$this->db->get();
   	    }
   	    public function fetchallOrder(){
        $array=array('customer_id'=>$this->session->userdata('id'),
                     'final_order'=>'0'
      );
   	    $this->db->where($array);
   	    $query= $this->db->get('tbl_customer_order');
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
   	    }
        public function cartUpdate($data){
          $array = array('id' => $data['id']
           );
          $array1 = array('quantity' =>$data['quantity'],
            'payment_methood' =>$data['payment_methood']
          );
          $this->db->where($array);
          return $this->db->update('tbl_customer_order',$array1);
        }
        public function cartUpdateForPaymentMethod($data){
          $array = array('customer_id' => $data['customer_id']
           );
          $array1 = array(
            'payment_methood' =>$data['payment_methood']
          );
          $this->db->where($array);
          return $this->db->update('tbl_customer_order',$array1);
        }
        public function deleteCartById($id){
          $array = array('id' => $id
           );
          return $this->db->delete('tbl_customer_order',$array);
        }
        public function confirmFinalOrder(){
          $array = array('customer_id' => $this->session->userdata('id'),
            'final_order' =>'0',
           );
          $array1 = array('final_order' =>'1'
          );
          $this->db->where($array);
          return $this->db->update('tbl_customer_order',$array1);
        }
        
      
      public function fetchBrandNameById($id){
        $array=array(
           'brand_id'=>$id
        );
           
            $result = $this->db->get_where('tbl_brand',$array);
            return $result->row();
        }
      public function insertMessage($data){
          return $this->db->insert('tbl_message',$data);
        }
        public function viewProductById($id){
         $array=array('p_id'=>$id
         );
         $this->db->where($array);
         $query= $this->db->get('tbl_product');
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
      public function chekStockByProductId($id){
        $array=array(
           'p_id'=>$id
        );
           
            $result = $this->db->get_where('tbl_product',$array);
            return $result->row();
        }
      public function fetchEmailOFUser($id){
        $array=array(
           'id'=>$id
        );
           
            $result = $this->db->get_where('tbl_customer',$array);
            return $result->row();
      }
      public function productQuantityUpdate($qt,$pid){
          $array = array('p_id' => $pid
           );
          $array1 = array('P_stock' =>$qt
          );
          $this->db->where($array);
          return $this->db->update('tbl_product',$array1);
        }
        public function record_count() {
        return $this->db->count_all("tbl_product");
         }
   public function fetchallProduct($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("tbl_product");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   public function showCategoryById($limit, $start,$id){
    $this->db->limit($limit, $start);

         $array=array('cat_id'=>$id
         );
         $this->db->where($array);
         $query= $this->db->get('tbl_product');
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
      public function showBrandById($limit, $start,$id){
        $this->db->limit($limit, $start);
         $array=array('p_brand'=>$id
         );
         $this->db->where($array);
         $query= $this->db->get('tbl_product');

         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
      public function fetchallCustomer(){
        $array=array('id' => $this->session->userdata('id') );
        $this->db->where($array);
         $query= $this->db->get('tbl_customer'); 
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
      public function viewCustomerDetails($id){
        $array=array('id' => $id );
        $this->db->where($array);
         $query= $this->db->get('tbl_customer'); 
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
      public function fetchallUserOrder($id){
        $array=array('customer_id' => $id );
        $this->db->where($array);
        $this->db->order_by('id desc');
         $query= $this->db->get_where('tbl_customer_order'); 

         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }

     }

 ?>
          