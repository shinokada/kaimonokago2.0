<script type="text/javascript">
jQuery(function($){
    $(".tweet").tweet({
      //join_text: "auto",
      username: "<?php echo $twittername; ?>",
      avatar_size: 48,
      count: "<?php echo $twittercount; ?>",
      //auto_join_text_default: "we said,",
      //auto_join_text_ed: "we",
      //auto_join_text_ing: "we were",
      //auto_join_text_reply: "we replied",
      //auto_join_text_url: "we were checking out",
      loading_text: "loading tweets..."
    });
  });
/*
jQuery(function($){
        $(".tweet").tweet({
          avatar_size: 48,
          count: "<?php echo $twittercount; ?>",
          username: "<?php echo $twittername; ?>",
          loading_text: "searching twitter..."
        });
      });
*/
</script>
<div class='tweet query'></div>