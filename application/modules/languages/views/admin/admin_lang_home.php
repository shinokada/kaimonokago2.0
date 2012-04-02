<?php print displayStatus();?>
<?php
// get the module name. We use this in the link. Then it will be used in kaimonokago controller to redirect to the module
$module=$this->uri->segment(1);
echo "<h2>$title</h2>";
// show session lang, if there is no session lang then it is english
echo "<h3>Default Language</h3>";
echo "<h4>";
// echo the default
echo ucwords($lang);
echo "</h4>";
// list all the languages
echo "<h3>Language List</h3>";

$this->load->view('admin/admin_home_cont');

// Add language 
 // form to create new
echo "<h3>Add Language</h3>";
echo form_open('languages/admin/index/');

echo "\n<table id='preference_form'><tr><td class='label'><label for='langname'>*".$this->lang->line('kago_language_name')."</label></td>\n";
$data = array('name'=>'langname','id'=>'langname','class'=>'text');
echo "<td>";
echo form_input($data);
echo "</td></tr>\n";

echo "<tr><td class='label'><label for='status'>".$this->lang->line('kago_status')."</label></td>\n";
$options = array('active' => 'active', 'inactive' => 'inactive');
echo "<td>";
echo form_dropdown('status',$options);
echo "</td></tr></table>\n";
?>
<div class="buttons">
	<button type="submit" class="positive" name="submit" value="submit">
    <?php print $this->bep_assets->icon('disk');?>
    <?php print $this->lang->line('general_save');?>
    </button>


</div>
<?php
echo form_close();
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