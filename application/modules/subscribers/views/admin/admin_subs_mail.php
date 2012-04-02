<?php echo validation_errors(); ?>
<?php
echo form_open('subscribers/admin/sendemail');

echo "\n<table id='preference_form'>\n<tr>\n<td class='label'>\n<label for='subject'>".$this->lang->line('kago_subject')."</label>\n</td>\n";
echo "<td>\n";
/*
$data = array('name' => 'subject', 'id' => 'subject','class'=>'text', 'value'=>$subject);
echo form_input($data);
*/
echo "<input type=\"text\" name=\"subject\" value=\"". set_value('subject')."\" class='text' />";
echo "\n</td>\n</tr>\n";

echo "<tr>\n<td class='label'>\n<label for='message'>".$this->lang->line('kago_message')."</label>\n</td>\n";
echo "<td id='nopad' >\n";
/*
$data = array('name' => 'message', 'id' => 'message', 'rows' => 20, 'cols' => 50, 'value'=>$msg);
echo form_textarea($data);
*/
echo "<textarea name=\"message\" rows = \"20\", cols =\"100\" >".set_value('message')."</textarea>";
echo "\n</td>\n</tr>\n";
/*
echo "<tr><td>".form_checkbox('test', 'true') . "</td><td><b>".$this->lang->line('kago_test')."</b></td></tr>\n";
*/
echo "<tr>\n";
echo "<td><b>".$this->lang->line('kago_test_email')."</b></td>\n";
echo "\n<td>\n";
/*
$data = array('name' => 'test_email', 'id' => 'test_email', 'value'=>$test_email);
echo form_input($data);
*/
echo "<input type=\"text\" name=\"test_email\" value=\"". set_value('test_email')."\" class='text' />";
echo "\n</td>\n";
echo "</tr>\n";

echo "</table>\n";

?>
<div class="buttons">
	<button type="submit" class="positive" name="submit" value="submit">
    <?php print $this->bep_assets->icon('email');?>
    <?php print $this->lang->line('kago_send');?>
    </button>

    <a href="<?php print site_url($cancel_link);?>" class="negative">
    <?php print $this->bep_assets->icon('cross');?>
    <?php print $this->lang->line('general_cancel');?>
    </a>
</div>

<script type="text/javascript">
		$(function () { // this line makes sure this code runs on page load
	$('.checkall').click(function () {
		$('#subtable').find(':checkbox').attr('checked', this.checked);
	});
});
		</script>
		
<?php


if (count($subscribers))
{
	echo "<table id='subtable' class='tablesorter' border='1' cellspacing='0' cellpadding='3' width='100%'>\n";
	echo "<thead>\n<tr valign='top'>\n";
	echo "<th>".$this->lang->line('kago_id')."</th>\n<th>".$this->lang->line('kago_name').
            "</th><th>".$this->lang->line('kago_email')."</th><th>".$this->lang->line('kago_actions')."</th><th>Select</th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
	echo "<tr><td></td><td></td><td></td><td></td><td>";
	echo "<input type=\"checkbox\" class=\"checkall\">";
	echo "Select All</td></t>";
	foreach ($subscribers as $key => $list)
	{
		echo "<tr valign='top'>\n";
		echo "<td align='center'>".$list['id']."</td>\n";
		echo "<td>".$list['name']."</td>\n";
		echo "<td>".$list['email']."</td>\n";
		echo "<td align='center'>";
		echo anchor('kaimonokago/admin/delete/subscribers/'.$list['id'],$this->lang->line('kago_unsubscribe'), array("onclick"=>"return confirmSubmit('".$list['name']."')"));
		echo "</td>\n";
		echo "<td>";
		echo form_checkbox('sendto[]',$list['id']."_".$list['email']);
		echo "</td>";
		echo "</tr>\n";
	}
	echo "</tbody>\n</table>";
}






//echo form_submit('submit',$this->lang->line('kago_sendemail'));
echo form_close();

echo "<pre>sub: ";
//print_r ($sub);
echo "</pre>";
?>
