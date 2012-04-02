<h2><?php echo $title;?></h2>
<?php echo form_open('subscribers/admin/sendemail'); ?>
<div class="buttons">
    <a href="<?php print  site_url('subscribers/admin/create_sub_home')?>">
    <?php print $this->bep_assets->icon('user');?>
    <?php print $this->lang->line('kago_create_subscriber'); ?>
    </a>

    <a href="<?php print  site_url('subscribers/admin/email_home')?>">
    <?php print $this->bep_assets->icon('user');?>
    <?php print $this->lang->line('kago_email_home'); ?>
    </a>
</div>
<div class="clearboth">&nbsp;</div>

<?php

if (count($subscribers))
{
	echo "<table id='tablesorter' class='tablesorter' border='1' cellspacing='0' cellpadding='3' width='100%'>\n";
	echo "<thead>\n<tr valign='top'>\n";
	echo "<th>".$this->lang->line('kago_id')."</th>\n<th>".$this->lang->line('kago_name').
            "</th><th>".$this->lang->line('kago_email')."</th><th>".$this->lang->line('kago_actions')."</th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
	foreach ($subscribers as $key => $list)
	{
		echo "<tr valign='top'>\n";
		echo "<td align='center'>".$list['id']."</td>\n";
		echo "<td>".$list['name']."</td>\n";
		echo "<td>".$list['email']."</td>\n";
		echo "<td align='center'>";
		echo anchor('kaimonokago/admin/delete/subscribers/'.$list['id'],$this->lang->line('kago_unsubscribe'), array("onclick"=>"return confirmSubmit('".$list['name']."')"));
		echo "</td>\n";
		echo "</tr>\n";
	}
	echo "</tbody>\n</table>";
}
echo form_close();
?>


