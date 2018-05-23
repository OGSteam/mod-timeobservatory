<?php if (!defined('IN_SPYOGAME')) die("Hacking Attemp!");?>


<script type="text/javascript" language="JavaScript">
    var currentTime = 0;
    var syncdelay = 1; // seconde

    $( document ).ready(function() {
      //  syncTimer()
        setInterval(syncTimer, (syncdelay * 1000));
    });

    function syncTimer()
    {
        jQuery('.syncTimestamp').each(function() {
            var currentElement = $(this);
            timeStamp = Number($(this).attr('data')) + Number(currentTime);
            currentElement.text( sformat(timeStamp));
        });
        // préparation prochaine passe
        currentTime += syncdelay  ;
    }

   // https://forum.jquery.com/topic/converting-seconds-to-dd-hh-mm-ss-format
    function sformat(timestamp) {

      var fm = [
         Math.floor(timestamp / 60 / 60 / 24), // DAYS
         Math.floor(timestamp / 60 / 60) % 24, // HOURS
         Math.floor(timestamp / 60) % 60, // MINUTES
         timestamp % 60 // SECONDS
      ];
      //console.log(fm)
      return $.map(fm, function(v, i) { return ((v < 10) ? '0' : '') + v; }).join(':');

    }

</script>
