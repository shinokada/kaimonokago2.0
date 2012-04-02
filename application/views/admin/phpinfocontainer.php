<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php print $this->bep_site->get_metatags();?>
	<title><?php print $header.' | '.$this->preference->item('site_name');?></title>
	<?php print $this->bep_site->get_variables();?>
	<?php print $this->bep_assets->get_header_assets();?>
	<?php print $this->bep_site->get_js_blocks();?>
</head>
<body>
<div id="content">
    <a name="top"></a>
    <?php print displayStatus();?>
    
    <?php
    if( isset($page))
    {
	    if( isset($module))
	    {
            $this->load->view($module."/".$page);
        }	 
        else 
        {
            $this->load->view($page);
        }
    }
    ?>
    <br style="clear: both" />
</div>
    <div id="footer">
        <div id="copyright">
           &copy; <a href="http://www.cecilieokada.com">Cecilie Okada</a> Copyright <?php echo date("Y");  ?> All rights Reserved
        </div>
        <div id="version">
            <a href="#top"><?php print $this->lang->line('general_top')?></a> |
            <a href="<?php print base_url()?>user_guide"><?php print $this->lang->line('general_documentation')?></a> |
            Version <?php print Kaimonokago_VERSION?></div>
    </div>
</div>
<?php print $this->bep_assets->get_footer_assets();?>
</body>
</html>

