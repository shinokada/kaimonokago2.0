
<?php /* http://www.emailology.org/ */?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $title; ?></title>
	<style type="text/css">
			
		.ExternalClass {width:100%;} 
		.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
			line-height: 100%;} 
		
		body {-webkit-text-size-adjust:none; -ms-text-size-adjust:none;} 
		body {margin:0; padding:0;} 
		table td {border-collapse:collapse;}	

		p {margin:0; padding:0; margin-bottom:0;}		
		
		h1, h2, h3, h4, h5, h6 {
		   color: black; 
		   line-height: 100%; 
		   }  

		a, a:link {
		   color:#2A5DB0;
		   text-decoration: underline;
		   }  	   

		body, #body_style {
		   background:#fff;
		   min-height:1000px;
		   color:#000;
		   font-family:Arial, Helvetica, sans-serif;
		   font-size:12px;
		   } 
		   
		span.yshortcuts { color:#000; background-color:none; border:none;}
		span.yshortcuts:hover,
		span.yshortcuts:active,
		span.yshortcuts:focus {color:#000; background-color:none; border:none;}
	
		a:visited { color: #3c96e2; text-decoration: none} 
		a:focus   { color: #3c96e2; text-decoration: underline}  
		a:hover   { color: #3c96e2; text-decoration: underline}  

		@media only screen and (max-device-width: 480px) {

		}		
		
		@media only screen and (min-device-width: 768px) and (max-device-width: 1024px)  {			

		}			   

       </style>    
    
</head>
<body style="background:#fff; min-height:1000px; color:#fff;font-family:Arial, Helvetica, sans-serif; font-size:12px" 
alink="#FF0000" link="#FF0000" bgcolor="#ffffff" text="#FFFFFF" yahoo="fix"> 

    <div id="body_style" style="padding:15px"> 

        <table cellpadding="0" cellspacing="0" border="0" bgcolor="#000000" width="600" align="center">
            <tr>
                <td width="200"><?php if(isset($content1){echo $content1 ;} ?></td>
                <td width="200"><?php if(isset($content2){echo $content2 ;} ?></td>
                <td width="200"><?php if(isset($content3){echo $content3 ;} ?></td>
            </tr>
        </table> 

        <p style="margin-top:0"></p>

<!--
		<table cellpadding="2" cellspacing="2" border="0"> 
            <tr>
                <td valign="top">&bull;</td>
                <td>Test</td>
            </tr>
            <tr>
                <td valign="top">1.)</td>
                <td>Test</td>
            </tr>
        </table>  

        <table cellpadding="0" cellspacing="0" border="0"> 
            <tr>
                <td valign="top" background="http://www.emailonacid.com/images/EOA_logo.gif" bgcolor="#006600">&nbsp;</td>
            </tr>
        </table>  

        <a href="http://www.emailonacid.com/email-preview/online_demo/C7" target="_blank">
        	<img src="http://www.emailonacid.com/images/widget_demo.jpg" alt="Online Demo" title="Online Demo" width="308" 
            height="106" style="display:block;" border="0" />
        </a>
        
        <table width="150" cellspacing="3" cellpadding="0" border="0">
    		<tr>
              <td width="150" height="35" align="center" background="http://www.emailonacid.com/emails/response_emails/
              button_back.gif" style="background-repeat:repeat-x; background-position:top left; background-color:#3c96e2; 
              border:1px solid #666666; color:#FFFFFF; font-weight:bold; white-space:nowrap; height:35px;">
              <a href="http://www.emailonacid.com/email-preview/online_demo/C7" target="_blank" style="color:#FFFFFF; 
              cursor:pointer; font-size:13px; text-align:center; text-decoration:none; vertical-align:baseline; font-weight:bold;"> 
              <span style="padding:10px 10px; color:#FFF">Online Demo&nbsp;&rsaquo;&rsaquo;</span></a></td>
    		</tr>
		</table>        
-->
<?php  if(isset($footer){echo $footer ;}  ?>
    </div> <!--end wrapper-->

</body>
</html>