<div id="langbox"><!-- start of #langbox -->
<?php
// if preference multi_language is yes display the following
$multilang = $this->data['multilang'];
?>
<?php if($multilang):?>
  <ul>
    <li><a href="<?php echo site_url();?>/welcome/changelang/english"><img src="assets/images/flags/24/uk.png" alt="English" title="English flag" /></a></li>

<?php

  foreach ($this->data['alllangs'] as $key=>$value)
  {
    echo "<li>";
    echo "<a href='".site_url()."/welcome/changelang/".$value['langname']."'><img src='assets/images/flags/24/".$value['langname'].".png' alt='".$value['langname']."' /></a></li>";
  }

?>

  </ul>
<?php endif; ?>

</div><!-- end of #langbox -->


