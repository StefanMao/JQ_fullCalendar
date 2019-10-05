<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.0/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.1/fullcalendar.min.js"></script>
<script type="text/javascript" src="../packages/core/locales-all.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.1/fullcalendar.min.css" rel="stylesheet"  />
<link href="../packages/CSS/calendar_temple.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.1/fullcalendar.print.css" rel="stylesheet" media="print"/>
<link href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.12.0/themes/sunny/jquery-ui.css" rel="stylesheet"/>

<div id="calendar"></div> 
<script>

    /* initialize the calendar
    -----------------------------------------------------------------*/
  $(document).ready(function () {



   var calendar = $('#calendar').fullCalendar({

    themeSystem: 'jquery-ui',
    themeName:'sunny',
    locale:'zh-tw',
    
    
    plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
    header: {
        left: 'title',
        center: 'month,agendaWeek,agendaDay,listWeek',
        right: 'prevYear,prev,today,next,nextYear'
      },
      buttonText:{
        today:'Today',
        prevYear:new moment().year()-1,
        nextYear:new moment().year()+1
      },
      
      viewRender:function(view){
        var y = moment($('#calendar').fullCalendar('getDate')).year()
        $('.fc-prevYear-button').text(y-1)
        $('.fc-nextYear-button').text(y+1)
      },
      views: {
        month: { // name of view
            titleFormat: 'MMMM YYYY'
            // other view-specific options here
        },
        week: {
            titleFormat: " MMMM D YYYY"
        },
        day: {
            titleFormat: 'D MMM, YYYY'
        }
    },

      editable:true,
      selectable:true,
      selectHelper:true,
      eventLimit:true,
      events: "http://localhost/JQ_Calendar_web/examples/php/load.php",

      select: function(start, end, allDay)
    {
     var title = prompt("Enter Event Title");
     if(title)
     {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      
      $.ajax({
       url:"http://localhost/JQ_Calendar_web/examples/php/insert.php",
       type:"POST",
       data:{title:title, start:start, end:end},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Added Successfully");
       }
      })
     }
    }


        
    })

    })
  



</script>
</head>

</html>
