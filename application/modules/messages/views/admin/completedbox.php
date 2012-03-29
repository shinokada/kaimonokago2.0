<?php
/*
echo "<pre>todos";
print_r ($completed);
echo "</pre>";
*/
if(is_array($completed))
{
	foreach ($completed as $key => $list)
	{
		echo "\n<li class=\"".$list['id']."\">\n<span class=\"user\"><strong>".$list['user']."</strong></span>\n<span class=\"date\" >" .$list['date']."</span>\n";
		echo anchor ($module.'/admin/changestatus/'.$list['id'],$list['status'],array('class'=>'completedmsg'));
		echo	 "\n<a href=\"admin/delete/"
		 .$list['id']."\" id=\"".$list['id']."\" class=\"delete\">x</a><span class=\"msg\">".$list['message'].
		"</span>\n</li>";
	}
}
else
{
	echo "No completed list.";
}	
?>