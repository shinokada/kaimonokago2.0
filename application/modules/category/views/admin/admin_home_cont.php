<?php /* modules/category/views/admin/admin_home_cont.php   */
if (count($categories))
{
    echo "<table id='tablesorter1' class='tablesorter' border='1' cellspacing='0' cellpadding='3' width='100%'>\n";
    echo "<thead>\n<tr valign='top'>\n";
    echo "<th>".$this->lang->line('kago_id')."</th>\n<th>".$this->lang->line('kago_name').
        "</th><th>".$this->lang->line('kago_status')."</th><th>".$this->lang->line('kago_order').
        "</th><th>".$this->lang->line('kago_parentid').
        "</th><th>".$this->lang->line('kago_lang_id')."</th><th>".$this->lang->line('kago_table_id').
        "</th><th>".$this->lang->line('kago_actions')."</th>\n";
    echo "</tr>\n</thead>\n<tbody>\n";
    foreach ($categories as $key => $list)
    {
        if($this->preference->item('multi_language')==1)
        {
            echo "<tr ";
            ($list['lang_id']>0)? $class="dentme" : $class = '';
            echo "class = \"".$class. "\" valign='top'>\n";
            echo "<td>".$list['id']."</td>\n";
            echo "<td>";
            //.$list['name'].
            echo anchor($module.'/admin/edit/'.$list['id'],$list['name']);
            echo "</td>\n";
            echo "<td align='center'>";
            $active_icon = ($list['status']=='active'?'tick':'cross');
            echo anchor("kaimonokago/admin/changeStatus/category/".$list['id'],$this->bep_assets->icon($active_icon), array('class' => $list['status']. ' changestatus'));
            echo "</td>\n";
            echo "<td align='center'>".$list['order']."</td>\n";
            echo "<td align='center'>".$list['parentid']."</td>\n";
            echo "<td align='center'>".$list['lang_id']."</td>\n";
            echo "<td align='center'>".$list['table_id']."</td>\n";
            echo "<td align='center'>";
            echo anchor($module.'/admin/edit/'.$list['id'],$this->bep_assets->icon('pencil'));
            if ($list['status']=='inactive')
            {
                //echo " | ";
                echo anchor($module.'/admin/delete/'.$list['id'],$this->bep_assets->icon('delete'), array('class' => 'delete_link',"onclick"=>"return confirmSubmit('".$list['name']."')"));
            }
            echo "</td>\n";
            echo "</tr>\n";
        }
        else
        {
            // single language so display only lang_id ==0
            if($list['lang_id']==0)
            {
                echo "<tr ";
                ($list['lang_id']>0)? $class="dentme" : $class = '';
                echo "class = \"".$class. "\" valign='top'>\n";
                echo "<td>".$list['id']."</td>\n";
                echo "<td>";
                //.$list['name'].
                echo anchor($module.'/admin/edit/'.$list['id'],$list['name']);
                echo "</td>\n";
                echo "<td align='center'>";
                $active_icon = ($list['status']=='active'?'tick':'cross');
                echo anchor("kaimonokago/admin/changeStatus/category/".$list['id'],$this->bep_assets->icon($active_icon), array('class' => $list['status']. ' changestatus'));
                echo "</td>\n";
                echo "<td align='center'>".$list['order']."</td>\n";
                echo "<td align='center'>".$list['parentid']."</td>\n";
                echo "<td align='center'>".$list['lang_id']."</td>\n";
                echo "<td align='center'>".$list['table_id']."</td>\n";
                echo "<td align='center'>";
                echo anchor($module.'/admin/edit/'.$list['id'],$this->bep_assets->icon('pencil'));
                if ($list['status']=='inactive')
                {
                    //echo " | ";
                    echo anchor($module.'/admin/delete/'.$list['id'],$this->bep_assets->icon('delete'), array('class' => 'delete_link',"onclick"=>"return confirmSubmit('".$list['name']."')"));
                }
                echo "</td>\n";
                echo "</tr>\n";
            }
        }       
    }
    echo "</tbody>\n</table>";
}