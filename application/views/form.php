<?php
$options = array(
        'small'         => 'Small Shirt',
        'med'           => 'Medium Shirt',
        'large'         => 'Large Shirt',
        'xlarge'        => 'Extra Large Shirt',
);

echo form_dropdown('shirts',$options, 'large');
?>

<?php
$data = array(
        'name'          => 'newsletter',
        'id'            => 'newsletter',
        'value'         => 'accept',
        'checked'       => TRUE,
        'style'         => 'margin:10px'
);

echo form_checkbox($data);
?>

<?php

$attributes = array(
        'class' => 'mycustomclass',
        'style' => 'color: #000;'
);

echo form_label('What is your Name', 'username', $attributes);
 ?>



 <?php
 $data = array(
         'name'          => 'newsletter',
         'id'            => 'newsletter',
         'value'         => 'accept',
         'checked'       => TRUE,
         'style'         => 'margin:10px'
 );

 echo form_radio($data);
 ?>

 <?php
 $data = array(
         'name'          => 'newsletter',
         'id'            => 'newsletter',
         'value'         => 'accept',
         'checked'       => TRUE,
         'style'         => 'margin:10px'
 );

 echo form_textarea($data);
 ?>

  <?php
  $data = array(
          'name'          => 'newsletter',
          'id'            => 'newsletter',
          'value'         => 'accept',
          'checked'       => TRUE,
          'style'         => 'margin:10px'
  );

  echo form_input($data);
  ?>
