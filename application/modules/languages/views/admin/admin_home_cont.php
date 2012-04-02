<?php /* modules/languages/view/admin/admin_home_cont.php   */

if (is_array($langs))
{
    echo "<table id='tablesorter1' class='langtable' border='1' cellspacing='0' cellpadding='3' width='100%'>\n";
    echo "<thead>\n<tr valign='top'>\n";
    echo "<th>ID</th>\n<th>Name</th><th>Status</th><th>Actions</th>\n";
    echo "</tr>\n</thead>\n<tbody>\n";
    foreach ($langs as $key => $list)
    {
        echo "<tr valign='top'>\n";
        echo "<td align='center'>".$list['id']."</td>\n";
        echo "<td>".ucwords($list['langname'])."</td>\n";
        echo "<td align='center'>";
        // don't forget to add $module=$this->uri->segment(1); at the top of this page
        $active_icon = ($list['status']=='active'?'tick':'cross');
		echo anchor("kaimonokago/admin/changeStatus/$module/".$list['id'],$this->bep_assets->icon($active_icon), array('class' => $list['status']. ' changestatus'));
		echo "</td>\n";
        echo "<td align='center'>";
        echo anchor('languages/admin/edit/'.$list['id'],$this->bep_assets->icon('pencil'));
        if ($list['status']=='inactive')
        { 
            //echo " | ";
            echo anchor("kaimonokago/admin/delete/$module/". $list["id"],$this->bep_assets->icon('delete'), array("onclick"=>"return confirmSubmit('".$list['langname']."')"));
         }
        echo "</td>\n";
        echo "</tr>\n";
    }
    echo "</tbody>\n</table>";
}  
else 
{
    echo "<br /><h3>\n";
    echo $langs;
    echo "</h3>\n";
}
?>