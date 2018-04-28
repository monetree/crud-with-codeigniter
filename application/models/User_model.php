<?php
class User_model extends CI_model
{
  public function user_register($data)
    {
      $this->db->where('email',$data['email']);
      $res = $this->db->get('user_tbl');
      $count = $res->num_rows();
      if($count > 0)
      {
        return 3;
      }
      else
      {
      $res = $this->db->insert('user_tbl',$data);
      if($res)
      return 1;
      else
      return 2;
    }
  }
  public function get_total_user()
  {
    $rs = $this->db->get('user_tbl');
    $count_records = $rs->num_rows();
    return $count_records;
  }
  public function get_records()
  {
    $this->db->order_by('name','ASC');
    $rs = $this->db->get('user_tbl');
    return $rs;
  }
  public function delete_records($uid)
  {
    $delete_res = $this->db->delete('user_tbl',array('user_id'=>$uid));
    return $delete_res;
  }
  public function update_records($uid)
  {
    $this->db->where('user_id',$uid);
    $rs = $this->db->get('user_tbl');
    return $rs;
  }
  public function update_now($upd_data,$uid)
  {

    $this->db->where('user_id',$uid);
    $upd = $this->db->update('user_tbl',$upd_data);
    if($upd)
    return 1;
    else
    return 2;
  }
  public function login($data)
  {
    $this->db->where($data);
    $res = $this->db->get('user_tbl');
    return $res;
    if($res)
    return 1;
    else
    return 2;
  }
  public function search($filter)
  {
    $this->db->like('name',$filter,'after');
    $rs = $this->db->get('user_tbl');
    return $rs;
  }
  public function get_data(){
    $count = $this->db->count_all('user_tbl');
    return $count;
  }
  public function upload_file($data,$table){
    $this->db->insert($table,$data);
  }
  public function limited_records($per_page,$si){
    $this->db->select('user_id');
    $this->db->select('name');
    $this->db->select('email');
    $this->db->select('number');
    $this->db->from('user_tbl');
    $this->db->limit($per_page,$si);
    $res = $this->db->get();
    return $res;
  }

  public function angular_get_data($table,$data){
    if(!empty($data)){
      $data="select * from $table where country_id='".$data->country_id."'";
      $data=$this->db->query($data);
      return $data;
    }
    if(empty($data)){
    $data=$this->db->get($table);
    return $data;
  }
  }
  public function angular_get_distric($table,$data){
    $data="select * from $table where state_id='".$data->state_id."'";
    $data=$this->db->query($data);
    return $data;
  }
public function insert_data($data){
  $res=$this->db->insert('data_table',$data);
  if($res){
  return 1;
}
  else {
    return 2;
  }
}



}
?>
