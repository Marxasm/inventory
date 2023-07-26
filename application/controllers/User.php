<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('table_model');
    $this->load->library('email', 'encrypt');
    $this->load->helper(array('alert', 'captcha', 'download'));
    $this->load->library("pagination");
  }

  public function index()
  {   
      if(! $this->session->userdata('username'))
      {
       $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
       redirect('user/db_login/');
      }
      else 
      {
      $id = $this->session->userdata('register_id');
      $active = $this->table_model->is_active($id);
      $inactive = $this->table_model->is_inactive($id);
      if ($active)
      {  
      $data['details'] = $this->table_model->get_details($id);
      $data['no_item'] = $this->table_model->no_item();
      $data['no_borrower'] = $this->table_model->no_borrower();
      $data['no_borrow'] = $this->table_model->no_borrow();
      $data['no_account'] = $this->table_model->no_account();
  	  $this->load->view('index', $data);
      }
      else if ($inactive)
      {
        $this->session->unset_userdata('username');  
        $this->session->unset_userdata('register_id'); 
        $this->session->set_flashdata('error', 'Your account is currently set to inactive and may not continue. Please contact the admin to regain access.');
        redirect('user/db_login/');
      }
      }
  }

public function schedule_load()
 {
   $event_data = $this->table_model->retrieve_app();
   $event_data1 = $this->table_model->retrieve_name();
   $event_data2 = $this->table_model->retrieve_equipm();
  foreach($event_data->result_array() as $row)
  {
        foreach($event_data1->result_array() as $row1)
  {
     foreach($event_data2->result_array() as $row2)
  {
     
      if ($row['borrower_id'] == $row1['borrower_id'])
      {
        if ($row['item_id'] == $row2['item_id'])
      {
   if ($row['status'] == 'unreturned')
   {
    $data[] = array(
    'title' => $row1['name'].' - '.$row2['equipment'],
    'start' => $row['date_returned'],
    'backgroundColor' => '#ffcc00',
    'borderColor' => '#ffcc00'
   );
   }

   if ($row['status'] == 'returned')
   {
    $data[] = array(
    'title' => $row1['name'].' - '.$row2['equipment'],
    'start' => $row['date_returned'],
    'backgroundColor' => '#00a65a',
    'borderColor' => '#00a65a'
   );
   }
    }
      }
        }
          }
            }
  echo json_encode($data);
   }


  public function db_item()
  {   if(! $this->session->userdata('username'))
      {
         $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
         redirect('user/db_login/');
      }
      else
      {
      $id = $this->session->userdata('register_id');
      $active = $this->table_model->is_active($id);
      $inactive = $this->table_model->is_inactive($id);
      if ($active)
      {  
      $id = $this->session->userdata('register_id');
      $data['details'] = $this->table_model->get_details($id);
      $data['data'] = $this->table_model->retrieve_item();
      $data['type'] = $this->table_model->retrieve_type();
      $this->load->view('db_item', $data);
      }
      else if ($inactive)
      {
        $this->session->set_flashdata('error', 'Your account is currently set to inactive and may not continue. Please contact the admin to regain access.');
       redirect('user/db_login/');
      }
      }
  }

  public function db_borrower()
  {
    if(! $this->session->userdata('username'))
      {
       $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
       redirect('user/db_login/');
      }
      else 
      {
      $id = $this->session->userdata('register_id');
      $active = $this->table_model->is_active($id);
      $inactive = $this->table_model->is_inactive($id);
      if ($active)
      {  
    $data['details'] = $this->table_model->get_details($id);
    $data['data'] = $this->table_model->retrieve_borrower();
    $data['item'] = $this->table_model->retrieve_item();
    $data['borrow'] = $this->table_model->retrieve_borrow();
    $this->load->view('db_borrower', $data);
     }
      else if ($inactive)
      {
        $this->session->set_flashdata('error', 'Your account is currently set to inactive and may not continue. Please contact the admin to regain access.');
       redirect('user/db_login/');
      }
      }
  }

  public function db_status()
  {

    if(! $this->session->userdata('username'))
      {
       $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
       redirect('user/db_login/');
      }
      else 
      {
      $id = $this->session->userdata('register_id');
      $active = $this->table_model->is_active($id);
      $inactive = $this->table_model->is_inactive($id);
      if ($active)
      {  
    $data['details'] = $this->table_model->get_details($id);
    $data['data'] = $this->table_model->retrieve_borrower();
    $data['item'] = $this->table_model->retrieve_item();
    $data['borrow'] = $this->table_model->retrieve_borrow();
    $this->load->view('db_status', $data);
     }
      else if ($inactive)
      {
        $this->session->set_flashdata('error', 'Your account is currently set to inactive and may not continue. Please contact the admin to regain access.');
       redirect('user/db_login/');
      }
      }
  }

  public function db_report()
  {

    if(! $this->session->userdata('username'))
      {
       $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
       redirect('user/db_login/');
      }
      else 
      {
      $id = $this->session->userdata('register_id');
      $active = $this->table_model->is_active($id);
      $inactive = $this->table_model->is_inactive($id);
      if ($active)
      {  
    $data['details'] = $this->table_model->get_details($id);
    $data['data'] = $this->table_model->retrieve_borrower();
    $data['item'] = $this->table_model->retrieve_item();
    $data['borrow'] = $this->table_model->retrieve_borrow();
    $this->load->view('db_report', $data);
     }
      else if ($inactive)
      {
        $this->session->set_flashdata('error', 'Your account is currently set to inactive and may not continue. Please contact the admin to regain access.');
       redirect('user/db_login/');
      }
      }
  }

  public function db_register()
  {
    if(! $this->session->userdata('username'))
      {
       $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
       redirect('user/db_login/');
      }
      else 
      {
      $id = $this->session->userdata('register_id');
      $active = $this->table_model->is_active($id);
      $inactive = $this->table_model->is_inactive($id);
      if ($active)
      {  
    $data['details'] = $this->table_model->get_details($id);
    $data['data'] = $this->table_model->retrieve_borrower();
    $data['item'] = $this->table_model->retrieve_item();
    $data['borrow'] = $this->table_model->retrieve_borrow();
    $data['register'] = $this->table_model->retrieve_register();
    $this->load->view('db_register', $data);
    }
      else if ($inactive)
      {
        $this->session->set_flashdata('error', 'Your account is currently set to inactive and may not continue. Please contact the admin to regain access.');
       redirect('user/db_login/');
      }
      }

  }

  public function db_history()
  {
    if(! $this->session->userdata('username'))
      {
       $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
       redirect('user/db_login/');
      }
      else 
      {
      $id = $this->session->userdata('register_id');
      $active = $this->table_model->is_active($id);
      $inactive = $this->table_model->is_inactive($id);
      if ($active)
      {  
    $data['details'] = $this->table_model->get_details($id);
    $data['data'] = $this->table_model->retrieve_history();
    $this->load->view('db_history', $data);
    }
      else if ($inactive)
      {
        $this->session->set_flashdata('error', 'Your account is currently set to inactive and may not continue. Please contact the admin to regain access.');
       redirect('user/db_login/');
      }
      }

  }

   public function db_login()
  {
      $this->load->view('db_login');
      if($this->session->userdata('username'))
      {
         redirect('user/index/');
      } 

  }

  public function forgot1()
  {
      $this->load->view('forgot1');
      if($this->session->userdata('username'))
      {
         redirect('user/index/');
      }

  }

  public function forgot2($id = NULL)
  {
        if(empty($id))
        {
            redirect('user/db_login');
        }
      $data = $this->table_model->get_email($id);
      $this->load->view('forgot2', array('data'=>$data));
      if($this->session->userdata('username'))
      {
         redirect('user/index/');
      }

  }

   public function expire_code($id = NULL) 
      {
        if(!is_array($_POST) || count($_POST)==0)
        {
          $this->session->set_flashdata('error', 'You may not access through URL.');
          redirect('user/db_login/');
        } 
                if(empty($id))
                {
                    redirect('user/db_login');
                }

       $data=array(
               'pass_code' => $this->input->post("pass_code"),
              );

  $this->table_model->expire_code($identifier,$data);
       }

  public function send_verify()
  {
      if(!is_array($_POST) || count($_POST)==0)
      {
        $this->session->set_flashdata('error', 'You may not access through URL.');
        redirect('user/db_login/');
      } 

      $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
      if ($this->form_validation->run() == FALSE) 
      { 
            $this->forgot1();
      }
      else 
      {
        $code = rand(0,99999999);
        $id = md5(rand(0,99999999));
        $data=array(
               'pass_code' => $code,
               'identifier' => $id,

              );
            $email = $this->input->post('email');
            $passverify = $this->table_model->is_passverify($email);
            $user = $this->table_model->is_exist($email);

if ($user)
{
        if ($passverify)
          {
           $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 587,
          'smtp_user' => 'pdrrmowarehouse@gmail.com',
          'smtp_pass' => 'warePDRR8899',
          'mailtype' => 'html',
          'charset' => 'iso-8859-1'
          );

          $subject = "Forgot your password - Email verification code";
          $message = "
          <html>
          <head>

          <style type='text/css'>
          .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
          }
              body {background-color: #CCD9F9;
                   font-family: Verdana, Geneva, sans-serif}

              h3 {color:#4C628D}

              p {
              font-family: 'Trebuchet MS', sans-serif;}
          </style>
          </head>
          <body>
          Hi ".$email.",
          <br>
          <p>Your verification code is: ".$code."";"</p>
          </div>
          <h2>Thank you.</h2>
          </body>
          </html>
          ";


            $this->email->set_newline("\r\n");
            $this->email->from('pdrrmowarehouse@gmail.com');
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->set_mailtype("html");
            $this->email->message($message, "html");
           if($this->email->send())
           {
            $this->table_model->update_code($email, $data);
            redirect('user/forgot2/'.$id);
           }
           else
           {
           show_error($this->email->print_debugger());
           }
        }
            else 
               {

                  $this->session->set_flashdata('error', 'Account not active anymore. Contact the admin to activate account.');
                  redirect('user/forgot1/');
               } 

        } 

             else 
                 {

                    $this->session->set_flashdata('error', 'Email does not exist. Please use registered email of the system.');
                    redirect('user/forgot1/');
                 }      
       }
          
  }

  public function send_verify1($id=NULL)
  {
      if(!is_array($_POST) || count($_POST)==0)
      {
        $this->session->set_flashdata('error', 'You may not access through URL.');
        redirect('user/db_login/');
      } 
      if(empty($id))
      {
          redirect('user/db_login');
      }

      $this->form_validation->set_rules('code', 'Code', 'required|is_numeric');
      if ($this->form_validation->run() == FALSE) 
      { 
            $data = $this->table_model->get_email($id);
            $this->load->view('forgot2', array('data'=>$data));
      }
      else 
      {
            $email = $this->input->post('email');
            $verification = $this->table_model->verify($id);

        if ($verification == TRUE)
          {
           $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
           $pass = substr(str_shuffle($permitted_chars), 0, 10);
           $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 587,
          'smtp_user' => 'pdrrmowarehouse@gmail.com',
          'smtp_pass' => 'warePDRR8899',
          'mailtype' => 'html',
          'charset' => 'iso-8859-1'
          );

          $subject = "Forgot your password - New password";
          $message = "
          <html>
          <head>

          <style type='text/css'>
          .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
          }
              body {background-color: #CCD9F9;
                   font-family: Verdana, Geneva, sans-serif}

              h3 {color:#4C628D}

              p {
              font-family: 'Trebuchet MS', sans-serif;}
          </style>
          </head>
          <body>
          Hi ".$email.",
          <br>
          <p>The new password of your account is: ".$pass."";"</p>
          </div>
          <h2>Thank you.</h2>
          </body>
          </html>
          ";


            $this->email->set_newline("\r\n");
            $this->email->from('pdrrmowarehouse@gmail.com');
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->set_mailtype("html");
            $this->email->message($message, "html");
           if($this->email->send())
           {
            $data=array(
               'pass_code' => NULL,
               'identifier' => NULL,
               'pass' => password_hash($pass, PASSWORD_DEFAULT),
               'confirm_pass' => password_hash($pass, PASSWORD_DEFAULT)
            );
            $this->table_model->update_code($email, $data);
            $this->session->set_flashdata('success', 'New password has been sent to your email.');
            redirect('user/db_login');
           }
           else
           {
           show_error($this->email->print_debugger());
           }
          }
            else 
              {

                $this->session->set_flashdata('error', 'Wrong verification code. Please try again.');
                redirect('user/forgot2/'.$id);
              } 
   
       }
          
  }
              public function add_type()
                {
                  if(!is_array($_POST) || count($_POST)==0)
                  {
                    $this->session->set_flashdata('error', 'You may not access through URL.');
                    redirect('user/db_item/');
                  } 
                  $this->form_validation->set_rules('item_type', 'Item Type', 'required');
                    if ($this->form_validation->run() == FALSE) 
                        { 
                              $this->db_item();
                        }
                    else 
                        {

                            $id = $this->session->userdata('register_id');
                            $insert_data = array
                            (
                            'item_type' => $this->input->post('item_type')
                            );

                            $insert = $this->table_model->add_item_type($insert_data);
                              if ($insert == TRUE) 
                              {
                                $history = array
                                (
                                'register_id' => $id,
                                'action' => "has added an item type: " . $this->input->post('item_type'),
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                
                                $this->table_model->add_history($history);
                                $this->session->set_flashdata('success', 'You have successfully inputted an item type.');
                                    redirect('user/db_item/');
                              }
                              else 
                              {
                                $this->session->set_flashdata('error', 'Invalid data input.');
                                    redirect('user/db_item/');
                              }
                          }
                    if(! $this->session->userdata('username'))
                      {
                         $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
                         redirect('user/db_login/');
                      }
                  }

              public function add_item()
                {
                  if(!is_array($_POST) || count($_POST)==0)
                  {
                    $this->session->set_flashdata('error', 'You may not access through URL.');
                    redirect('user/db_item/');
                  } 
                  $this->form_validation->set_rules('item_type', 'Item Type', 'required');
                  $this->form_validation->set_rules('item_equipment', 'Equipment', 'required');
                  $this->form_validation->set_rules('item_quantity', 'Quantity', 'required');
                    if ($this->form_validation->run() == FALSE) 
                        { 
                              $this->db_item();
                        }
                    else 
                        {
                            $config1['upload_path']='./assets/img';
                            $config1['allowed_types']='jpg|jpeg|png';
                            $config1['max_size']=9999999;

                            $this->load->library('upload', $config1);
                            $this->upload->do_upload('item_image');
                            $report = $this->upload->data();  

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
                            $id = $this->session->userdata('register_id');
                            $insert_data = array
                            (
                            'type' => $this->input->post('item_type'),
                            'item_image' => $report['file_name'],
                            'equipment' => $this->input->post('item_equipment'),
                            'description' => $this->input->post('item_description'),
                            'serial' => $this->input->post('item_serial'),
                            'color' => $this->input->post('item_color'),
                            'unit' => $this->input->post('item_unit'),
                            'quantity' => $item_quantity,
                            'original' => $item_quantity,
                            'size' => $this->input->post('item_sizes'),
                            'remark' => $this->input->post('item_remarks'),
                            'status' => $item_status,
                            'register_id' => $id
                            );

                            $insert = $this->table_model->add_item($insert_data);
                              if ($insert == TRUE) 
                              {
                                $history = array
                                (
                                'register_id' => $id,
                                'action' => "has added an item: " . $this->input->post('item_equipment'),
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                
                                $this->table_model->add_history($history);
                                $this->session->set_flashdata('success', 'You have successfully inputted an item.');
                                    redirect('user/db_item/');
                              }
                              else 
                              {
                                $this->session->set_flashdata('error', 'Invalid data input.');
                                    redirect('user/db_item/');
                              }
                          }
                    if(! $this->session->userdata('username'))
                      {
                         $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
                         redirect('user/db_login/');
                      }
                  }

                public function update_item($id = NULL) 
                  {
                    if(!is_array($_POST) || count($_POST)==0)
                    {
                      $this->session->set_flashdata('error', 'You may not access through URL.');
                      redirect('user/db_item/');
                    } 
                            if(empty($id))
                            {
                                redirect('user/db_item');
                            }

                        $original = $this->input->post('original');
                        $new = $this->input->post('new_quantity');
                        if ($original != $new)
                        {
                          $this->session->set_flashdata('error', 'Item is currently in use. Please check if the borrower has returned the item.');
                          redirect('user/db_item/');

                        }
                        else if ($original == $new)
                        {
                        $config1['upload_path']='./assets/img';
                        $config1['allowed_types']='jpg|jpeg|png';
                        $config1['max_size']=9999999;

                        $this->load->library('upload', $config1);
                        $this->upload->do_upload('item_image');
                        $report = $this->upload->data(); 
                        $registerid = $this->session->userdata('register_id');
                        $result = $this->table_model->update_item($id);
                        if ($result)
                            {
                                if($this->input->post("hid_type") != $this->input->post("item_type"))
                              {
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has updated the item's (". $this->input->post("item_equipment"). ") item type from ".'"'.$this->input->post("hid_type").'"'." to ".'"'. $this->input->post("item_type").'"',
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                $this->table_model->add_history($history); 
                              }

                              if($this->input->post("hid_equipment") != $this->input->post("item_equipment"))
                              {
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has updated the item's (". $this->input->post("item_equipment"). ") item equipment name from ".'"'. $this->input->post("hid_equipment").'"'. " to ".'"'. $this->input->post("item_equipment").'"',
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                $this->table_model->add_history($history); 
                              }

                              if($this->input->post("hid_description") != $this->input->post("item_description"))
                              {
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has updated the item's (". $this->input->post("item_equipment"). ") item description from ".'"'. $this->input->post("hid_description").'"'. " to ".'"'. $this->input->post("item_description").'"',
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                $this->table_model->add_history($history); 
                              }

                              if($this->input->post("hid_serial") != $this->input->post("item_serial"))
                              {
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has updated the item's (". $this->input->post("item_equipment"). ") item serial number from ".'"'. $this->input->post("hid_serial").'"'." to ".'"'. $this->input->post("item_serial").'"',
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                $this->table_model->add_history($history); 
                              }

                              if($this->upload->do_upload('item_image'))
                              {
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has updated the item's (". $this->input->post("item_equipment"). ") item image from ".'"'. $this->input->post("hid_image1") .'"'." to ". '"'.$report['file_name'].'"',
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                $this->table_model->add_history($history); 
                              }

                              if($this->input->post("hid_color") != $this->input->post("item_color"))
                              {
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has updated the item's (". $this->input->post("item_equipment"). ") item color from ".'"'. $this->input->post("hid_color").'"'." to ".'"'. $this->input->post("item_color").'"',
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                $this->table_model->add_history($history); 
                              }

                              if($this->input->post("hid_unit") != $this->input->post("item_unit"))
                              {
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has updated the item's (". $this->input->post("item_equipment"). ") item unit from ".'"'. $this->input->post("hid_unit").'"'. " to ".'"'. $this->input->post("item_unit").'"',
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                $this->table_model->add_history($history); 
                              }

                              if($this->input->post("hid_quantity") != $this->input->post("item_quantity"))
                              {
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has updated the item's (". $this->input->post("item_equipment"). ") item quantity from ".'"'. $this->input->post("hid_quantity").'"'." to ".'"'. $this->input->post("item_quantity").'"',
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                $this->table_model->add_history($history); 
                              }

                              if($this->input->post("hid_sizes") != $this->input->post("item_sizes"))
                              {
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has updated the item's (". $this->input->post("item_equipment"). ") item size from ".'"'. $this->input->post("hid_sizes").'"'." to ".'"'. $this->input->post("item_sizes").'"',
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                $this->table_model->add_history($history); 
                              }

                              if($this->input->post("hid_remarks") != $this->input->post("item_remarks"))
                              {
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has updated the item's (". $this->input->post("item_equipment"). ") item remarks from ".'"'. $this->input->post("hid_remarks").'"'. " to ".'"'. $this->input->post("item_remarks").'"',
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                $this->table_model->add_history($history); 
                              }
                                $this->session->set_flashdata('success', 'Item was updated successfully.');
                                redirect('user/db_item/');

                            }
                        else 
                            {
                                $this->session->set_flashdata('error', 'Item failed to update. Please try again.');
                                redirect('user/db_item/');
                            }
                        }
                      if(! $this->session->userdata('username'))
                      {
                         $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
                         redirect('user/db_login/');
                      }
                  }

                public function delete_item($id = NULL)
                  {
                    if(!is_array($_POST) || count($_POST)==0)
                    {
                      $this->session->set_flashdata('error', 'You may not access through URL.');
                      redirect('user/db_item/');
                    } 
                            if(empty($id))
                            {
                                redirect('user/db_item');
                            }
                        $original = $this->input->post('original');
                        $new = $this->input->post('item_quantity');
                        if ($original != $new)
                        {
                          $this->session->set_flashdata('error', 'Item is currently in use. Please check if the borrower has returned the item.');
                                redirect('user/db_item/');

                        }
                        else if ($original == $new)
                        {
                        $result = $this->table_model->delete_item($id);
                        if ($result == true)
                        {
                              $registerid = $this->session->userdata('register_id');
                              $history = array
                              (
                              'register_id' => $registerid,
                              'action' => "has deleted the item: ". $this->input->post("item_equipment"),
                              'date_created' => date('Y-m-d H:i:s')
                              );

                              $this->table_model->add_history($history);
                              $this->session->set_flashdata('success', 'Item has been deleted successfully.');
                              redirect('user/db_item/');
                        }
                        else
                        {
                              $this->session->set_flashdata('error', 'An error occurred. Please try again.');
                              redirect('user/db_item/');
                        }
                        }
                    if(! $this->session->userdata('username'))
                      {
                         $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
                         redirect('user/db_login/');
                      }
                  }

                public function add_borrower()
                {
                  if(!is_array($_POST) || count($_POST)==0)
                  {
                    $this->session->set_flashdata('error', 'You may not access through URL.');
                    redirect('user/db_borrower/');
                  } 
                  $this->form_validation->set_rules('b_name', "Borrower's Name", 'required|is_unique[item_borrower.name]');
                  $this->form_validation->set_rules('b_address', 'Address/Office', 'required');
                  $this->form_validation->set_rules('b_phone', 'Phone Number', 'required');
                  $this->form_validation->set_rules('b_purpose', 'Purpose', 'required');
                  $this->form_validation->set_rules('terms', 'Terms & Condition', 'required');
                    if ($this->form_validation->run() == FALSE) 
                        { 
                          $this->db_borrower();
                        }
                    else 
                        { 
                            $id = $this->session->userdata('register_id');
                            $insert_data = array
                            (
                            'name' => $this->input->post('b_name'),
                            'office' => $this->input->post('b_address'),
                            'phone' => $this->input->post('b_phone'),
                            'purpose' => $this->input->post('b_purpose'),
                            'register_id' => $id
                            );

                            $insert = $this->table_model->add_borrower($insert_data);
                              if ($insert == TRUE) 
                              {
                              $registerid = $this->session->userdata('register_id');
                              $history = array
                              (
                              'register_id' => $registerid,
                              'action' => "has added a borrower: ". $this->input->post("b_name"),
                              'date_created' => date('Y-m-d H:i:s')
                              );

                              $this->table_model->add_history($history);
                              $this->session->set_flashdata('success', 'You have successfully inputted an item.');
                                    redirect('user/db_borrower/');
                              }
                              else 
                              {
                            $this->session->set_flashdata('error', 'Invalid data input.');
                             redirect('user/db_borrower/');
                              }
                          }
                    if(! $this->session->userdata('username'))
                      {
                         $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
                         redirect('user/db_login/');
                      }
                  }

               
                public function add_borrow()
                {
                  if(!is_array($_POST) || count($_POST)==0)
                  {
                    $this->session->set_flashdata('error', 'You may not access through URL.');
                    redirect('user/db_borrower/');
                  } 
                  $this->form_validation->set_rules('b_name', 'Borrower Name', 'required');
                  $this->form_validation->set_rules('b_equipment', 'Equipment', 'required');
                  $this->form_validation->set_rules('b_quantity', 'Quantity', 'required');
                    if ($this->form_validation->run() == FALSE) 
                        { 
                            $this->db_borrower();
                        }
                    else 
                        { 
                          $id = $this->session->userdata('register_id');
                          $b_quantity = $this->input->post('b_quantity');
                          $b_equipment = $this->input->post('b_equipment');
                          $item_quantity = $this->input->post('item_quantity');
                          $b_name = $this->input->post('b_name');
                          $item_status = 0;
                            if ($b_quantity > $item_quantity || $b_quantity < 0)
                            {
                             $this->session->set_flashdata('error', 'Borrowed quantity has surpassed the limit of the item quantity. You may not increase/decrease any further.');
                             redirect('user/db_borrower/');
                            }
                            else
                            {
                            $insert_data = array
                            (
                            'borrower_id' => $this->input->post('b_name'),
                            'item_id' => $b_equipment,
                            'b_quantity' => $b_quantity,
                            'r_quantity' => $b_quantity,
                            'register_id' => $id
                            );

                            $insert = $this->table_model->add_borrow($insert_data);
                              if ($insert == TRUE) 
                              {
                              $b_name1 = $this->table_model->b_name($b_name);
                              $registerid = $this->session->userdata('register_id');
                              $history = array
                              (
                              'register_id' => $registerid,
                              'action' => "has assigned the equipment ".'"'. $this->input->post('hid_equipment') .'"'." to ".'"'.$this->input->post('hid_name').'"'." with a quantity of ". $b_quantity,
                              'date_created' => date('Y-m-d H:i:s')
                              );

                              $this->table_model->add_history($history);
                              $this->table_model->deduct_quantity($b_quantity ,$b_equipment);
                              $this->table_model->added_br_quantity($b_quantity ,$b_name);
                              $this->session->set_flashdata('success', 'You have successfully assigned an equipment.');
                                    redirect('user/db_borrower/');
                              }
                              else 
                              {
                              $this->session->set_flashdata('error', 'Invalid data input.');
                              redirect('user/db_borrower/');
                              }
                            }
                          }
                    if(! $this->session->userdata('username'))
                      {
                         $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
                         redirect('user/db_login/');
                      }
                  }

                  public function update_borrow($id = NULL) 
                  {

                    if(!is_array($_POST) || count($_POST)==0)
                    {
                        $this->session->set_flashdata('error', 'You may not access through URL.');
                        redirect('user/db_borrower/');
                    } 
                            if(empty($id))
                            {
                                redirect('user/db_borrower');
                            }
                        $increase = $this->input->post('increase');
                        if (empty($increase)) 
                        {
                            if($this->input->post("hid_remarks") != $this->input->post("b_remarks"))
                            {
                              $registerid = $this->session->userdata('register_id');
                              $history = array
                              (
                              'register_id' => $registerid,
                              'action' => "has updated the borrowed item's (". $this->input->post("item_equipment"). ") remark from ".'"'. $this->input->post("hid_remarks").'"'. " to ".'"'. $this->input->post("b_remarks").'"',
                              'date_created' => date('Y-m-d H:i:s')
                              );
                              $this->table_model->add_history($history); 
                              $this->table_model->update_qremarks($id); 
                              $this->session->set_flashdata('success', 'Remarks was updated successfully.');
                              redirect('user/db_borrower/');
                            }
                        }

                        else 
                        {
                        $original = $this->input->post('original');
                        $b_quantity = $this->input->post('b_quantity');
                        $item_quantity = $this->input->post('item_quantity');
                        $item_id = $this->input->post('item_id');
                        $borrower_id = $this->input->post('borrower_id');
                        $total_item = $item_quantity - $increase;
                        $total_b = $b_quantity + $increase;
                        if ($total_item > $original || $total_item < 0 || $total_b < 0)
                        {
                            $this->session->set_flashdata('error', 'Borrowed quantity has surpassed the limit of the item quantity. You may not increase/decrease any further.');
                            redirect('user/db_borrower/');
                        }
                        else
                        {
                        $result = $this->table_model->update_borrow($id, $total_item, $total_b, $borrower_id);
                        $result = $this->table_model->update_borrow1($item_id, $total_item, $total_b);
                        $result = $this->table_model->update_br_quantity($increase, $borrower_id);
                        if($this->input->post("hid_remarks") != $this->input->post("b_remarks"))
                          {
                              $registerid = $this->session->userdata('register_id');
                              $history = array
                              (
                              'register_id' => $registerid,
                              'action' => "has updated the borrowed item's (". $this->input->post("item_equipment"). ") remark from ".'"'. $this->input->post("hid_remarks").'"'. " to ".'"'. $this->input->post("b_remarks").'"',
                              'date_created' => date('Y-m-d H:i:s')
                              );
                              $this->table_model->update_qremarks($id); 
                              $this->table_model->add_history($history); 
                          }
                        if ($result)
                            {
                                $registerid = $this->session->userdata('register_id');
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has changed the quantity from ". $b_quantity ." to ". $total_b ." of the assigned equipment ".'"'. $this->input->post("item_equipment").'"'." from ".'"'. $this->input->post("b_name").'"',
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                $this->table_model->add_history($history);

                                $this->session->set_flashdata('success', 'Borrowed Item was updated successfully.');
                                redirect('user/db_borrower/');
                            }
                        else 
                            {
                                $this->session->set_flashdata('error', 'Borrowed Item failed to update. Please try again.');
                                redirect('user/db_borrower/');
                            }
                          }
                        }
                    if(! $this->session->userdata('username'))
                      {
                         $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
                         redirect('user/db_login/');
                      }
                  }


                public function delete_borrow($id = NULL)
                  {
                    if(!is_array($_POST) || count($_POST)==0)
                    {
                      $this->session->set_flashdata('error', 'You may not access through URL.');
                      redirect('user/db_borrower/');
                    } 
                            if(empty($id))
                            {
                                redirect('user/db_borrower');
                            }
                        $b_quantity = $this->input->post('b_quantity');
                        $b_name = $this->input->post('b_name');
                        $b_equipment = $this->input->post('b_equipment');
                        $result = $this->table_model->delete_borrow($id);
                        if ($result == true)
                        {     $this->table_model->added_quantity($b_quantity, $b_equipment);
                              $this->table_model->deduct_br_quantity($b_quantity, $b_name);
                              $registerid = $this->session->userdata('register_id');
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has removed the borrowed item ".'"'.$this->input->post("hid_equipment").'"'." by ".'"'.$this->input->post("hid_name") .'"'." returning the quantity ". $b_quantity,
                                'date_created' => date('Y-m-d H:i:s')
                                );

                              $this->table_model->add_history($history);
                              $this->session->set_flashdata('success', 'Item has been deleted successfully.');
                              redirect('user/db_borrower/');
                        }
                        else
                        {
                              $this->session->set_flashdata('error', 'An error occurred. Please try again.');
                              redirect('user/db_borrower/');
                        }
                    if(! $this->session->userdata('username'))
                      {
                         $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
                         redirect('user/db_login/');
                      }
                  }

                public function delete_borrower($id = NULL)
                  {
                    if(!is_array($_POST) || count($_POST)==0)
                    {
                      $this->session->set_flashdata('error', 'You may not access through URL.');
                      redirect('user/db_borrower/');
                    } 
                            if(empty($id))
                            {
                                redirect('user/db_borrower');
                            }
                        $br_item = $this->input->post('br_item');
                        if ($br_item <= 0)
                        {
                        $result = $this->table_model->delete_borrower($id);
                        if ($result == true)
                        {   
                              $registerid = $this->session->userdata('register_id');
                              $history = array
                              (
                              'register_id' => $registerid,
                              'action' => "has deleted a borrower: ". $this->input->post("b_name"),
                              'date_created' => date('Y-m-d H:i:s')
                              );

                              $this->table_model->add_history($history);
                              $this->session->set_flashdata('success', 'User has been deleted successfully.');
                              redirect('user/db_borrower/');
                        }
                        else
                        {
                              $this->session->set_flashdata('error', 'An error occurred. Please try again.');
                              redirect('user/db_borrower/');
                        }
                        }
                        else if ($br_item > 0)
                        {
                          $this->session->set_flashdata('error', 'Borrower is currently borrowing an item. Cannot delete unless the item is returned.');
                              redirect('user/db_borrower/');
                        }
                    if(! $this->session->userdata('username'))
                      {
                         $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
                         redirect('user/db_login/');
                      }
                  }

                public function update_borrower($id = NULL) 
                  {

                    if(!is_array($_POST) || count($_POST)==0)
                    {
                      $this->session->set_flashdata('error', 'You may not access through URL.');
                      redirect('user/db_borrower/');
                    } 
                            if(empty($id))
                            {
                                redirect('user/db_borrower');
                            }

                        $br_item = $this->input->post('br_item');
                        if ($br_item <= 0)
                        {
                            $result = $this->table_model->update_borrower($id);
                        if ($result)
                            {
                              if($this->input->post("hid_name") != $this->input->post("b_name"))
                              {
                                $registerid = $this->session->userdata('register_id');
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has updated the borrower's (". $this->input->post("b_name"). ") name from ".'"'. $this->input->post("hid_name").'"'. " to ".'"'. $this->input->post("b_name").'"',
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                $this->table_model->add_history($history); 
                              }

                              if($this->input->post("hid_address") != $this->input->post("b_address"))
                              {
                                $registerid = $this->session->userdata('register_id');
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has updated the borrower's (". $this->input->post("b_name"). ") address/office from ".'"'. $this->input->post("hid_address").'"'. " to ".'"'. $this->input->post("b_address").'"',
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                $this->table_model->add_history($history); 
                              }

                              if($this->input->post("hid_phone") != $this->input->post("b_phone"))
                              {
                                $registerid = $this->session->userdata('register_id');
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has updated the borrower's (". $this->input->post("b_name"). ") phone number from ".'"'. $this->input->post("hid_phone").'"'. " to ".'"'. $this->input->post("b_phone").'"',
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                $this->table_model->add_history($history); 
                              }

                              if($this->input->post("hid_purpose") != $this->input->post("b_purpose"))
                              {
                                $registerid = $this->session->userdata('register_id');
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has updated the borrower's (". $this->input->post("b_name"). ") purpose from ".'"'. $this->input->post("hid_purpose").'"'. " to ".'"'. $this->input->post("b_purpose").'"',
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                $this->table_model->add_history($history); 
                              }

                              if($this->input->post("hid_remarks") != $this->input->post("b_remarks"))
                              {
                                $registerid = $this->session->userdata('register_id');
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has updated the borrower's (". $this->input->post("b_name"). ") remarks from ".'"'. $this->input->post("hid_remarks").'"'. " to ".'"'. $this->input->post("b_remarks").'"',
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                $this->table_model->add_history($history); 
                              }


                                $this->session->set_flashdata('success', 'Borrower was updated successfully.');
                                redirect('user/db_borrower/');
                            }
                        else 
                            {
                                $this->session->set_flashdata('error', 'Borrower failed to update. Please try again.');
                                redirect('user/db_borrower/');
                            }

                        }
                        else if ($br_item > 0)
                        {
                          $this->session->set_flashdata('error', 'Borrower is currently borrowing an item. Cannot update unless the item is returned.');
                              redirect('user/db_borrower/');
                        }
                    if(! $this->session->userdata('username'))
                      {
                         $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
                         redirect('user/db_login/');
                      }
                  }

                public function update_return($id = NULL)
                  {
                  if(!is_array($_POST) || count($_POST)==0)
                  {
                    $this->session->set_flashdata('error', 'You may not access through URL.');
                    redirect('user/db_status/');
                  } 
                            if(empty($id))
                            {
                                redirect('user/db_status');
                            }
                        $b_quantity = $this->input->post('b_quantity');
                        $b_name = $this->input->post('b_name');
                        $b_equipment = $this->input->post('b_equipment');
                        $result = $this->table_model->update_return($id);
                        if ($result == true)
                        {     
                              $registerid = $this->session->userdata('register_id');
                              $history = array
                              (
                              'register_id' => $registerid,
                              'action' => "has updated the status of the borrowed item ".'"'. $this->input->post('hid_equipment') .'"'." by ".'"'.$this->input->post('hid_name').'"'." since ".$this->input->post("hid_date").' to '.'"'."returned".'"',
                              'date_created' => date('Y-m-d H:i:s')
                              );

                              $this->table_model->add_history($history);
                              $this->table_model->added_quantity($b_quantity, $b_equipment);
                              $this->table_model->deduct_br_quantity($b_quantity, $b_name);
                              $this->session->set_flashdata('success', 'Borrowed item status has been changed to returned successfully.');
                              redirect('user/db_status/');
                        }
                        else
                        {
                              $this->session->set_flashdata('error', 'An error occurred. Please try again.');
                              redirect('user/db_status/');
                        }
                    if(! $this->session->userdata('username'))
                      {
                         $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
                         redirect('user/db_login/');
                      }
                  }

                  public function update_unreturn($id = NULL)
                  {
                            if(empty($id))
                            {
                                redirect('user/db_status');
                            }
                        $b_quantity = $this->input->post('b_quantity');
                        $b_name = $this->input->post('b_name');
                        $b_equipment = $this->input->post('b_equipment');
                        $result = $this->table_model->update_unreturn($id);
                        if ($result == true)
                        {     
                              $registerid = $this->session->userdata('register_id');
                              $history = array
                              (
                              'register_id' => $registerid,
                              'action' => "has updated the status of the borrowed item ".'"'. $this->input->post('hid_equipment') .'"'." by ".'"'.$this->input->post('hid_name').'"'." since ".$this->input->post("hid_date").' to '.'"'."unreturned".'"',
                              'date_created' => date('Y-m-d H:i:s')
                              );

                              $this->table_model->add_history($history);
                              $this->table_model->deduct_quantity($b_quantity, $b_equipment);
                              $this->table_model->added_br_quantity($b_quantity, $b_name);
                              $this->session->set_flashdata('success', 'Borrowed item status has been changed to unreturned successfully.');
                              redirect('user/db_status/');
                        }
                        else
                        {
                              $this->session->set_flashdata('error', 'An error occurred. Please try again.');
                              redirect('user/db_status/');
                        }
                    if(! $this->session->userdata('username'))
                      {
                         $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
                         redirect('user/db_login/');
                      }
                  }


  
  public function register() 
      {
          if(!is_array($_POST) || count($_POST)==0)
          {
            $this->session->set_flashdata('error', 'You may not access through URL.');
            redirect('user/db_register/');
          } 
          $this->form_validation->set_rules('r_lname', 'Last Name', 'required');
          $this->form_validation->set_rules('r_fname', 'First Name', 'required');
          $this->form_validation->set_rules('r_mname', 'Middle Name');
          $this->form_validation->set_rules('r_office', 'Office/Agency', 'required');
          $this->form_validation->set_rules('r_email', 'Email Address', 'required|trim|valid_email|is_unique[item_register.email]');
          $this->form_validation->set_rules('r_username', 'Username', 'required|is_unique[item_register.username]');
          $this->form_validation->set_rules('r_pass', 'Password', 'callback_valid_password');
          $this->form_validation->set_rules('r_confirm', 'Confirm Password', 'required|matches[r_pass]');
          $this->form_validation->set_rules('r_role', 'Role', 'required');
            if ($this->form_validation->run() == FALSE) 
            { 
                $id = $this->session->userdata('register_id');
                $data['details'] = $this->table_model->get_details($id);
                $data['data'] = $this->table_model->retrieve_borrower();
                $data['item'] = $this->table_model->retrieve_item();
                $data['borrow'] = $this->table_model->retrieve_borrow();
                $data['register'] = $this->table_model->retrieve_register();
                $this->load->view('db_register', $data);
            }
            else 
            {
      
            $insert_data = array(
              'last_name' => $this->input->post('r_lname', TRUE),
              'first_name' => $this->input->post('r_fname', TRUE),
              'middle_name' => $this->input->post('r_mname', TRUE),
              'office' => $this->input->post('r_office', TRUE),
              'email' => $this->input->post('r_email', TRUE),
              'phone' => $this->input->post('r_contact', TRUE),
              'username' => $this->input->post('r_username', TRUE),
              'pass' => password_hash($this->input->post('r_pass', TRUE), PASSWORD_DEFAULT),
              'confirm_pass' => password_hash($this->input->post('r_confirm', TRUE), PASSWORD_DEFAULT),
              'role' => $this->input->post('r_role', TRUE)
            );

            $result = $this->table_model->register_user($insert_data);

            if ($result == TRUE) 
            {
                $registerid = $this->session->userdata('register_id');
                $history = array
                (
                'register_id' => $registerid,
                'action' => "has added a new account for ". $this->input->post('r_fname') ." ". $this->input->post('r_mname') ." ". $this->input->post('r_lname'),
                'date_created' => date('Y-m-d H:i:s')
                );

                $this->table_model->add_history($history);
                $this->session->set_flashdata('success', 'You have registered the account successfully.');
                redirect('user/db_register/');

            } 
            else 
            {

                $this->session->set_flashdata('error', 'Invalid registration.');
                redirect('user/db_register/');

            }
          } 
             if(! $this->session->userdata('username'))
              {
                 $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
                 redirect('user/db_login/');
              }
        }

        public function update_account($id = NULL) 
            {
              if(!is_array($_POST) || count($_POST)==0)
              {
                $this->session->set_flashdata('error', 'Your selected input was empty. Please select an available option.');
                redirect('user/db_register/');
              } 
              if(empty($id))
                {
                  redirect('user/db_register');
                }

                $result = $this->table_model->update_account($id);
                if ($result)
                {
                  $registerid = $this->session->userdata('register_id');
                  $history = array
                  (
                  'register_id' => $registerid,
                  'action' => "has changed the role for ". $this->input->post('hid_fname') ." ". $this->input->post('hid_mname') ." ". $this->input->post('hid_lname'). " to ".'"'. $this->input->post("r_role").'"',
                  'date_created' => date('Y-m-d H:i:s')
                  );
                  $this->table_model->add_history($history);
                  $this->session->set_flashdata('success', 'Role was updated successfully.');
                      redirect('user/db_register/');
                }

                else 
                {
                  $this->session->set_flashdata('error', 'Role was not update. Please try again.');
                      redirect('user/db_register/');
                }
                  if(! $this->session->userdata('username'))
                    {
                       $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
                       redirect('user/db_login/');
                    }
            }

        public function activate_account($id = NULL) 
            {
              if(!is_array($_POST) || count($_POST)==0)
              {
                $this->session->set_flashdata('error', 'Your selected input was empty. Please select an available option.');
                redirect('user/db_register/');
              } 
              if(empty($id))
                {
                  redirect('user/db_register');
                }
                
                $result = $this->table_model->activate_account($id);
                if ($result)
                {
                  if ($this->input->post("r_status")== 1)
                  {
                    $newstatus = "active";
                  }
                  else if ($this->input->post("r_status")== 0)
                  {
                    $newstatus = "inactive";
                  }
                  $registerid = $this->session->userdata('register_id');
                  $history = array
                  (
                  'register_id' => $registerid,
                  'action' => "has changed the status for ". $this->input->post('hid_fname') ." ". $this->input->post('hid_mname') ." ". $this->input->post('hid_lname'). " to ".'"'. $newstatus.'"',
                  'date_created' => date('Y-m-d H:i:s')
                  );
                  $this->table_model->add_history($history);
                  $this->session->set_flashdata('success', 'Account status was updated successfully.');
                      redirect('user/db_register/');
                }

                else 
                {
                  $this->session->set_flashdata('error', 'Account status was not update. Please try again.');
                      redirect('user/db_register/');
                }

                      if(! $this->session->userdata('username'))
                      {
                         $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
                         redirect('user/db_login/');
                      }
            }

          public function update_profile($id = NULL) 
                {


                  if(!is_array($_POST) || count($_POST)==0)
                  {
                    $this->session->set_flashdata('error', 'You may not access through URL.');
                    redirect('user/index/');
                  } 
                          if(empty($id))
                          {
                              redirect('user/index');
                          }

                          $result = $this->table_model->update_profile($id);
                      if ($result)
                          {
                              $registerid = $this->session->userdata('register_id');
                              if($this->input->post("hid_fname") != $this->input->post("first_name"))
                              {
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has updated his/her first name from ".'"'.$this->input->post("hid_fname").'"'. " to ".'"'.$this->input->post("first_name").'"',
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                $this->table_model->add_history($history); 
                              }

                              if($this->input->post("hid_mname") != $this->input->post("middle_name"))
                              {
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has updated his/her middle name from ".'"'.$this->input->post("hid_mname").'"'. " to ".'"'.$this->input->post("middle_name").'"',
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                $this->table_model->add_history($history); 
                              }

                              if($this->input->post("hid_lname") != $this->input->post("last_name"))
                              {
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has updated his/her last name from ".'"'.$this->input->post("hid_lname").'"'. " to ".'"'.$this->input->post("last_name").'"',
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                $this->table_model->add_history($history); 
                              }

                              if($this->input->post("hid_office") != $this->input->post("office"))
                              {
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has updated his/her office/agency from ".'"'.$this->input->post("hid_office").'"'. " to ".'"'.$this->input->post("office").'"',
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                $this->table_model->add_history($history); 
                              }

                              if($this->input->post("hid_phone") != $this->input->post("phone"))
                              {
                                $history = array
                                (
                                'register_id' => $registerid,
                                'action' => "has updated his/her phone number from ".'"'.$this->input->post("hid_phone").'"'. " to ".'"'.$this->input->post("phone").'"',
                                'date_created' => date('Y-m-d H:i:s')
                                );
                                $this->table_model->add_history($history); 
                              }

                              $this->session->set_flashdata('success', 'Profile was updated successfully.');
                              redirect('user/index/');
                          }
                      else 
                          {
                              $this->session->set_flashdata('error', 'Profile failed to update. Please try again.');
                              redirect('user/index/');
                          }

                      
                  if(! $this->session->userdata('username'))
                    {
                       $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
                       redirect('user/db_login/');
                    }
                }

          public function update_pass($id = NULL)
                {
                  if(!is_array($_POST) || count($_POST)==0)
                  {
                    $this->session->set_flashdata('error', 'You may not access through URL.');
                    redirect('user/index/');
                  }

                    if(empty($id))
                    {
                         redirect('user/index/');
                    }

                  $this->form_validation->set_rules('current', 'Current Password', 'required');
                  $this->form_validation->set_rules('new', 'Password', 'callback_valid_password');
                  $this->form_validation->set_rules('confirm', 'Confirm Password', 'required|matches[new]');
                  if ($this->form_validation->run() == FALSE) 
                  {
                    $data['details'] = $this->table_model->get_details($id);
                    $this->load->view('index', $data);
                  }
                  else
                  {
                  $id = $this->session->userdata('register_id');
                  $data = array(
                  'pass' => password_hash($this->input->post('new', TRUE), PASSWORD_DEFAULT),
                  'confirm_pass' => password_hash($this->input->post('confirm', TRUE), PASSWORD_DEFAULT)
                  );

                  $login_data = array(
                  'pass' => $this->input->post('current')
                  );

                  $result = $this->table_model->check_pass($id,$login_data);
                  if (!empty($result['status']) && $result['status'] === TRUE) 
                  {
                  $verification = $this->table_model->newpass($id, $data);
                  if($verification)
                  {
                  $this->session->set_flashdata('success', 'You have successfully changed your password.');
                  redirect('user/index');
                  } 
                  else 
                  {
                  $this->session->set_flashdata('error', 'Failed to change password. Please try again.');
                  redirect('user/index');
                  }
                  } 
                  else 
                  {
                      $this->session->set_flashdata('error', 'Incorrect Password. Please try again.');
                      redirect('user/index');
                  }
                  }
                  if(! $this->session->userdata('username'))
                    {
                       $this->session->set_flashdata('error', 'You have not yet logged in an account. Please login first.');
                       redirect('user/db_login/');
                    }
                }


  public function valid_password($password = '')
  {
    $password = trim($password);

    $regex_lowercase = '/[a-z]/';
    $regex_uppercase = '/[A-Z]/';
    $regex_number = '/[0-9]/';
    $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>ยง~]/';

    if (empty($password))
    {
      $this->form_validation->set_message('valid_password', 'The {field} field is required.');

      return FALSE;
    }

    if (strlen($password) < 6)
    {
      $this->form_validation->set_message('valid_password', 'The {field} field must be at least 6 characters in length.');

      return FALSE;
    }
    if (preg_match_all($regex_number, $password) < 1)
    {
      $this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');
      return FALSE;
    }

    if (preg_match_all($regex_uppercase, $password) < 1)
    {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');
            return FALSE;
    }

    return TRUE;
  }
  //strong password end


  public function login() 
  {

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');

        if ($this->form_validation->run() == FALSE)
        {
             $this->session->set_flashdata('error', 'The username and password fields are required.');
             redirect('user/db_login/');
        }

        else
        {
        
        $username =  $this->input->post('username', TRUE);
        $password = $this->input->post('pass', TRUE);

                $login_data = array(
                  'username' => $username,
                  'pass' => $password
                );

                $result = $this->table_model->check_login($login_data);

                if (!empty($result['status']) && $result['status'] === TRUE) 
                {
                    $id = $this->session->userdata('register_id');
                    $history = array
                    (
                    'register_id' => $id,
                    'action' => "has logged in",
                    'date_created' => date('Y-m-d H:i:s')
                    );

                    $this->table_model->add_history($history);
                    $this->session->set_userdata(array('username'=>$username)); 
                    $this->session->set_flashdata('success', 'You have successfully logged in.');
                    redirect('user/index/');
                }

                else 
                {
                    $this->session->set_flashdata('error', 'Invalid username and password. Please try again.');
                    redirect('user/db_login/');
                }
        }
    }

  public function logout() 
        {
        $id = $this->session->userdata('register_id');
        $this->session->unset_userdata('username');  
        $this->session->unset_userdata('register_id'); 
        $history = array
                    (
                    'register_id' => $id,
                    'action' => "has logged out",
                    'date_created' => date('Y-m-d H:i:s')
                    );
                    
        $this->table_model->add_history($history);
        $this->session->set_flashdata('success', 'You have successfully logged out.'); 
        redirect("user/db_login");
        }
          
}


?>