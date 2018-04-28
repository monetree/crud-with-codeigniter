<?php
class User_controller extends CI_controller
{

  public function get_user()
  {
    $this->load->view('index');
  }
  public function signup()
  {
    $this->load->view('signup');
  }

  public function read_user_data()
  {
    $this->load->library('form_validation');
    $form_data = array(
      array(
      'field' => 'name',
      'label' => 'username',
      'rules' => 'trim|required|alpha_numeric_spaces|min_length[5]',
      'errors' => array(
            'required' => 'name is required',
            'alpha' => 'invalid name',
            'min_length' => 'username is too short'
                        )
            ),
      array(
            'field' => 'email',
            'label' => 'email',
            'rules' => 'trim|required|valid_email|is_unique[user_tbl.email]',
            'errors' => array(
                'required' => 'email is required',
                'valid_email' => 'invalid email',
                'is_unique' => 'email already exist'
                        )
            ),
      array(
            'field' => 'number',
            'label' => 'mobile',
            'rules' => 'trim|required|numeric|min_length[10]|max_length[12]|is_unique[user_tbl.number]',
            'errors' => array(
                    'required' => 'mobile is required',
                    'numeric' => 'number must be numeric',
                    'min_length' => 'invalid mobile',
                    'max_lenth' => 'Invalid mobile',
                    'is_unique' => 'number is already exist'
                            )
                  ),
      array(
            'field' => 'password',
            'label' => 'password',
            'rules' => 'trim|required|min_length[5]|matches[password]|regex_match[/^[a-zA-Z0-9~!#$%^&*()_+>.,<]+$/]',
            'errors' => array(
                    'required' => 'password is required',
                    'min_length' => 'password is too short',
                    'regex_match' => 'Invalid password'
                              )
                  )
    );
    $this->form_validation->set_rules($form_data);
    if($this->form_validation->run()==false){
      $this->load->view('signup');
    }else{
      $this->load->model('user_model','um');
      extract($_POST);
      $udata = array(
        'name'=>$name,
        'email'=>$email,
        'number'=>$number,
        'password'=>$password
      );
      $resp = $this->um->user_register($udata);
      if($resp == 3){
        $msg = "Email Already Exist";
      }else if($resp == 1){
        $msg = "Registration Success";
      }else{
        $msg = "Registration Failed";
      }
        $rdata = array(
          'ret' => $msg
      );
        $this->load->view('signup',$rdata);
  }
}
  public function get_records()
  {
    $this->load->model('user_model','um');
    $this->load->library('pagination');
    $uid = $this->uri->segment(3);
    $this->um->delete_records($uid);
    $total_user = $this->um->get_total_user();
    $resp = $this->um->get_records();
    $this->load->library('session');
    $name = $this->session->userdata('name');
    if(empty($name)){
      redirect('User_controller/login');
    }
    $this->load->library('pagination');
    $config['base_url'] =  site_url()."/user_controller/get_records";
    $config['total_rows'] = $this->um->get_data();
    $config['per_page'] = 4;
    $config['attributes'] = array('class' => 'plinks');
    $config['use_page_numbers'] = true;
    $config['cur_tag_open'] = "<b class='curpage'>";
    $config['cur_tag_close'] = "</b>";
    $config['next_link'] = ">>";
    $config['prev_link'] = "<<";

    $this->pagination->initialize($config);
    $links = $this->pagination->create_links();
    $seg = $this->uri->segment(3);
      if(empty($seg))
        $si = 0;
      else
        $si = $seg;
    $rs = $this->um->limited_records($config['per_page'],$si);
    $rdata = array(
      'records' => $rs,
      'total_user'=> $total_user,
      'paginations' => $links
    );
    $this->load->view('get_records',$rdata);
  }
  public function update_records()
  {
    $uid = $this->uri->segment(3);
    $this->load->model('User_model','um');
    $resp = $this->um->update_records($uid);
    $data = array(
      'records' => $resp
    );
    $this->load->view('update_view',$data);
  }
  public function update_now()
  {
    $this->load->model('user_model','um');
    extract($_POST);
    $udata = array(
  'name' => $update_name,
  'email' => $update_email,
  'number' => $update_number
);
  $uid = $this->uri->segment(3);
  $resp = $this->um->update_now($udata,$uid);
  if($resp == 1){
    redirect('User_controller/get_records');
  }
  }
  //update controller end
//------------*---------------//
  //login controller start
  public function login()
  {
    $this->load->library('session');
    $this->load->view('login');
      $name = $this->session->userdata('name');
    if(!empty($name)){
      redirect('User_controller/get_user');
    }
  }
  public function login_user()
  {
    $this->load->model('User_model','um');
    extract($_POST);
    $login_data = array(
      'email' => $email,
      'password' => $password
    );
    $resp = $this->um->login($login_data);
    $name = $resp->row()->name;
    $user_id = $resp->row()->user_id;
    $set_session = array(
      'name' => $name,
      'user_id' => $user_id
    );
    if($resp == 1){
      $this->load->library('session');
      $this->session->set_userdata($set_session);
      redirect('User_controller/get_records');
    }
  }
public function set_session(){
  $this->load->library('session');
  $sess_data = array(
    'user_id' =>5,
    'name' =>'srk'
  );
  $this->session->set_userdata($sess_data);
}
public function get_session_data(){
  $this->load->library('session');
  $uid= $this->session->userdata('user_id');
  $name= $this->session->userdata('name');
}
public function delete_session(){
  $this->load->library('session');
  $del_session_data = array(
    'user_id' => 5,
    'name' => 'srk'
  );
  $this->session->unset_userdata($del_session_data);
}
public function str(){
  $this->load->helper('mystr');
  echo rev_str('reverse this');
}
public function own_library(){
  $this->load->library('mylib');
  $this->mylib->myLibrary();
}
public function upload(){
  extract($_POST);
  if(isset($upload)){
    $this->load->model('User_model','um');
    $config['upload_path'] = "assets/uploads/";
    $config['allowed_types'] = "jpg|jpeg|png|bmp|gif";
    $config['file_name'] = rand(1000,9999);
    $this->load->library('upload',$config);
    if($this->upload->do_upload('image')){
      $insert_data = array(
        'file_name' => $this->upload->data('file_name')
      );
      $this->um->upload_file($insert_data,'upload_tbl');
    }else{
      $data['error'] = $this->upload->display_errors();
      $this->load->view('get_records',$data);
    }
  }else{
    $this->load->view('get_records');
  }
}
  public function calender(){
    $pref = array(
      'show_next_prev' => true,
      'next_prev_url' => site_url()."/User_controller/calender",
      'start_day' => 'sunday',
      'month_type' => 'long',
      'day_type' => 'short',
      'table_open' => '<table class="calendar">',
      'cal_cell_start' => '<td class="day">',
      'cal_cell_start_today' => '<td class="today">'
    );
    $this->load->library('calendar',$pref);
    $year = $this->uri->segment(3);
    $month = $this->uri->segment(4);
    $data_links = array(
      '15' => 'http://udemy.com'
    );
    $calender = $this->calendar->generate($year,$month,$data_links);
    $data = array(
      'calender' => $calender
    );
    $this->load->view('calender',$data);
  }

public function ajax(){
  $this->load->model('user_model','um');
  $resp = $this->um->angular();
  $data = array(
    'rec' => $resp
  );
  $this->load->view('ajax',$data);

}
public function ajax_get(){
  $cid = $_GET['cid'];
  $this->load->model('user_model','um');
  $resp['data'] = $this->um->angularo($cid);
  ?>
  <select name="state" id="show" onchange="distric()">
    <option value="">--states--</option>
  <?php
  foreach($data->result() as $row){
  ?>
    <option value="<?php echo $row['state_id'];?>"><?php echo $row['state_name'];?></option>
  <?php
  }
  ?>
  </select>
<?php
  }
public function angular_test(){
extract($_POST);
if(isset($submit)){
  $form_data=array(
    'country_id' => $country,
    'state_id' => $state,
    'distric_id' => $distric,
    'data' => $data
  );
$this->load->model('User_model','um');
$resp=$this->um->insert_data($form_data);
if($resp==1){
  $this->load->model('User_model','um');
  $resp=$this->um->angular_get_data('country_tbl','');
  $data=array(
    'country_name' => $resp,
    'success' => "success"
  );
  $this->load->view('angular',$data);
}else{
  $this->load->model('User_model','um');
  $resp=$this->um->angular_get_data('country_tbl','');
  $data=array(
    'country_name' => $resp,
    'failed' => "failed"
  );
  $this->load->view('angular',$data);
}
}
else{
  $this->load->model('User_model','um');
  $resp=$this->um->angular_get_data('country_tbl','');
  $data=array(
    'country_name' => $resp
  );
  $this->load->view('angular',$data);
}
}
public function angular_get_state(){
  $output=array();
  $data=json_decode(file_get_contents("php://input"));
  $this->load->model('User_model','um');
  $resp = $this->um->angular_get_data('state_tbl',$data);
  foreach($resp->result() as $row){
    $output[]=$row;
}
  $o['states']=$output;
  echo json_encode($o);
}
public function angular_get_distric(){
  $output=array();
  $data=json_decode(file_get_contents("php://input"));
  $this->load->model('User_model','um');
  $resp = $this->um->angular_get_distric('distric_tbl',$data);
  foreach($resp->result() as $row){
    $output[]=$row;
  }
  $o['districs'] = $output;
  echo json_encode($o);
}

public function core(){
  $this->load->view('core');
}
public function form(){
    $this->load->view('form');
}

  public function error()
  {
    $this->load->view('error');
  }
  public function base_url()
  {
    $this->load->helper('url');
    echo base_url();
    echo "<br>";
    echo site_url();
    echo "<br>";
    echo current_url();
  }

public function test_login()
{
$data['title']="Login";
$data['body']="user_login_view";
$this->load->view('template',$data);
}

}
?>
