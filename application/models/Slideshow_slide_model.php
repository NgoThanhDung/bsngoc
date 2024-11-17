<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Slideshow_slide_model extends MY_Model

{
  public function __construct()
  {
    parent::__construct();
    $this->table = "slideshow_slides";
  }
  public function get_all_slides()
  {
    return $this->db->get($this->table)->result_array();
  }
  public function insert_slides_for_slideshow($data)
  {
    if ($data) {

      $this->db->insert_batch($this->table, $data);
    }
  }
  public function get_slides_for_slideshow($slideshow_id)
  {
    $condition = ['slideshow_id' =>  $slideshow_id];
    $this->db->where($condition);
    return $this->db->get($this->table)->result_array();
  }
  public function delete_slideshow_slides($slideshow_id)
  {
    $this->delete(['slideshow_id' => $slideshow_id]);
  }
}
