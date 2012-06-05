<?php
/**
 * Sharethis helper for CodeIgniter.
 *
 * @subpackage 	helpler
 * @author		Shin Okada
 *
 * @param 	string 	$sharethis_pub_key    Key from sharethis. Find it in your sharethis dashboard.
 * @param	string 	$horver         Horizontal or vertical. Default is vertical
 * @param	string 	$facebook       Facebook button	
 * @return  string	$sharethis	The string containing the HTML code and JS for the sharethis button.
 */

function sharethis()
{   $CI =& get_instance();
    // sharethis public key
    $sharethis_pub_key = $CI->preference->item('sharethis_pub_key');
    // sharethis direction
    $direction = $CI->preference->item('sharethis_direction');
    if($direction=='vertical'){
        $br = '<br />';
    }  else {
        $br ='';
    }
    // sharethis services
    $services = $CI->preference->item('sharethis_services');
    $services_array = explode(',', $services);
    // sharethis size
    $size = $CI->preference->item('sharethis_size');
    if($size=='large'){
        $size = '_large';
    }  else {
        $size ='';
    }
    
    $sharethis ='<div id="sthoverbuttonsMain" class="sthoverbuttonsMain-l">
<div class="sthoverbuttons-label">
<span>Share</span>
</div><div class="sthoverbuttons-chicklets">';
    foreach($services_array as $service){
        $service = trim($service);
        $sharethis .="\n<span  class='st_".$service.$size."' ></span>".$br ;
    }
    $sharethis .= '<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher:\''.$sharethis_pub_key.'\'});</script></div></div>';
	



// new version not working at the moment
/*
$sharethis = '
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>
<script>
var options={ "publisher": "'.$sharethis_pub_key.'", "position": "left", "ad": { "visible": false, "openDelay": 5, "closeDelay": 0}, "chicklets": { "items": ["facebook", "googleplus", "twitter", "linkedin", "email", "sharethis"]}};
var st_hover_widget = new sharethis.widgets.hoverbuttons(options);
</script>';
*/

	return $sharethis;
}


?>
