<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
    
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <title>Document</title>
</head>
<body>
<style>

.add {
            text-decoration: none;
            background-color: #0074cc;
            color: white;
            height: 2.5rem;
            margin: 0.5rem;
            text-align: center;
            padding: 5px 10px;
            border-radius: 4px;

            
           
        }
.head{
    display: flex;
    align-items: center;
    justify-content: space-between;
}


#carPhotosContainer {
    width: 25rem ;
    background:wheat;
  
    height: 100%;
    background-color: white;
    position: fixed;
    top: 0;
    left:-100%; 
    z-index: 5;
    transition: left 1s;
    overflow-y: scroll;
}

.hidden{
    display: none;
}
</style>
<div id="carPhotosContainer" class="hidrden">
    <!-- Car images will be displayed here -->
</div>

<div class="head">


<h1 >cars list</h1>
</div>
                <table class='display' id="tab" style='padding:2rem ;'>
                    <thead>
                        <tr>
                            <th>model</th>
                            <th>marque</th>
                            <th>Hourly Price</th>
                            <th> photos</th>
                            <th>rent</th>
                        </tr>
                    </thead>
                    <tbody>



<?php
        // Output data of each row
        foreach ($carsList as $car) {
            
            echo "<tr>";
            echo "<td>" . $car["model"] . "</td>";
            echo "<td>" . $car["marque"] . "</td>";
            echo "<td>" . $car["hourly_price"] . "</td>";
            echo "<td> <button onclick=loadcarPhotos('index.php?action=getCarPhotos&id=".$car["id"]."') style='border:none;background:rgb(96, 96, 120);color:white';>photos</button></td>";
            echo "<td >";
           echo "<form action='index.php?action=addRent' method='POST'>" ;
           echo "<input type='hidden' value='".$car["id"]."' name='car_id'>";
           echo "<input type='hidden' value='rent' name='action'> " ;
           echo  "<input type='hidden' value='$date_start' name='rent_start'>" ;
           echo  "<input type='hidden' value='$date_end' name='rent_end'>" ;
           echo " <input type='submit' value='rent'></input> </form>" ;
            echo "</td>";
            echo "</tr>";
        }
?>
        
        </tbody>
                </table>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

                <script >
        $(document).ready(function() {
            $('#tab').DataTable();
        });
        function loadcarPhotos(page) {
    $.ajax({
                url: page,
                type: 'GET',
                success: function(data) {
                    // Replace the content of the "content" div with the response from the server.
                    $('#carPhotosContainer').html(data);
                    const carPhotosContainer = document.getElementById('carPhotosContainer');

                    carPhotosContainer.style.left = '0';
                },
                error: function() {
                    // Handle the error case, e.g., show an error message.
                    alert('Error loading content.');
                }
            });
    // Make an AJAX request to fetch the car photos
  
}

    </script>
<script >
const carPhotosContainer = document.querySelector('#carPhotosContainer');
carPhotosContainer.addEventListener("click", close);

    function close(){
        const carPhotosContainer = document.querySelector('#carPhotosContainer');
            carPhotosContainer.style.left = '-100%';
    }
</script>
</body>
</html>