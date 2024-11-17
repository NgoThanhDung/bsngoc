<?php

defined('BASEPATH') or exit('No direct script access allowed');



class User_oauth extends MY_Model

{

  public function __construct()

  {



    parent::__construct();

    $this->table = "user_oauth_provider";



  }





  public function check_exist_row($condition=[], $table = 'user_oauth_provider')

  {

    return $this->check_with_conditions($condition, $table);

  }



  /**

   * Lấy user_id theo điều kiện

   *

   */

  public function get_user_oauth($condition = [])

  {

    if (!$condition) {

      return FALSE;

    }

    $this->db->select('user_id');

    $this->db->where($condition);

    return $this->db->get($this->table)->row();

  }









}

