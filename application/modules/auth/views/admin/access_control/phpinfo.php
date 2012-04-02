<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* application/modules/auth/views/admin/acess_control/phpifno.php */
?>
<div class="buttons">
    <a href="<?php print site_url($return_link);?>" class="positive">
    <?php print $this->bep_assets->icon('arrow_left');?>
    <?php print $this->lang->line('general_return');?>
    </a>
</div>
<div id="phpinfo">
<?php
phpinfo();
?>
</div>