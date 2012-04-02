<h2><?php echo $title;?></h2>
<?php echo form_open('subscribers/admin/sendemail'); ?>
<div class="buttons">
	<button type="submit" class="positive" value="submit">
    <?php print $this->bep_assets->icon('email_add');?>
    <?php print $this->lang->line('kago_create_email'); ?>
    </button>

    <a href="<?php print  site_url('subscribers/admin/template_home')?>">
    <?php print $this->bep_assets->icon('user');?>
    <?php print $this->lang->line('kago_template_home'); ?>
    </a>
</div>
<div class="clearboth">&nbsp;</div>

<?php

if (count($emails))
{
	echo "<table id='emailtable' class='tablesorter' border='1' cellspacing='0' cellpadding='3' width='100%'>\n";
	echo "<thead>\n<tr valign='top'>\n";
	echo "<th>Subject</th><th>Message</th><th>".$this->lang->line('kago_actions')."</th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
	foreach ($emails as $key => $list)
	{
		echo "<td>".$list['subject']."</td>\n";
		//echo "<td>Message Details</td>\n";
		echo "<td>";
		echo anchor('subscribers/admin/email_details/'.$list['id'], 'Message Details');
		echo "</td>";
		echo "<td align='center'>";
		echo anchor('kaimonokago/admin/delete/email/'.$list['id'],$this->lang->line('kago_delete'), array("onclick"=>"return confirmSubmit('".$list['subject']."')"));
		echo "</td>\n";
		echo "</tr>\n";
	}
	echo "</tbody>\n</table>";
}
echo form_close();
?>


<?php
// display subject, date
/*
echo "<pre>";
print_r($emails);
echo "</pre>";
*/

?>
