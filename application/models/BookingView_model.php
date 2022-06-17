<?php
class Users_model extends CI_Model

{
/* we will use the function getUsers */
  function get_users()
  {
    /* all the queries relating to the data we want to retrieve will go in here. */

    $this->db->where(array('id'=>7,'usr_mail'=>'mail@mail.org'));
    $this->db->select('usr_name');
    $q = $this->db->get('users');

    /* after we've made the queries from the database, we will store them inside a variable called $data, and return the variable to the controller */
    if($q->num_rows() > 0)
    {
      foreach ($q->result() as $row)
      {
        $data[] = $row;
      }
      return $data;
    }
  }
}