<?php print displayStatus();?>
<?php
/*
if ($this->session->flashdata('subscribe_msg'))
{
	echo "<div class='status_box'>";
	echo $this->session->flashdata('subscribe_msg');
	echo "</div>";
}
*/
?>
<?php // echo validation_errors('<div class="message error">','</div>'); ?>
<?php echo form_open($module."/subscribe"); ?>
<h1>
<?php echo form_fieldset('Subscribe To Our Newsletter'); ?>
</h1>
<h5>*Name</h5>
<input type="text" name="name" id="name" value="<?php echo set_value('name'); ?>" size="40" />
<span id="msgbox" style="display:none"></span>
<h5>*Email</h5>
<input type="text" name="email" id="email" value="<?php echo set_value('email'); ?>" size="40" />
<span id="emailmsg" style="display:none"></span>
<?php

if($security_method=='recaptcha')
{
    echo "<h5>*".$this->lang->line('contact_captcha')."</h5>";
    echo "<p>$cap_img</p>" ;

}
elseif($security_method=='question')
{
    echo "<br /><label for=\"write_ans\">*". $this->lang->line('webshop_write_ans')."</label><br />";
    echo $question;
    echo "<input type=\"text\" name=\"write_ans\" id=\"write_ans\" maxlength=\"30\" size=\"30\"  />";
}

?>

<div><input type="submit" value="Subscribe" /></div>
<?php echo form_fieldset_close(); ?>

<?php echo form_close(); ?>

<script type="text/javascript">

$(document).ready(function(){

    $("#name").blur(function()
    {
        var nameval = $(this).val();
        if(nameval)
        {
            //remove all the class add the messagebox classes and start fading
            $("#msgbox").removeClass().addClass('messagebox').text('Checking...').fadeIn("slow");
            //check the username exists or not from ajax
            $.post("<?php echo site_url('welcome/user_availability'); ?>",{ what:$(this).val(), where:"name" } ,function(data)
            {
                if(data=='false') //if username not avaiable
                {
                    $("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
                    {
                    //add message and change the class of the box and start fading
                    $(this).html('This User name Already exists').addClass('messageboxerror').fadeTo(900,1);
                    });
                }
            else
            {
                $("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
                {
                    //add message and change the class of the box and start fading
                    $(this).html('Username available to register').addClass('messageboxok').fadeTo(900,1);
                });
            }
            });
        } 
        else
        {
            $("#msgbox").fadeTo(200,0);
        }       
    });
     
        

    $("#email").blur(function()
    {
        var nameval = $(this).val();
        var testresults

        function checkemail()
        {
            var str=nameval;
            var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            if (filter.test(str))
            {
                testresults=true;
            }
            else
            {
                //alert("Please input a valid email address!")
                testresults=false
            }
            return (testresults)
        }


        
        if(nameval)
        {
            //remove all the class add the messagebox classes and start fading
            $("#emailmsg").removeClass().addClass('messagebox').text('Checking...').fadeIn("slow");
            //check the username exists or not from ajax
            var testresults = checkemail();
            if(testresults)
            {
                $.post("<?php echo site_url('welcome/user_availability'); ?>",{ what:$(this).val(), where:"email" } ,function(data)
                {
                    if(data=='false') //if username not avaiable
                    {
                        $("#emailmsg").fadeTo(200,0.1,function() //start fading the messagebox
                        {
                        //add message and change the class of the box and start fading
                        $(this).html('This email Already exists').addClass('messageboxerror').fadeTo(900,1);
                        });
                    }
                else
                {
                    $("#emailmsg").fadeTo(200,0.1,function()  //start fading the messagebox
                    {
                        //add message and change the class of the box and start fading
                        $(this).html('This email available to register').addClass('messageboxok').fadeTo(900,1);
                    });
                }
                });
            }
            else
            {
                $("#emailmsg").fadeTo(200,0.1,function()  //start fading the messagebox
                    {
                        //add message and change the class of the box and start fading
                        $(this).html('Add valid email').addClass('messageboxerror').fadeTo(900,1);
                    });
            }    
        }
        else
        {
            $("#emailmsg").fadeTo(200,0);
        }  
    });
});

</script>

