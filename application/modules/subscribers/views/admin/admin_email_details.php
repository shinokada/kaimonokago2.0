<h2><?php echo $title;?></h2>
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

if (count($emaildetails))
{
	echo "<table id='emailtable' class='tablesorter' border='1' cellspacing='0' cellpadding='3' width='800'>\n";
	echo "<tr valign='top'>\n";
	echo "<td>Subject</td>\n";
	echo "<td>".$emaildetails['subject']."</td>\n";
	echo "</tr>\n";
	echo "<tr valign='top'>\n";
	echo "<td>Date</td>\n";
	$emaildate=strtotime($emaildetails['date']);
	$date=date("F j, Y, g:i a", $emaildate);
	echo "<td>".$date."</td>\n";
	echo "</tr>\n";
	echo "<tr valign='top'>\n";
	echo "<td>Message</td>\n";
	echo "<td>".$emaildetails['msg']."</td>\n";
	echo "</tr>\n";
	echo "<tr valign='top'>\n";
	echo "<td>Message 2</td>\n";
	echo "<td>".$emaildetails['msg2']."</td>\n";
	echo "</tr>\n";
	echo "<tr valign='top'>\n";
	echo "<td>Message 3</td>\n";
	echo "<td>".$emaildetails['msg3']."</td>\n";
	echo "</tr>\n";
	echo "<tr valign='top'>\n";
	echo "<td>Message 4</td>\n";
	echo "<td>".$emaildetails['msg4']."</td>\n";
	echo "</tr>\n";
	echo "<tr valign='top'>\n";
	echo "<td>Send to</td>\n";
	echo "<td>".$emaildetails['sendto']."</td>\n";
	echo "</tr>\n";
	echo "</table>\n";
}

?>


<?php
echo "<pre>";
print_r($emaildetails);
echo "</pre>";
?>
