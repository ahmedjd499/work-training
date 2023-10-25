
    <div id='calendar'></div>

    <script >

  var calendarEl = document.getElementById('calendar');


  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'listWeek',
    initialDate: new Date(),
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay',
      
    },eventClick: function(event, jsEvent, view) {
       console.log(event.event.title)
      },
    events: [
        <?php 
              foreach ($rentList as $rent) {
            
                echo "{";
                echo "title : '" . $rent["model"] .' '.$rent["model"] .'----'.substr($rent["email"], 0, strpos($rent["email"], "@")). "',";
                echo "start : '" .$rent["rent_start"]. "',";
                echo "end : '" .$rent["rent_end"]."'";

                echo "},";
            }
            
            
        ?>
     
      
    ]
  });


calendar.render();


    </script>
 