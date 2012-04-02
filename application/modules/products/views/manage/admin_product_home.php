<h2><?php echo $title;?></h2>
<div class="buttons">
	<a href="<?php
        //$category_id=$this->uri->segment(4);
        print  site_url('products/manage/create/'.$category_id)?>">
    <?php print $this->bep_assets->icon('add');?>
    <?php print $this->lang->line('kago_create_product'); ?>
    </a>
</div>
<div class="clearboth">&nbsp;</div>

<?php
$this->load->view('manage/admin_home_cont');
/*
echo "<pre>classname: ";
print_r ($classname);
echo "</pre>";

echo "<pre>products";
print_r ($products);
echo "</pre>";

echo "<pre>products";
print_r ($category_name);
echo "</pre>";
*/
?>


<script type="text/javascript">
$(document).ready(function(){

    var tablecont = $("#tablesorter1");
    var module = "<?php echo $module ; ?>";
    var category_id = "<?php echo $category_id ; ?>";

    function updateitem()
    {    
        $.ajax({
            type: "POST", 
            url: "<?php echo site_url($module.'/manage/Ajaxgetupdate'); ?>"+"/"+category_id, 
            complete: function(data)
            {
                tablecont.html(data.responseText);
            }
        });
    }

        //on submit event
    $(".changestatus").live('click', function(event){
        event.preventDefault();
        var href = $(this).attr("href");
        var id =href.substring(href.lastIndexOf("/") + 1);

        $.ajax({
            type: "POST", 
            // url is in the form of kaimonokago/admin/changeStatus/$module/".$list['id']."/manage/".$category_id
            //url: "<?php echo site_url('kaimonokago/admin/changeStatus'); ?>"+"/"+module+"/"+id,
            url: href,
            complete: function()
            {
                updateitem();
            }
        });  
    });
});
</script>