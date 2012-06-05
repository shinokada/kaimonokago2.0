<?php print displayStatus();?>
<h2><?php echo $title;?></h2>
    <?php
if($pagecontent['lang_id']==0 AND $multilang)
{
    //echo "Current config language is : ".$this->configlang;
    echo showtranslang($languages,$translanguages,$pagecontent, $module);
}

echo form_open('pages/admin/edit');
echo "\n<table id='preference_form'><tr><td class='label'><label for='menuname'>".$this->lang->line('kago_name')."</label>\n";
if(!$pagecontent['lang_id']==0)
{
    echo $this->lang->line('kago_original').$original['name'];
}
echo "</td>";
$data = array('name'=>'name','id'=>'pname', 'value' => $pagecontent['name'],'class'=>'text');
echo "<td>";
echo form_input($data);
echo "</td></tr>\n";

echo "<tr><td class='label'><label for='metakeyword'>".$this->lang->line('kago_meta_keyword')."</label>\n";
if(!$pagecontent['lang_id']==0)
{
    echo $this->lang->line('kago_original').$original['metakeyword'];
}
echo "</td>";
$data = array('name'=>'metakeyword','id'=>'metakeyword', 'value' => $pagecontent['metakeyword'],'class'=>'text');
echo "<td>";
echo form_input($data);
echo "</td></tr>\n";

echo "<tr><td class='label'><label for='metadesc'>".$this->lang->line('kago_meta_desc')."</label>\n";
if(!$pagecontent['lang_id']==0)
{
    echo $this->lang->line('kago_original').$original['metadesc'];
}
echo "</td>";
$data = array('name'=>'metadesc','id'=>'metadesc', 'value' => $pagecontent['metadesc'],'class'=>'text');
echo "<td>";
echo form_input($data);
echo "</td></tr>\n";

//if($pagecontent['lang_id']==0){
echo "<tr><td class='label'><label for='fpath'>".$this->lang->line('kago_path_furl')."</label>\n";
echo "</td>";
$data = array('name'=>'path','id'=>'fpath', 'value' => $pagecontent['path'],'class'=>'text');
echo "<td>";
echo form_input($data);
echo "</td></tr>\n";

/*
}else{
    echo "<td><h3>".$this->lang->line('kago_path_furl'). $pagecontent['path']."</h3></td>";
    echo form_hidden('path', $pagecontent['path']);
}
*/
echo "<tr><td class='label'><label for='long'>".$this->lang->line('kago_content')."</label>\n";
if(!$pagecontent['lang_id']==0)
{
    echo $this->lang->line('kago_original').$original['content'];
}
echo "</td>";
$data = array('name'=>'content','id'=>'long','class'=>'mceimage','rows'=>'30', 'cols'=>'80', 'value' => $pagecontent['content']);
echo "<td id='nopad' >";
echo form_textarea($data);
?>
    <br /><a href="javascript:toggleEditor('long');"><?php echo $this->lang->line('kago_add_remove') ;?></a>
<?php
echo "</td></tr>\n";

echo "<tr><td class='label'><label for='status'>".$this->lang->line('kago_status')."</label></td>\n";
$options = array('active' => 'active', 'inactive' => 'inactive');
echo "<td>";
echo form_dropdown('status',$options,$pagecontent['status']);
echo "</td></tr>\n</table>\n";

echo form_hidden('lang_id', $pagecontent['lang_id']);
echo form_hidden('id',$pagecontent['id']);

?>
<div class="buttons">
	<button type="submit" class="positive" name="submit" value="submit">
    <?php print $this->bep_assets->icon('disk');?>
    <?php print $this->lang->line('general_save');?>
    </button>

    <a href="<?php print site_url($cancel_link);?>" class="negative">
    <?php print $this->bep_assets->icon('cross');?>
    <?php print $this->lang->line('general_cancel');?>
    </a>
</div>
<?php
//echo form_submit('submit',$this->lang->line('kago_create_menu'));
echo form_close();

/*
echo "<pre>pagecontent lang_id";
print_r($pagecontent['lang_id']);
echo "</pre>";

echo "<pre>pagecontent";
print_r($pagecontent);
echo "</pre>";

echo "<pre>original";
print_r($original);
echo "</pre>";
*/
?>
