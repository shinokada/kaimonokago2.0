<h2><?php echo $title;?></h2>
<div class="buttons">
	<a href="<?php print  site_url('slideshow/admin/create')?>">
    <?php print $this->bep_assets->icon('add');?>
    <?php print $this->lang->line('kago_add_newslide'); ?>
    </a>
</div>
<div class="clearboth">&nbsp;</div>

<?php
// get the module name. We use this in the link. Then it will be used in kaimonokago controller to redirect to the module
$module=$this->uri->segment(1);

if (count($slideshow)){
	
	echo '<table id="tablesorter_product1" class="tablesorter" border="1" cellspacing="0" cellpadding="3" width="100%">';
	echo "<thead>\n<tr valign='top'>\n";
	echo "<th>".$this->lang->line('kago_id')."</th>\n<th>".$this->lang->line('kago_name')."</th><th>Image</th><th>Image Size</th><th>".$this->lang->line('kago_order').
            "</th><th>".$this->lang->line('kago_status')."</th><th>".$this->lang->line('kago_actions')."</th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
	foreach ($slideshow as $key => $list){
		echo "<tr valign='top'>\n";
        //echo "<td align='center'>".form_checkbox('p_id[]',$list['id'],FALSE)."</td>";
		echo "<td align='center'>".$list['id']."</td>\n";
		echo "<td align='center'>";
        //.$list['name'].
        echo anchor('slideshow/admin/edit/'.$list['id'],$list['name']);
        echo "</td>\n";
        $subject = $list['image'];
        $imagename = getImageName($subject);
        $imagepath = getImagePath($subject);
        //$filepath = base_url()."assets/images/frontpage/".$list['name'];
        $filepath = base_url().$imagepath;
	//$imagepath = "assets/images/frontpage/".$list['name'];
        echo "<td class='tableimg'><img width=\"70px\" src='".$filepath."' /></td>";
        echo "<td>";
                $filesize = getimagesize($imagepath);
               // print_r ($filesize);
		echo "width: ".$filesize[0]. "px<br />";
		echo "height: ".$filesize[1]. "px<br />";
                
                echo "</td>";
        echo "<td align='center'>".$list['slide_order']."</td>\n";
		echo "<td align='center'>";
                $active_icon = ($list['status']=='active'?'tick':'cross');
		echo anchor("kaimonokago/admin/changeStatus/$module/".$list['id'],$this->bep_assets->icon($active_icon), array('class' => $list['status']));
		echo "</td>\n";
		echo "<td align='center'>";
		echo anchor('slideshow/admin/edit/'.$list['id'],$this->bep_assets->icon('pencil'));
        if ($list['status']=='inactive'){
		//echo " | ";
		echo anchor("kaimonokago/admin/delete/$module/".$list['id'],$this->bep_assets->icon('delete'),array("onclick"=>"return confirmSubmit('".$list['name']."')"));
        }
		echo "</td>\n";
		echo "</tr>\n";
	}
	echo "</tbody></table>";
	echo form_close();
}
?>

<div class="buttons clearboth">
	<a href="<?php print  site_url('slideshow/admin/updatecu3erxml')?>">
    <?php print $this->bep_assets->icon('add');?>
    <?php print "Create CU3ER file"; ?>
    </a>
</div>
<?php
/*
echo "<pre>test";
print_r ($test);
echo "</pre>";
foreach($test as $key =>$image){
    echo $image['name'];
}
echo "<pre>slideshow";
print_r ($slideshow);
echo "</pre>";
*/
?>