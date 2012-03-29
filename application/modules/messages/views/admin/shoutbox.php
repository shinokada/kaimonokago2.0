<?php
/*
echo "<pre>todos";
print_r ($todos);
echo "</pre>";
*/
if(is_array($todos))
{
	foreach($todos as $key => $todo)
	{
		//	 echo "\n<li class=\"delete\" >".$message['message']."</li>";
		echo "\n<li class=\"".$todo['id']."\">\n<div class=\"listbox\"><span class=\"user\"><strong>".$todo['user']."</strong></span>\n\n<span class=\"date\" >" .$todo['date']."</span>\n";
		echo anchor ($module.'/admin/changestatus/'.$todo['id'],$todo['status'],array('class'=>'todo'));
		echo "<span class=\"msg\">".$todo['message'].
		"</span></div></li>";
	}
}
else
{
	echo "No list. Let's add new one.";
}	
?>
