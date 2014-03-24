<h2><?php print $header?></h2>

<div class="buttons">                
  <a href="<?php print  site_url('auth/admin/members/form')?>">
    <?php print  $this->bep_assets->icon('add');?>
    <?php print $this->lang->line('userlib_create_user')?>
  </a>
</div><br/><br/>

<?php print form_open('auth/admin/members/delete')?>
<script type='text/javascript'>
      google.load('visualization', '1', {packages:['table']});
      google.setOnLoadCallback(drawTable);
      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string','<?php print $this->lang->line('general_id')?>')
        data.addColumn('string', '<?php print $this->lang->line('userlib_username')?>');
        data.addColumn('string', '<?php print $this->lang->line('userlib_email')?>');
        data.addColumn('string', '<?php print $this->lang->line('userlib_group')?>');
        data.addColumn('string', '<?php print $this->lang->line('userlib_last_visit')?>');
        data.addColumn('string', '<?php print $this->lang->line('userlib_avatar')?>');
        data.addColumn('string', '<?php print $this->lang->line('userlib_active')?>');
        data.addColumn('string', '<?php print $this->lang->line('general_edit')?>');
        data.addColumn('string', '<?php print $this->lang->line('general_delete')?>');
        data.addRows([
     <?php
   if(count($members))
   {

        foreach($members->result_array() as $row)
        {
            $row = str_replace('\'','\\\'',$row);
            $delete  = ($row['id'] == $this->session->userdata('id') || $row['id'] == 1) ? '&nbsp;' : form_checkbox('select[]',$row['id'],FALSE);  
            $active =  ($row['active']?'tick':'cross');   
            $myemail = $row['email'];
            $size = 20;
            //anchor(uri segments, text, attributes)
            $editlink = anchor('auth/admin/members/form/'.$row['id'],$this->bep_assets->icon('pencil'));
            $gravatar = str_replace('\'','\\\'',gravatar($myemail, $size));
            echo "['".$row['id']."', '".$row['username']."', '".$row['email']
            ."', '".$row['group']."', '".$row['last_visit']."', '".$gravatar."', '".$this->bep_assets->icon($active)."','".$editlink."','".$delete."'],";
        }
   }
        
    ?>
        ]);
        var table = new google.visualization.Table(document.getElementById('table_div'));
        table.draw(data, {showRowNumber: true, allowHtml:true});
      }
    </script>
 <div id='table_div'> </div>
<?php print form_submit('delete',$this->lang->line('general_delete'),'onClick="return confirm(\''.$this->lang->line('userlib_delete_user_confirm').'\');"')?>
<?php print form_close()?>

<?php
// for debugging
// find if the base_url is localhost
$base=$this->config->item('base_url');
$mystring = $base;
$findme   = 'localhost';
$pos = strpos($mystring, $findme);
if(ENVIRONMENT=='development' OR $pos)
{
    echo "<pre>All session";
    print_r($this->session->all_userdata());
    echo "<br />";
    print_r ($members);
    echo "</pre>";
}


?>

<table class="data_grid" cellspacing="0">
  <thead>
    <tr>
      <th width=5%><?php print $this->lang->line('general_id')?></th>
      <th><?php print $this->lang->line('userlib_username')?></th>
      <th><?php print $this->lang->line('userlib_email')?></th>
      <th><?php print $this->lang->line('userlib_group')?></th>
      <th><?php print $this->lang->line('userlib_last_visit')?></th>
      <th class="middle"><?php print $this->lang->line('userlib_avatar')?></th>
      <th width=5% class="middle"><?php print $this->lang->line('userlib_active')?></th> 
      <th width=5% class="middle"><?php print $this->lang->line('general_edit')?></th>
      <th width=10%><?php print form_checkbox('all','select',FALSE)?><?php print $this->lang->line('general_delete')?></th>        
    </tr>
  </thead>
  <tfoot>
    <tr>
      <td colspan=7>&nbsp;</td>
      <td><?php print form_submit('delete',$this->lang->line('general_delete'),'onClick="return confirm(\''.$this->lang->line('userlib_delete_user_confirm').'\');"')?></td>
    </tr>
  </tfoot>
  <tbody>
  <?php foreach($members->result_array() as $row):
  $delete  = ($row['id'] == $this->session->userdata('id') || $row['id'] == 1) ? '&nbsp;' : form_checkbox('select[]',$row['id'],FALSE);  

  $active =  ($row['active']?'tick':'cross');   
  ?>
  <tr>
    <td><?php print $row['id']?></td>
    <td><?php print $row['username']?></td>
    <td><?php print $row['email']?></td>
    <td><?php print $row['group']?></td>
    <td><?php print $row['last_visit']?></td>
    <td class="middle"><?php  
      $myemail = $row['email'];
      $size = 20;
      echo gravatar($myemail, $size);

      ?></td>
    <td class="middle"><?php print $this->bep_assets->icon($active);?></td>
    <td class="middle"><a href="<?php print site_url('auth/admin/members/form/'.$row['id'])?>"><?php print $this->bep_assets->icon('pencil');?></a></td>
    <td><?php print $delete?></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php print form_close()?>
