$(document).ready(function(){
	//configure the date format to match mysql date
	$('#date, #date_created, #date_completed').datepick({dateFormat: 'yy-mm-dd'});
});