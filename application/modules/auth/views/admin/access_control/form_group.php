<h2><?php print $header?></h2>

<?php print form_open('auth/admin/acl_groups/form/'.$this->form_validation->id,array('class'=>'horizontal'))?>
    <fieldset>
        <ol>
            <li>
                <?php print form_label($this->lang->line('access_name'),'name')?>
                <?php print form_input('name',$this->form_validation->name,'class="text"')?>
            </li>
            <li>
                <?php print form_label($this->lang->line('access_disabled'),'disabled')?>
                Yes <?php print form_radio('disabled','1',set_radio('disabled','1',$selected = ($this->form_validation->disabled == '1') ? TRUE : FALSE))?>
                No <?php print form_radio('disabled','0',set_radio('disabled','0',$selected = ($this->form_validation->disabled == '0') ? TRUE : FALSE))?>
            </li>
            <li>
                <?php print form_label($this->lang->line('access_parent_name'),'parent')?>
                <?php print form_dropdown('parent',$groups,$this->form_validation->parent,'size=10 style="width:20.3em;"')?>
            </li>
            <li class="submit">
                <?php print form_hidden('id',$this->form_validation->id)?>
                <div class="buttons">
					<button type="submit" class="positive" name="submit" value="submit">
						<?php print $this->bep_assets->icon('disk')?>
						<?php print $this->lang->line('general_save')?>
					</button>
					
					<a href="<?php print site_url('auth/admin/acl_groups')?>" class="negative">
						<?php print $this->bep_assets->icon('cross')?>
						<?php print $this->lang->line('general_cancel')?>
					</a>
				</div>
            </li>
        </ol>
    </fieldset>
<?php print form_close()?>