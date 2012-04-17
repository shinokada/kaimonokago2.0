// menu www.kriesi.at/archives/create-a-multilevel-dropdown-menu-with-css-and-improve-it-via-jquery
/*
function mainmenu(){
$(" #nav ul ").css({display: "none"}); // Opera Fix
$(" #nav li").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(400);
		},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
		});
}

mainmenu();
*/
// take out class from body if javascript is on    
var el = document.getElementsByTagName("body")[0];  
el.className = "";  

// for html 5 dropdown menu
// http://net.tutsplus.com/tutorials/html-css-techniques/how-to-create-a-drop-down-nav-menu-with-html5-css3-and-jquery/

(function($){  

    //cache nav  
    var nav = $("#topNav");  

    //add indicators and hovers to submenu parents  
    nav.find("li").each(function() {  
        if ($(this).find("ul").length > 0) 
        {  

            $("<span>").text("^").appendTo($(this).children(":first"));  

            //show subnav on hover  
            $(this).mouseenter(function() {  
                $(this).find("ul").stop(true, true).slideDown();  
            });  

            //hide submenus on exit  
            $(this).mouseleave(function() {  
                $(this).find("ul").stop(true, true).slideUp();  
            });  
        }  
    });  
})(jQuery); 

