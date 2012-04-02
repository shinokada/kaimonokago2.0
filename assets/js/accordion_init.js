$(document).ready(function(){
	$("#accordion").accordion();
		$(".status").click(function () {
      $(this).toggleClass("inactive");
    });
});



