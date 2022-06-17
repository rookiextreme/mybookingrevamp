<?php
if(!defined("BASEPATH")) exit("No direct script access allowed");
class Users extends CI_Controller
{
  public function index()
  {
    //if you decided NOT to autoload the database library you would have to add this line: $this->load->library('database');
    $this->load->model("users_model"); // we load the model that we saved in the application/models folder, so that the controller will know where to get the methods from
    $data["users"]=$this->users_model->get_users(); // we will load the result of the query inside the $data array having the key 'users'

    // if you decided to send the conditions for the select to the method, then you would have to write something like this...
    // $data["users"]=$this->users_model->get_users(array('id'=>7,'usr_mail'=>'mail@mail.org'));

    $this->load->view("users_view",$data);// after you stored the query results inside the $data array, you will have to send the array to the view which will display it inside the browser.
  }
}