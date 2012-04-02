<h2><?php echo $title;?></h2>
<?php

echo "<table id='template_table' class='tablesorter' border='1' cellspacing='0' cellpadding='3' width='100%'>\n";
echo "<thead>\n<tr valign='top'>\n";
echo "<th>".$this->lang->line('kago_name')."</th>\n<th>".$this->lang->line('kago_default')."</th><th>".$this->lang->line('kago_actions')."</th>\n";
echo "</tr>\n</thead>\n<tbody>\n";

foreach($dir_info as $dir)
{
	$filename=$dir['name'];
	foreach($templates as $template)
	{
		if($filename==$template['name'])
		{
			//print_r($template);
			echo "<tr valign='top'>\n";
			echo "<td>".$template['name']."</td>\n";
			 $active_icon = ($template['default']=='1'?'tick':'cross');
			echo "<td>";
			echo $this->bep_assets->icon($active_icon);
			echo "</td>\n";
			echo "<td align='center'>";
			echo anchor('kaimonokago/admin/delete/emailtemplate/'.$template['id'],$this->lang->line('kago_delete'), array("onclick"=>"return confirmSubmit('".$template['name']."')"));
			echo " | ";
			echo anchor('subscribers/admin/tempdefault/'.$template['id'],$this->lang->line('kago_default'));
			echo "</td>\n";
			echo "</tr>\n";
		}	
	}
}
echo "</tbody>\n</table>";

echo "<h3>We found the following templates. Do you want to register it?</h3>";
echo "<table id='template_table' class='tablesorter' border='1' cellspacing='0' cellpadding='3' width='100%'>\n";
echo "<thead>\n<tr valign='top'>\n";
echo "<th>".$this->lang->line('kago_name')."</th>\n<th>".$this->lang->line('kago_actions')."</th>\n";
echo "</tr>\n</thead>\n<tbody>\n";
/*
foreach($dir_info as $dir)
{
	$filename=$dir['name'];
	foreach($templates as $template)
	{
		if(!$filename===$template['name'])
		{
			//print_r($template);
			echo "<tr valign='top'>\n";
			echo "<td>".$filename."</td>\n";
			echo "</tr>\n";
		}	
	}
}
*/
$outputs = $dir_info;
foreach ( $templates as $template ) 
{
	unset($outputs[$template['name']]);

}
foreach($outputs as $output)
{
	echo "<tr valign='top'>\n";
	echo "<td>";
	print_r($output['name']);
	echo "</td>\n";
	echo "<td>";
	//print_r($output['name']);
	echo anchor($module."/admin/addtemplate/".$output['name'], $this->lang->line('kago_add_temp'));
	echo "</td>\n";
	echo "</tr>\n";
}

//print_r($output);

echo "</tbody>\n</table>";

/*
echo "<br /><pre>templates/in db: ";
print_r($templates);
echo "</pre>";
echo "<br /><pre>dir_info: ";
print_r($dir_info);
echo "</pre>";


echo "<pre>templates: ";
print_r($default_temp);
echo "</pre>";
*/
/*
echo "template_home";

echo "<pre>dir_info: ";
print_r($dir_info);
echo "</pre>";

//$temp=base_url();
$temp="application/modules/subscribers/views";
$dirinfo=get_dir_file_info($temp);
echo "<pre>";
print_r($dirinfo);
echo "</pre>";
*/
?>