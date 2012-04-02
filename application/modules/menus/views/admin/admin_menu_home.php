<?php /* Location: ./modules/menus/views/admin/admin_menu_home.php */ ?>
<h2><?php echo $title;?></h2>
<div class="buttons">
	<a href="<?php print  site_url('menus/admin/create')?>">
    <?php print $this->bep_assets->icon('add');?>
    <?php print $this->lang->line('kago_create_menu'); ?>
    </a>
</div>
<div class="clearboth">&nbsp;</div>
<?php
    echo '<h2>Menus</h2>';
    $this->load->view('admin/admin_home_cont');
?>

<script type="text/javascript">
$(document).ready(function(){

    var tablecont = $("#tablesorter1");
    var module = "<?php echo $module ; ?>";

    function updateitem()
    {    
        $.ajax({
            type: "POST", 
            url: "<?php echo site_url($module.'/admin/Ajaxgetupdate'); ?>", 
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
        //var table = $("#tablesorter1").clone();
        $.ajax({
            type: "POST", 
            url: "<?php echo site_url('kaimonokago/admin/changeStatus'); ?>"+"/"+module+"/"+id,
            complete: function()
            {
                updateitem();
            }
        });  
    });
});
</script>
<?php /* Location: ./modules/menus/views/admin/admin_menu_home.php */ ?>