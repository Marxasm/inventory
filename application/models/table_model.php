	<?php
class table_model extends CI_model{

  public function retrieve_app() 
  {
     return $this->db->get("item_borrow");
  }

  public function retrieve_name() 
  {
   return $this->db->get('item_borrower');
  }

  public function retrieve_equipm() 
  {
   return $this->db->get('item_item');
  }

  public function no_item()
    {
    $query=$this->db->get("item_item");
    return $query->num_rows();
    }

   public function no_borrower()
    {
    $query=$this->db->get("item_borrower");
    return $query->num_rows();
    } 

  public function no_borrow()
    {
    $this->db->like('status','unreturned'); 
    $query=$this->db->get("item_borrow");
    return $query->num_rows();
    }

  public function no_account()
    {
    $query=$this->db->get("item_register");
    return $query->num_rows();
    }  

  public function get_details($id)
  {
    return $this->db->get_where('item_register', array('register_id' => $id))->row();
  }

  public function is_active($id)
  {

    $query = $this->db
            ->select('status')
            ->where(['register_id' =>  $id])
            ->where('status', 1)
            ->get('item_register');

            if ($query->num_rows() == 1) {
                $result = $query->row_array();
                return $result;
            } else {
                return FALSE;
            }
}

public function is_inactive($id)
{
     $query = $this->db
            ->select('status')
            ->where(['register_id' =>  $id])
            ->where('status', 0)
            ->get('item_register');

            if ($query->num_rows() == 1) {
                $result = $query->row_array();
                return $result;
            } else {
                return FALSE;
            }
  }
  
public function b_name($id)  
  {  
       $this->db->where("borrower_id", $id);  
       $query=$this->db->get('item_borrower');  
       return $query->result();  
  }

public function is_exist($email)
  {

    $query = $this->db
            ->select('email')
            ->where('email', $email)
            ->where('email', $email)
            ->get('item_register');

            if ($query->num_rows() == 1) {
                $result = $query->row_array();
                return $result;
            } else {
                return FALSE;
            }

 }

    public function is_passverify($email)
    {

    $query = $this->db
            ->select('status')
            ->where('email', $email)
            ->where('status','1')
            ->get('item_register');

            if ($query->num_rows() == 1) {
                $result = $query->row_array();
                return $result;
            } else {
                return FALSE;
            }
    } 
  public function get_email($id)
  {
      return $this->db->get_where('item_register', array('identifier' => $id))->row();
  }

  public function verify($id)
  {
  $code = $this->input->post('code', TRUE);
    $query = $this->db
            ->select('pass_code')
            ->where('identifier', $id)
            ->where('pass_code',$code)
            ->get('item_register');

            if ($query->num_rows() == 1) {
                $result = $query->row_array();
                return $result;
            } else {
                return FALSE;
            }
  }

public function update_code($email, $data)
   {

            $this->db->where('email',$email);
            return $this->db->update('item_register',$data);
   }


  public function retrieve_item() 
  {
    $this->db->select ('item_item.item_id, item_item.register_id, item_item.type, item_item.item_image, item_item.equipment, item_item.description, item_item.serial, item_item.color, item_item.unit, item_item.quantity, item_item.original, item_item.size, item_item.remark, item_item.status, item_item.date_created, item_register.last_name, item_register.first_name, item_register.middle_name'); 
    $this->db->from ( 'item_item' );
    $this->db->join ( 'item_register', 'item_item.register_id = item_register.register_id' , 'left' );
    $query=$this->db->get();
    return $query->result();
  }

  public function retrieve_register() 
  {
    $query=$this->db->get("item_register");
    return $query->result();
  }

  public function retrieve_type() 
  {
    $query=$this->db->get("item_type");
    return $query->result();
  }

 public function retrieve_history() 
  {
    $this->db->select ('item_history.history_id, item_history.action, item_history.date_created, item_register.last_name, item_register.first_name, item_register.middle_name'); 
    $this->db->from ( 'item_history' );
    $this->db->join ( 'item_register', 'item_history.register_id = item_register.register_id' , 'left' );
    $query=$this->db->get();
    return $query->result();
  }

  public function retrieve_borrow() 
  {
    $this->db->select ( 'item_borrow.borrow_id, item_borrow.item_id, item_borrow.borrower_id, item_item.equipment, item_borrow.status, item_borrow.b_quantity, item_borrow.r_quantity, item_borrow.date_returned, item_borrow.remarks, item_item.quantity, item_item.original, item_item.type, item_borrow.borrower_id, item_borrow.date_created, item_borrower.name, item_borrower.purpose, item_register.last_name, item_register.first_name, item_register.middle_name' ); 
    $this->db->from ( 'item_borrow' );
    $this->db->join ( 'item_borrower', 'item_borrower.borrower_id = item_borrow.borrower_id' , 'left' );
    $this->db->join ( 'item_item', 'item_item.item_id = item_borrow.item_id' , 'left' );
    $this->db->join ( 'item_register', 'item_register.register_id = item_borrow.register_id' , 'left' );
    $query=$this->db->get();
    return $query->result();
  }

  public function retrieve_borrower() 
    {
    $this->db->select ('item_borrower.borrower_id, item_borrower.register_id, item_borrower.name, item_borrower.office, item_borrower.phone, item_borrower.purpose, item_borrower.date_created, item_borrower.br_item, item_borrower.remarks, item_borrower.br_quantity, item_register.last_name, item_register.first_name, item_register.middle_name'); 
    $this->db->from ( 'item_borrower' );
    $this->db->join ( 'item_register', 'item_borrower.register_id = item_register.register_id' , 'left' );
    $query=$this->db->get();
    return $query->result();
    }

  public function add_history($history)  
      {  
        return $this->db->insert('item_history', $history);
      }

  public function add_item($insert_data)  
      {  
        return $this->db->insert('item_item', $insert_data);
      }
  public function add_item_type($insert_data)  
      {  
        return $this->db->insert('item_type', $insert_data);
      }
  public function update_item($id)  
      {  
      	
      	if ($_FILES['item_image']['name']!="")
      	{
      	$config1['upload_path']='./assets/img';
        $config1['allowed_types']='jpg|jpeg|png';
        $config1['max_size']=9999999;

        $this->load->library('upload', $config1);
        $this->upload->do_upload('item_image');
        $report = $this->upload->data(); 
        $image_name=$report['file_name'];
      	}
      	else
      	{
      	$image_name = $this->input->post('item_image1');
      	} 

        $item_quantity = $this->input->post('item_quantity');
        $item_status = 0;
        if ($item_quantity >= 1)
        {
            $item_status = "available";
        }
        elseif ($item_quantity <= 0)
        {
            $item_status = "unavailable";
        }

        $update_data = array
        (
        'type' => $this->input->post('item_type'),
        'item_image' => $image_name,
        'equipment' => $this->input->post('item_equipment'),
        'description' => $this->input->post('item_description'),
        'serial' => $this->input->post('item_serial'),
        'color' => $this->input->post('item_color'),
        'unit' => $this->input->post('item_unit'),
        'quantity' => $item_quantity,
        'original' => $item_quantity,
        'size' => $this->input->post('item_sizes'),
        'remark' => $this->input->post('item_remarks'),
        'status' => $item_status
        );

        $this->db->where('item_id',$id);
        return $this->db->update('item_item',$update_data);

      }

  public function delete_item($id)
  	  {
    	$this->db->where("item_id", $id);
        $this->db->delete("item_item");
        return true;
      }


  public function add_borrower($insert_data)  
      {  
        return $this->db->insert('item_borrower', $insert_data);
      }

  public function added_quantity($b_quantity, $b_equipment) 
    {
    $this->db->set('quantity', 'quantity+'.$b_quantity,FALSE);
    $this->db->where('item_id',$b_equipment);
    return $this->db->update('item_item');
    if ($b_quantity >= 1)
    {
      $item_status = "available";
      $this->db->set('status', $item_status,FALSE);
      $this->db->where('item_id',$b_equipment);
      return $this->db->update('item_item');
    }
    elseif ($item_quantity <= 0)
    {
      $item_status = "unavailable";
      $this->db->set('status', $item_status,FALSE);
      $this->db->where('item_id',$b_equipment);
      return $this->db->update('item_item');
    }
  }

  public function deduct_quantity($b_quantity, $b_equipment) {
    $this->db->set('quantity', 'quantity-'.$b_quantity,FALSE);
    $this->db->where('item_id',$b_equipment);
    return $this->db->update('item_item');

    if ($b_quantity >= 1)
    {
      $item_status = "available";
      $this->db->set('status', $item_status,FALSE);
      $this->db->where('item_id',$b_equipment);
      return $this->db->update('item_item');
    }
    elseif ($item_quantity <= 0)
    {
      $item_status = "unavailable";
      $this->db->set('status', $item_status,FALSE);
      $this->db->where('item_id',$b_equipment);
      return $this->db->update('item_item');
    }
  }

  public function added_br_quantity($b_quantity, $b_name) 
  {
    $this->db->set('br_quantity', 'br_quantity+'.$b_quantity,FALSE);
    $this->db->set('br_item', 'br_item + 1',FALSE);
    $this->db->where('borrower_id',$b_name);
    return $this->db->update('item_borrower');
  }

  public function update_br_quantity($increase, $borrower_id)
  {
    $this->db->set('br_quantity', 'br_quantity+'.$increase, FALSE);
    $this->db->where('borrower_id',$borrower_id);
    return $this->db->update('item_borrower');
  }

  public function deduct_br_quantity($b_quantity, $b_name) 
  {
    $this->db->set('br_quantity', 'br_quantity-'.$b_quantity,FALSE);
    $this->db->set('br_item', 'br_item - 1',FALSE);
    $this->db->where('borrower_id',$b_name);
    return $this->db->update('item_borrower');
  }

  public function add_borrow($insert_data)  
      {  
        return $this->db->insert('item_borrow', $insert_data);
      }

      public function update_qremarks($id)  
      {  

        $update_data = array
        (
        'remarks' => $this->input->post("b_remarks")
        );

        $this->db->where('borrow_id',$id);
        return $this->db->update('item_borrow',$update_data);
      }


  public function update_borrow($id, $total_item, $total_b)  
      {  
        $item_quantity = $this->input->post('item_quantity');
        $item_status = 0;
        if ($item_quantity >= 1)
        {
            $item_status = "available";
        }
        elseif ($item_quantity <= 0)
        {
            $item_status = "unavailable";
        }

        $update_data = array
        (
        'b_quantity' => $total_b,
        'r_quantity' => $total_b
        );

        $this->db->where('borrow_id',$id);
        return $this->db->update('item_borrow',$update_data);
      }

  public function update_borrow1($item_id, $total_item, $total_b)  
      {  
        $item_quantity = $this->input->post('item_quantity');
        $item_status = 0;
        if ($item_quantity >= 1)
        {
            $item_status = "available";
        }
        elseif ($item_quantity <= 0)
        {
            $item_status = "unavailable";
        }

        $update_data = array
        (
        'quantity' => $total_item
        );

        $this->db->where('item_id',$item_id);
        return $this->db->update('item_item', $update_data);

      }

  public function update_borrower($id)  
      {  
        $update_data = array
        (
        'name' => $this->input->post('b_name'),
        'office' => $this->input->post('b_address'),
        'phone' => $this->input->post('b_phone'),
        'purpose' => $this->input->post('b_purpose'),
        'remarks' => $this->input->post('b_remarks')
        );

        $this->db->where('borrower_id',$id);
        return $this->db->update('item_borrower',$update_data);
      }

  public function delete_borrow($id)
      {
      $this->db->where("borrow_id", $id);
        $this->db->delete("item_borrow");
        return true;
      }

  public function delete_borrower($id)
      {
      $this->db->where("borrower_id", $id);
        $this->db->delete("item_borrower");
        return true;
      }


  public function update_return($id)  
      {  
        $update_data = array
        (
        'status' => 'returned',
        'date_returned' => date("Y-m-d")
        );

        $this->db->where('borrow_id',$id);
        return $this->db->update('item_borrow',$update_data);
      }

 public function update_unreturn($id)  
      {  
        $update_data = array
        (
        'status' => 'unreturned',
        'date_returned' => date("Y-m-d")
        );

        $this->db->where('borrow_id',$id);
        return $this->db->update('item_borrow',$update_data);
      }      

 public function register_user($insert_data)  
      {  
        return $this->db->insert('item_register', $insert_data);
      }

public function update_account($id)  
      {  
        $update_data = array
        (
        'role' => $this->input->post('r_role')
        );

        $this->db->where('register_id',$id);
        return $this->db->update('item_register',$update_data);
      }   

public function activate_account($id)  
      {  
        $update_data = array
        (
        'status' => $this->input->post('r_status')
        );

        $this->db->where('register_id',$id);
        return $this->db->update('item_register',$update_data);
      }

public function delete_account($id)
      {
      $this->db->where("register_id", $id);
        $this->db->delete("item_register");
        return true;
      }

protected $item_register = "item_register";

public function check_login($userData) 
      {

        /**
         * First Check username exists in Database
         */
        $query = $this->db->get_where($this->item_register, array('username' => $userData['username']));

        if ($this->db->affected_rows() > 0) {

            $password = $query->row('pass');

            /**
             * Check Password Hash 
             */
            $user = $query->row();
            $id   = $user->register_id;
            $this->session->set_userdata('register_id', $id);


            if (password_verify($userData['pass'], $password) === TRUE) {

                /**
                 * Password and username Address Valid
                 */
                return [
                    'status' => TRUE,
                    'data' => $query->row(),
                ];

            } else {
                return ['status' => FALSE,'data' => FALSE];
            }
         

        } else {
            return ['status' => FALSE,'data' => FALSE];
        }
    }

public function update_profile($id)  
      {  
        $update_data = array
        (
        'last_name' => $this->input->post('last_name'),
        'first_name' => $this->input->post('first_name'),
        'middle_name' => $this->input->post('middle_name'),
        'office' => $this->input->post('office'),
        'phone' => $this->input->post('phone')
        );

        $this->db->where('register_id',$id);
        return $this->db->update('item_register',$update_data);
      }

public function check_pass($id,$userData) 
  {

        /**
         * First Check Email is Exists in Database
         */
        $query = $this->db->get_where($this->item_register, array('register_id' => $id));

        if ($this->db->affected_rows() > 0) {

            $password = $query->row('pass');

            /**
             * Check Password Hash 
             */
            $user = $query->row();
            $id   = $user->register_id;
            $this->session->set_userdata('register_id', $id);


            if (password_verify($userData['pass'], $password) === TRUE) {

                /**
                 * Password and Email Address Valid
                 */
                return [
                    'status' => TRUE,
                    'data' => $query->row(),
                ];

            } else {
                return ['status' => FALSE,'data' => FALSE];
            }
         

        } else {
            return ['status' => FALSE,'data' => FALSE];
        }
  }

    public function newpass($id, $data)
    {

            $this->db->where('register_id',$id);
            return $this->db->update('item_register',$data);
    }


}