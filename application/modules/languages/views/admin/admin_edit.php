<div id="pageleftcont">
<h2><?php echo $title;?></h2>
<div id="create_edit">
<?php

echo form_open($module.'/admin/edit');

echo "<p><label for='langname'>".$this->lang->line('kago_name')."</label><br/>";
$data = array('name'=>'langname','id'=>'langname','size'=>25,'value' => ucfirst($info['langname']));
echo form_input($data) ."</p>\n";

echo "<p><label for='short_lang'>Short language</label><br/>";
$shortlang= array('name'=>'short_lang','id'=>'short_lang','size'=>25,'value' => $info['short_lang']);
echo form_input($shortlang) ."</p>\n";

echo "<p><label for='status'>".$this->lang->line('kago_status')."</label><br/>";
$options = array('active' => 'active', 'inactive' => 'inactive');
echo form_dropdown('status',$options, $info['status']) ."</p>";


echo form_hidden('id',$info['id']);
echo form_submit('submit',$this->lang->line('kago_update'));
echo form_close();



?>
</div>
 </div>

<?php
$base=$this->config->item('base_url');
$mystring = $base;
$findme   = 'localhost';
$pos = strpos($mystring, $findme);
if(ENVIRONMENT=='development' OR $pos)
{
  echo "<pre>";
  print_r ($info); 
  
  echo "</pre>";
}


?>
