
<div id="carPhotosContainer" >
    <!-- Car images will be displayed here -->
</div>

<div class="head">


<h1 >cars list</h1>
<a href="index.php?action=addCar" class="add">add car</a>
</div>
                <table class='display' id="tab">
                    <thead>
                        <tr>
                            <th>car ID</th>
                            <th>model</th>
                            <th>marque</th>
                            <th>Hourly Price</th>
                            <th>added at</th>
                            <th>status</th>

                            <th> delete</th>
                            <th> update</th>
                            <th> photos</th>
                        </tr>
                    </thead>
                    <tbody>



<?php
        // Output data of each row
        foreach ($carsList as $car) {
            
            echo "<tr>";
            echo "<td>" . $car["id"] . "</td>";
            echo "<td>" . $car["model"] . "</td>";
            echo "<td>" . $car["marque"] . "</td>";
            echo "<td>" . $car["hourly_price"] . " $/h</td>";
            echo "<td >" . $car["created_at"] . "</td>";
            echo "<td >" . $car["status"] . "</td>";

            echo "<td> <a href='index.php?action=deleteCar&id=" . $car['id'] . "'style='border:1px solid red;color:red'>delete</a></td>";
            echo "<td> <a href='index.php?action=editCar&id=" . $car['id'] . "'style='border:1px solid rgb(0, 120, 205);color:rgb(0, 120, 205)'>update</a></td>";
            echo "<td> <button onclick=loadcarPhotos('index.php?action=getCarPhotos&id=".$car["id"]."') class='btn'>photos</button></td>";
            echo "</tr>";
        }
?>
        
        </tbody>
                </table>

                <script >
        $(document).ready(function() {
            $('#tab').DataTable();
        });
        const carPhotosContainer = document.getElementById('carPhotosContainer');

        function loadcarPhotos(page) {
    $.ajax({
                url: page,
                type: 'GET',
                success: function(data) {
                    // Replace the content of the "content" div with the response from the server.
                    $('#carPhotosContainer').html(data);

                    carPhotosContainer.style.left = '0';
                },
                error: function() {
                    // Handle the error case, e.g., show an error message.
                    alert('Error loading content.');
                }
            });
    // Make an AJAX request to fetch the car photos
  
}


carPhotosContainer.addEventListener("click", close);

    function close(){
            carPhotosContainer.style.left = '-100%';
    }
</script>