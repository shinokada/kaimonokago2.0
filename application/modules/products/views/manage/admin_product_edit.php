<h2><?php echo $title;?></h2>
<?php

if($product['lang_id']=='0' AND $multilang){
    echo showtranslang($languages,$translanguages,$product, $classname);
}

echo form_open_multipart('products/manage/edit/'.$product['id']);

echo "\n<table id='preference_form'>\n";
/*
echo "<tr>\n<td class='label'>\n<label for='category'>".$this->lang->line('kago_category')."</label></td>\n";
echo "<td>\n";
echo form_dropdown('category_id',$categories,$product['category_id']);
echo "\n</td></tr>\n";
*/
echo "<tr>\n<td class='label'>\n<label for='pname'>".$this->lang->line('kago_name')."</label>\n</td>\n";
$data = array('name'=>'name','id'=>'pname','class'=>'text', 'value' => $product['name']);
echo "<td>\n";
echo form_input($data);
echo "\n</td>\n</tr>\n";

echo "<tr>\n<td class='label'>\n<label for='public'>Public</label>\n</td>\n";
echo "<td>\n";

//$public_status = ($product['public']=='1'?'TRUE':'FALSE');
echo "Yes";
echo form_radio('public','1',$product['public']=='1'?'checked':'');
//echo form_radio('public','1');
echo "No";
echo form_radio('public','0',$product['public']=='0'?'checked':'');
//echo form_radio('public','0');

echo "\n</td>\n</tr>\n";

echo "<tr>\n<td class='label'>\n<label for='short'>".$this->lang->line('kago_short_desc')."</label>\n</td>\n";
$data = array('name'=>'shortdesc','id'=>'short','class'=>'text', 'value' => $product['shortdesc']);
echo "<td>\n";
echo form_input($data);
echo "\n</td>\n</tr>\n";

echo "<tr>\n<td class='label'>\n<label for='long'>".$this->lang->line('kago_long_desc')."</label>\n</td>\n";
$data = array('name'=>'longdesc','id'=>'long','rows'=>'10', 'cols'=>'80', 'value' => $product['longdesc']);
echo "<td id='nopad' >";
echo form_textarea($data);

?>
<a href="javascript:toggleEditor('long');"><?php echo $this->lang->line('kago_add_remove') ;?></a><br /><br />
<?php
echo "\n</td>\n</tr>\n";

echo "<tr>\n<td class='label'>\n<label for='uimage'>".$this->lang->line('kago_select_img')."</label>\n</td>\n";
$data = array('name'=>'image','id'=>'uimage','rows'=>'10', 'cols'=>'80', 'value' => $product['image']);
echo "<td id='nopad' >";
echo form_textarea($data);
echo "\n</td>\n</tr>\n";

echo "<tr>\n<td class='label'>\n<label for='uthumb'>".$this->lang->line('kago_select_thumb')."</label>\n</td>\n";
$data = array('name'=>'thumbnail','id'=>'uthumb','rows'=>'10', 'cols'=>'80', 'value' => $product['thumbnail']);
echo "<td id='nopad' >";
echo form_textarea($data);
echo "\n</td>\n</tr>\n";

echo "<tr><td class='label'><label for='weblink'>".$this->lang->line('kago_weblink')."</label></td>\n";
$data = array('name'=>'weblink','id'=>'weblink','value' => $product['weblink'],'class'=>'text');
echo "<td>";
echo form_input($data);
echo "</td></tr>\n";

echo "<tr>\n<td class='label'>\n<label for='status'>".$this->lang->line('kago_status')."</label>\n</td>\n";
$options = array('active' => 'active', 'inactive' => 'inactive');
echo "<td>\n";
echo form_dropdown('status',$options, $product['status']);
echo "\n</td>\n</tr>\n";

echo "<tr>\n<td class='label'>\n<label for='product_order'>".$this->lang->line('kago_order')."</label>\n</td>\n";
$data = array('name'=>'product_order','id'=>'product_order','class'=>'text', 'value' => $product['product_order']);
echo "<td>\n";
echo form_input($data);
echo "\n</td>\n</tr>\n";

echo "<tr>\n<td class='label'>\n<label for='class'>".$this->lang->line('kago_class')."</label>\n</td>\n";
$data = array('name'=>'class','id'=>'class','class'=>'text', 'value' => $product['class']);
echo "<td>\n";
echo form_input($data);
echo "\n</td>\n</tr>\n";

echo "<tr>\n<td class='label'>\n<label for='group'>".$this->lang->line('kago_grouping')."</label>\n</td>\n";
$data = array('name'=>'grouping','id'=>'group','class'=>'text', 'value' => $product['grouping']);
echo "<td>\n";
echo form_input($data);
echo "\n</td>\n</tr>\n";

echo "<tr>\n<td class='label'>\n<label for='price'>".$this->lang->line('kago_price')."</label>\n</td>\n";
$data = array('name'=>'price','id'=>'price','class'=>'text', 'value' => $product['price']);
echo "<td>\n";
echo form_input($data);
echo "\n</td>\n</tr>\n";


echo "<tr>\n<td class='label'>\n<label for='featured'>".$this->lang->line('kago_featured')."</label>\n</td>\n";
$options = array('none' => 'none',  'quicksand' => 'Quicksand');// add more as you wish 'front' => 'Main frontpage'
echo "<td>\n";
echo form_dropdown('featured',$options, $product['featured']);
echo "\n</td>\n</tr>\n";

echo "<tr>\n<td class='label'>\n<label for='other_feature'>".$this->lang->line('kago_other_feature')."</label>\n</td>\n";
$options = array('none' => 'none', 'most sold' => 'Most sold', 'new product' => 'New Product');
echo "<td>\n";
echo form_dropdown('other_feature',$options, $product['other_feature']);
echo "\n</td>\n</tr>\n</table>\n";

echo form_hidden('category_id',$product['category_id']);
//echo form_hidden('public',$product['public']);
echo form_hidden('lang_id',$product['lang_id']);
echo form_hidden('table_id',$product['table_id']);
echo form_hidden('id',$product['id']);

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
//echo form_submit('submit',$this->lang->line('kago_update'));
echo form_close();

?>
<?php 
/*
echo "<pre>module: ";
print_r($module);
echo "</pre>";

echo "<pre>classname: ";
print_r($classname);
echo "</pre>";

echo "<pre>languages";
print_r($languages);
echo "</pre>";

echo "<pre>translanguages";
print_r($translanguages);
echo "</pre>";

echo "<pre>product";
print_r($product);
echo "</pre>";

echo "<pre>categories";
print_r($categories);
echo "</pre>";
*/
?>

   