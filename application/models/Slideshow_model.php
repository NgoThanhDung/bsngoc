<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slideshow_model extends MY_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table = "slideshow";
  }

  public function get_all_slides()
  {
    return $this->db->get($this->table)->result_array();
  }



  public function get_header_slideshow()
  {
    // $this->db->select('id');
    // $this->db->where(['status' => 1]);
    // $slideshow_id = $this->db->get($this->table)->row_array(1)['id'];
    // $this->db->where(['slideshow_id' => $slideshow_id]);
    // return $this->db->get('slideshow_slides')->result_array();
    $this->db->select('*');
    $this->db->from('slideshow_slides as slide');
    $this->db->join('slideshow', 'slide.slideshow_id = slideshow.id', 'LEFT');
    $this->db->where([
      'slideshow.status' => 1
    ]);
    return $this->db->get()->result_array();
  }

  public function get_slideshows_for_datatable()
  {
    $this->db->select([
      'N.id as slideshow_id', 'N.name as slideshow_name',
    ]);
    $this->db->from('slideshow as N');
    $SQL =  $this->db->get_compiled_select();
    return $this->datatable->LoadJsonV($SQL);
  }

  // public function check_table()
  // {
  //   return $this->check_table() > 0;
  // }

  public function update_slideshow($data, $id)
  {
    return $this->update($data, [$this->primaryKey => $id]);
  }

  public function create_slideshow($data)
  {
    return $this->insert_and_get_id($data, $this->table);
  }



  public function deselect_selected_slideshow()

  {

    $this->db->update($this->table, ['status' => 0]);
  }
}
