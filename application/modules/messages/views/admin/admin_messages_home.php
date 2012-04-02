<?php print displayStatus();?>
<div id="homeright"  class="adminhome">
    <form method="post" id="form" action="admin/insertShoutBox" >
        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" />
        <input type="hidden" name="user" id="nick" value="<?php echo $username;?>" />
        <p class="messagelabel"><label class="messagelabel">Message</label>
            <textarea  id="message" name="message" rows="2" cols="80"></textarea>
        </p>
        <div class="buttons">
            <button type="submit" class="positive" name="submit" value="submit">
            <?php print $this->bep_assets->icon('disk');?>
            <?php print $this->lang->line('general_save');?>
            </button>
        </div>
    </form>
    <div id="loading"><img src="../../assets/images/general/ajax-loader2.gif" alt="Loading now. Smile" /></div>
    <div class="clearboth"></div>
    <div id="container">
        <span class="clear"></span>
        <div class="content">
            <h1>Latest Messages or Task To Do</h1>
            <ul id="message_ul" >
            </ul>   
        </div>
    </div>
    <div id="completed">
        <h1>Completed Lists</h1>
        <ul id="completed_ul">
        </ul>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    //global vars
    var inputUser = $("#nick");
    var inputMessage = $("#message");
    var loading = $("#loading");
    var messageList = $("#message_ul");
    var completedmsg = $("#completed");
    var completedList = $("#completed_ul");
    //Load for the first time the shoutbox data
    updateShoutbox();
    updateCompletedbox();
    
    

    //functions
    function updateShoutbox()
    {    
        //just for the fade effect
        messageList.hide();
        loading.fadeIn();
        //send the post to shoutbox.php
        $.ajax({
            type: "POST", 
            url: "<?php echo site_url('messages/admin/AjaxgetShoutBox'); ?>", 
            // data: "action=update",
            complete: function(data)
            {
                loading.fadeOut();
                messageList.html(data.responseText);
                messageList.fadeIn(500);
                //completedList.fadeIn(500);
            }
        });
    }
    


    function updateCompletedbox()
    {
        //just for the fade effect
        completedList.hide();
        loading.fadeIn();
        //send the post to shoutbox.php
        $.ajax({
            type: "POST", 
            url: "<?php echo site_url('messages/admin/AjaxgetCompletedBox'); ?>", 
            // data: "action=update",
            complete: function(data)
            {
                loading.fadeOut();
                completedList.html(data.responseText);
                // messageList.fadeIn(500);
                completedList.fadeIn(500);
            }
        });
    }


    //check if all fields are filled
    function checkForm()
    {
        if(inputUser.attr("value") && inputMessage.attr("value"))
        {
            return true;
        }   
        else
        {
            return false;
        }
            
    }
    
    
    //on submit event
    $("#form").submit(function(event){
        event.preventDefault();
        if(checkForm())
        {
            var nick = inputUser.attr("value");
            var message = inputMessage.attr("value");
            //we deactivate submit button while sending
            $("#send").attr({ disabled:true, value:"Sending..." });
            $("#send").blur();
            //send the post to shoutbox.php
            $.ajax({
                type: "POST", 
                url: "<?php echo site_url('messages/admin/insertShoutBox'); ?>", 
                data: $('#form').serialize(),
                complete: function(data)
                {
                    messageList.html(data.responseText);
                    updateShoutbox();
                    $('#message').val('');
                    //reactivate the send button
                    $("#send").attr({ disabled:false, value:"SUBMIT !" });
                }
            });
        }
        else alert("Please fill all fields!");
        //we prevent the refresh of the page after submitting the form
        return false;
    });
    
    //on todo event. this changes the status to compeleted
    
    $(".todo").live('click', function(event){
        event.preventDefault();
        loading.fadeIn();
        var href = $(this).attr("href");
        var id =href.substring(href.lastIndexOf("/") + 1);
        var msgContainer = $(this).closest('li');
        $.ajax({
            type: "POST",
        //    url: "<?php echo site_url('messages/admin/changestatus'); ?>"+"/"+id,
           url: href,
            // data: id,
            cache: false,
            complete: function()
            {
                msgContainer.slideUp('slow', function() {$(this).remove();});
                //  completedmsg.fadeOut(500);
                updateShoutbox();
                updateCompletedbox();
                //  completedmsg.fadeIn(500);
                loading.fadeOut();
            }
        });     
    });
 
    
    // on complete event. this changes the status to todo
    $(".completedmsg").live('click', function(event){
    event.preventDefault();
    // alert("hei");
    loading.fadeIn();
    var href = $(this).attr("href");
    var id =href.substring(href.lastIndexOf("/") + 1);
    var CompMsgContainer = $(this).closest('li');
    $.ajax({
            type: "POST",
            url: "<?php echo site_url('messages/admin/changestatus'); ?>"+"/"+id,
            // data: id,
            cache: false,
            complete: function(){
            CompMsgContainer.slideUp('slow', function() {$(this).remove();});
        //  completedmsg.fadeOut(500);
            updateShoutbox();
            updateCompletedbox();
        //  completedmsg.fadeIn(500);
            loading.fadeOut();
          }
         });
    });  
    

    
    $(".delete").live('click',function(event){
         event.preventDefault();
        // alert ('clicked');
        loading.fadeIn();
        var commentContainer = $(this).parent();
        var id = $(this).attr("id");
        // var string = 'id='+ id ;
        //  alert(id);
        
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('messages/admin/delete'); ?>"+"/"+id,
            // data: id,
            cache: false,
            complete: function()
            {    
                commentContainer.slideUp('slow', function() {$(this).remove();});
                updateShoutbox();
                updateCompletedbox();
                loading.fadeOut();
            }
        });
    });
});
    
</script>

<?php
/*
echo "<pre>todos";
print_r ($todos);
echo "</pre>";
*/