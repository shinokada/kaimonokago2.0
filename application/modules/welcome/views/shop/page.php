<div id="maintop">
    <?php print displayStatus();?>
<?php

if(isset($pagecontent['content']))
{// this if is for the installation without this it will display an error
  echo "<div id=\"pagecont\" >";
  $prefix="../";
  $content = str_replace($prefix, "", $pagecontent['content']);
  echo $content;
  echo "</div>";
};

if($path==="map")
{
  $this->load->view($this->config->item('backendpro_template_shop') . 'map');
}
elseif($path=="image-gallery")
{
  $this->load->view($this->config->item('backendpro_template_shop') . 'gallery');
}

?>
</div><!-- end of #maintop -->

<?php
$base=$this->config->item('base_url');
$mystring = $base;
$findme   = 'localhost';
$pos = strpos($mystring, $findme);
if(ENVIRONMENT=='development' OR $pos)
{
  echo "<pre>pagecontent: ";
  print_r($pagecontent);
  echo "</pre>";

  echo "<pre>multilang is: ";
  print_r ($this->data['multilang']);
  echo "</pre>";
  echo "<pre>mylanguage: ";
  print_r ($this->data['mylanguage']);
  echo "</pre>";
  echo "<pre>lang_id: ";
  print_r ($this->data['lang_id']);
  echo "</pre>";
  echo "<pre>language: ";
  var_dump ($this->data['language']);
  echo "</pre>";
  echo "<pre>mylanguate1: ";
  print_r ($this->data['mylanguage1']);
  echo "</pre>";
  echo "<pre>sessionlang: ";
  if(!empty($this->data['sessionlang']))
  {
    var_dump ($this->data['sessionlang']);
  }
  echo "</pre>";

  /* echo "<pre>get_class is: "; */
  /* print_r($get_class); */
  /* echo "</pre>"; */
  /* echo "<pre>module name is: "; */
  /* print_r($module); */
  /* echo "</pre>"; */
  /* echo "<pre>index path is: "; */
  /* print_r($index_path); */
  /* echo "</pre>"; */
  /* echo "<pre>cat_parent is: "; */
  /* print_r ($this->data['cat_parent']); */
  /* echo "</pre>"; */
  /* echo "<pre>navlist: "; */
  /* print_r ($this->data['navlist']); */
  /* echo "</pre>"; */

//  echo "<pre>slides is: ";
//  print_r($slides);
//  echo "</pre>";  
}
?>

