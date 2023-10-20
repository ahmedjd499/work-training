<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
   
  </head>
  <style>
    #calendar{
        padding: 1rem;
    }
  </style>
  <body>
    <div id='calendar'></div>


    <script >

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    initialDate: new Date(),
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay',
      
    },
    events: [
        <?php 
              foreach ($rentList as $rent) {
            
                echo "{";
                echo "title : '" . $rent["model"] .'----'.substr($rent["email"], 0, strpos($rent["email"], "@")). "',";
                echo "start : '" .$rent["rent_start"]. "',";
                echo "end : '" .$rent["rent_end"]."'";

                echo "},";
            }
            
            
        ?>
     
      
    ]
  });

  calendar.render();
});


    </script>
  </body>
</html>