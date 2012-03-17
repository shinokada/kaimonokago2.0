<div id="generatePasswordWindow">
	<table>
		<tr><th width="50%"><?php print $this->lang->line('userlib_generate_password'); ?></th><th class="right"><a href="javascript:void(0);" id="gpCloseWindow"><?php print $this->bep_assets->icon('cross') ?></a></th></tr>
		<tr><td rowspan="3"><?php print $this->lang->line('userlib_password'); ?>:<br/>&nbsp;&nbsp;&nbsp;<b id="gpPassword">PASSWORD</b></td><td class="right"><?php print $this->lang->line('general_uppercase'); ?> <?php print form_checkbox('uppercase','1',TRUE); ?></td></tr>
		<tr><td class="right"><?php print $this->lang->line('general_numeric'); ?> <?php print form_checkbox('numeric','1',TRUE); ?></td></tr>
		<tr><td class="right"><?php print $this->lang->line('general_symbols'); ?> <?php print form_checkbox('symbols','1',FALSE); ?></td></tr>
		<tr><td colspan="2"><a href="javascript:void(0);" class="icon_arrow_refresh" id="gpGenerateNew"><?php print $this->lang->line('general_generate'); ?></a></td></tr>
		<tr><td><a href="javascript:void(0);" class="icon_tick" id="gpApply"><?php print $this->lang->line('general_apply'); ?></a></td><td class="right"><?php print $this->lang->line('general_length'); ?> <input type="text" name="length" value="12" maxlength="2" size="4" /></td></tr>
	</table>
</div>

<h2><?php print $header?></h2>
<p><?php print $this->lang->line('userlib_password_info')?></p>

<?php print form_open('auth/admin/members/form/'.$this->form_validation->id,array('class'=>'horizontal'))?>
    <fieldset>
        <ol>
            <li>
                <?php print form_label($this->lang->line('userlib_username'),'username')?>
                <?php print form_input('username',set_value('username',$this->form_validation->username),'id="username" class="text"')?>
            </li>
            <li>
                <?php print form_label($this->lang->line('userlib_email'),'email')?>
                <?php print form_input('email',set_value('email',$this->form_validation->email),'id="email" class="text"')?>
            </li>
            <li>
                <?php print form_label($this->lang->line('userlib_password'),'password')?>
                <?php print form_password('password','','id="password" class="text"')?>
            </li>
            <li>
                <?php print form_label($this->lang->line('userlib_confirm_password'),'confirm_password')?>
                <?php print form_password('confirm_password','','id="confirm_password" class="text"')?>
            </li>
            <li>
                <?php print form_label($this->lang->line('userlib_group'),'group')?>
                <?php print form_dropdown('group',$groups,set_value('group',$this->form_validation->group),'id="group" size="10" style="width:20.3em;"')?>
            </li>
            <li>
                <?php print form_label($this->lang->line('userlib_active'),'active')?>
                <?php print $this->lang->line('general_yes')?> <?php print form_radio('active','1',set_radio('active','1',$selected = ($this->form_validation->active == 1) ? TRUE : FALSE),'id="active"')?>
                <?php print $this->lang->line('general_no')?> <?php print form_radio('active','0',set_radio('active','0',$selected = ($this->form_validation->active == 1) ? FALSE : TRUE))?>
            </li>
            <li class="submit">
                <?php print form_hidden('id',set_value('id',$this->form_validation->id))?>
                <div class="buttons">
	                <button type="submit" class="positive" name="submit" value="submit">
	                	<?php print  $this->bep_assets->icon('disk');?>
	                	<?php print $this->lang->line('general_save')?>
	                </button>

	                <a href="<?php print  site_url('auth/admin/members')?>" class="negative">
	                	<?php print  $this->bep_assets->icon('cross');?>
	                	<?php print $this->lang->line('general_cancel')?>
	                </a>

	                <a href="javascript:void(0);" id="generate_password">
	                	<?php print  $this->bep_assets->icon('key');?>
	                	<?php print $this->lang->line('userlib_generate_password'); ?>
	                </a>
	            </div>
            </li>
        </ol>
    </fieldset>
<h2><?php print $this->lang->line('userlib_user_profile')?></h2>
<?php
    if( ! $this->preference->item('allow_user_profiles')):
        print "<p>".$this->lang->line('userlib_profile_disabled')."</p>";
    else:
?>
    <fieldset>
        <ol>
            <li>
                <?php print form_label('Company Name','company_name')?>
                <?php $value = (empty($profiles['company_name']))? '' : $profiles['company_name'];  ?>
                <?php print form_input('company_name',$value,'id="company_name" class="text"')?>
 
            </li>
            <li>
                <?php print form_label('Full Name','full_name')?>
                 <?php $value = (empty($profiles['full_name']))? '' : $profiles['full_name'];  ?>
                <?php print form_input('full_name',$value,'id="full_name" class="text"')?>
            </li>
            <li>
                <?php print form_label('Web Address','web_address')?>
                 <?php $value = (empty($profiles['web_address']))? '' : $profiles['web_address'];  ?>
                <?php print form_input('web_address',$value,'id="web_address" class="text"')?>
            </li>
            <li>
                <?php print form_label('Phone Number','phone_number')?>
                 <?php $value = (empty($profiles['phone_number']))? '' : $profiles['phone_number'];  ?>
                <?php print form_input('phone_number',$value,'id="phone_number" class="text"')?>
            </li>
            <li>
                <?php print form_label('Address','address')?>
                 <?php $value = (empty($profiles['address']))? '' : $profiles['address'];  ?>
                <?php print form_input('address',$value,'id="address" class="text"')?>
            </li>
            <li>
                <?php print form_label('City','city')?>
                 <?php $value = (empty($profiles['city']))? '' : $profiles['city'];  ?>
                <?php print form_input('city',$value,'id="city" class="text"')?>
            </li>
            <li>
                <?php print form_label('Post Code','post_code')?>
                 <?php $value = (empty($profiles['post_code']))? '' : $profiles['post_code'];  ?>
                <?php print form_input('post_code',$value,'id="post_code" class="text"')?>
            </li>
            





            <li class="submit">
                <div class="buttons">
	                <button type="submit" class="positive" name="submit" value="submit">
	                	<?php print  $this->bep_assets->icon('disk');?>
	                	<?php print $this->lang->line('general_save')?>
	                </button>

	                <a href="<?php print  site_url('auth/admin/members')?>" class="negative">
	                	<?php print  $this->bep_assets->icon('cross');?>
	                	<?php print $this->lang->line('general_cancel')?>
	                </a>
	            </div>
            </li>
        </ol>
    </fieldset>
<?php endif;?>
<?php print form_close()?>