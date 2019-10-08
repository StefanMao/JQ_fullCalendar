<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
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
     eventRender: function(event, element) {
     element.css("font-size", "1.2em")
     element.css("padding", "5px")
     //element.css("color","white")
     },

      editable:true,
      selectable:true,
      selectHelper:true,
      eventLimit:true,
      events: "http://localhost/JQ_Calendar_web/examples/php/load.php",


      select: function(start, end, allDay)
    {
      
     var title = prompt("Enter Event Title")
     if(title)
     {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss")
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss")
      
      $.ajax({
       url:"http://localhost/JQ_Calendar_web/examples/php/insert.php",
       type:"POST",
       contentType: "application/x-www-form-urlencoded; charset=utf-8",
       data:{title:title, start:start, end:end},
       success:function()
       {
        console.log("insert"+ title)
        //calendar.fullCalendar('refetchEvents')
        alert("Added Successfully")
       }
      })
     }
    },
    eventResize:function(event) //日程调整结束且日程被改變時觸發function
    {
      var start =$.fullCalendar.formatDate(event.start,"Y-MM-DD HH:mm:ss")
      var end =$.fullCalendar.formatDate(event.end,"Y-MM-DD HH:mm:ss")
      var title=event.title
      var id = event.id
      $.ajax({
        url:"http://localhost/JQ_Calendar_web/examples/php/update.php",
        type:"POST",
        data:{title:title, start:start, end:end,id:id},
        success:function(){
          calendar.fullCalendar('refetchEvents')
          alert("Update Successfully")
        }
        
      })

    },
    eventDrop:function(event)
    {
      var start =$.fullCalendar.formatDate(event.start,"Y-MM-DD HH:mm:ss")
      var end =$.fullCalendar.formatDate(event.end,"Y-MM-DD HH:mm:ss")
      var title=event.title
      var id = event.id
      $.ajax({
        url:"http://localhost/JQ_Calendar_web/examples/php/update.php",
        type:"POST",
        //contentType: "application/x-www-form-urlencoded; charset=utf-8",
        data:{title:title, start:start, end:end,id:id},
        success:function(){
          
          console.log("drop"+title)
          calendar.fullCalendar('refetchEvents')
          alert("更新成功!")
        }
        
      })

    },
    eventClick:function(event)
    {
      var id =event.id
         
      if(confirm("是否要移除此事件?")){

        $.ajax({
          url:"http://localhost/JQ_Calendar_web/examples/php/delete.php",
          type:"POST",
          data:{id:id},
          success:function(){

          calendar.fullCalendar('refetchEvents')
          alert("刪除成功!")
          }

        })

      }
      
    }


        
    })

    })
  



</script>
</head>

</html>
