<?php
/* modules/products/views/manage/admin_home_cont.php */
// get the module name. We use this in the link. Then it will be used in kaimonokago controller to redirect to the module
$module=$this->uri->segment(1);
//$category_id=$this->uri->segment(4);

if (count($products))
{
	echo form_open("products/admin/batchmode");
        /*
	echo "<p>Category: ". form_dropdown('category_id',$categories);
	echo "&nbsp;";
	$data = array('name'=>'grouping','size'=>'10');
	echo "Grouping: ". form_input($data);
	echo form_submit("submit","batch update");
	echo "</p>";*/
    if(strtolower($category_name)=='patterns')
    {
        $public_display="<th>Public</th>\n";
    }
    else
    {
        $public_display="";
    }
    echo "\n";
	echo '<table id="tablesorter1" class="tablesorter" border="1" cellspacing="0" cellpadding="3" width="100%">';
	echo "\n";
	echo "<thead>\n<tr valign='top'>\n";
	echo "<th>".$this->lang->line('kago_productid')."</th>\n";
    echo "<th>".$this->lang->line('kago_name')."</th>\n";
    //echo "<th>".$this->lang->line('kago_class')."</th>\n"
    echo "<th>Public</th>\n";
    echo "<th>".$this->lang->line('kago_status')."</th>\n";
    //echo "<th>".$this->lang->line('kago_featured')."</th>\n";
    echo "<th>".$this->lang->line('kago_lang')."</th>\n";
    echo "<th>table_id</th>\n";
    echo "<th>".$this->lang->line('kago_actions')."</th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
	foreach ($products as $key => $list)
    {
        // This is ugly, there must be a better way. But for now.
        if (array_key_exists($list['lang_id'], $languages)) 
        {
            $lang_id = $list['lang_id'];
            $lang = $languages[$lang_id];
            if($lang =='none'||$lang ==NULL)
            {
                $lang='English';
            }
        }
        else
        {
            $lang='<a href="'.site_url().'/languages/admin">Activate Language</a>';
        }
        // for multi-languages
        if($this->preference->item('multi_language')==1)
        {
    		echo "<tr ";
            ($list['lang_id']>0)? $class="dentme" : $class = '';
    		echo "class=\"".$class. "\" valign='top'>\n";
            // id
    		echo "<td align='center'>".$list['id']."</td>\n";
            // name
    		echo "<td align='center'>";
            echo anchor('products/manage/edit/'.$list['id'],$list['name']);
            echo "</td>\n";
            //public
            //echo "<td align='center'>".$list['class']."</td>\n";
    		echo "<td align='center'>".$list['public']."</td>\n";
    		//status
    		echo "<td align='center'>";
                     $active_icon = ($list['status']=='active'?'tick':'cross');
    		echo anchor("kaimonokago/admin/changeStatus/$module/".$list['id']."/manage/".$category_id,$this->bep_assets->icon($active_icon), array('class' => $list['status']. ' changestatus'));
    		echo "</td>\n";
    		
    		// echo "<td align='center'>".$list['category_id']."</td>\n";
    		//echo "<td align='center'>".$list['CatName']."</td>\n";
    		//echo "<td align='center'>".$list['featured']."</td>\n";
    		//echo "<td align='center'>".$list['price']."</td>\n";
            /*
            if($list['langname'])
            {
                $langname = ucfirst($list['langname']);
            }
            else
            {
                $langname = 'English';
            }
            */
            //lang
            echo "<td align='center'>$lang</td>\n";
            //echo "<td align='center'>".$list['lang_id']."</td>\n";
            //table_id
            echo "<td align='center'>".$list['table_id']."</td>\n";
            //action
    		echo "<td align='center'>";
    		echo anchor('products/manage/edit/'.$list['id'],$this->bep_assets->icon('pencil'));
            if ($list['status']=='inactive')
            {
    		  //echo " | ";
    		  echo anchor("kaimonokago/admin/delete/$module/".$list['id']."/manage/".$category_id,$this->bep_assets->icon('delete'),array("onclick"=>"return confirmSubmit('".$list['name']."')"));
            }
    		echo "</td>\n";
    		echo "</tr>\n";
             // end of multi-languages       
        }
        else
        {
            // single language so display only lang_id ==0
            if($list['lang_id']==0)
            {        
                echo "<tr ";
                ($list['lang_id']>0)? $class="dentme" : $class = '';
        		echo "class = \"".$class. "\" valign='top'>\n";
                // id
        		echo "<td align='center'>".$list['id']."</td>\n";
                // name
        		echo "<td align='center'>";
                //.$list['name'].
                echo anchor('products/manage/edit/'.$list['id'],$list['name']);
                echo "</td>\n";
                
                //if(strtolower($category_name)=='patterns')
                //{
                    echo "<td>\n";// for public
                    $public_icon = ($list['public']=='1'?'tick':'cross');
                    //echo $this->bep_assets->icon($active_icon);
                    //echo  $this->bep_assets->icon($public_icon);
                    echo anchor("kaimonokago/admin/changeBooleanStatus/$module/".$list['id']."/manage/".$category_id."/public",$this->bep_assets->icon($public_icon), array('class' => $list['public']));
                    echo "</td>\n";
                //}  
                //else
                //{
                    //echo "<td align='center'>".$list['public']."</td>\n";
                //}         
        		//echo "<td align='center'>".$list['class']."</td>\n";
        		//echo "<td align='center'>".$list['grouping']."</td>\n";
        		
        		echo "<td align='center'>";
                         $active_icon = ($list['status']=='active'?'tick':'cross');
        		echo anchor("kaimonokago/admin/changeStatus/$module/".$list['id']."/manage/".$category_id,$this->bep_assets->icon($active_icon), array('class' => $list['status']. ' changestatus'));
        		echo "</td>\n";
        		
        		// echo "<td align='center'>".$list['category_id']."</td>\n";
        		//echo "<td align='center'>".$list['CatName']."</td>\n";
        		//echo "<td align='center'>".$list['featured']."</td>\n";
        		//echo "<td align='center'>".$list['price']."</td>\n";
                /*
                if(isset($list['langname']))
                {
                   $langname = ucfirst($list['langname']);
                }
                else
                {
                    $langname = 'English';
                }
                */
                echo "<td align='center'>$lang</td>\n";
                //echo "<td align='center'>".$list['lang_id']."</td>\n";
                echo "<td align='center'>".$list['table_id']."</td>\n";
        		echo "<td align='center'>";
        		echo anchor('products/manage/edit/'.$list['id'],$this->bep_assets->icon('pencil'));
                if ($list['status']=='inactive')
                {
            		//echo " | ";
            		echo anchor("kaimonokago/admin/delete/$module/".$list['id']."/manage/".$category_id,$this->bep_assets->icon('delete'),array("onclick"=>"return confirmSubmit('".$list['name']."')"));
                }
        		echo "</td>\n";
        		echo "</tr>\n"; 
            }
        }          
	}//end of foreach ($products as $key => $list)
	echo "</tbody></table>";
	echo form_close();
}

?>