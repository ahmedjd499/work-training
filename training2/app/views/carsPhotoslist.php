
<div class="car-imgs">
<div>
<h1 id='h1'>car : photos </h1>
    <button class="btn" id='closebtn'>❌</button><br>
</div>
   
    <?php
    if (count($carsPhotosList) > 0)
        foreach ($carsPhotosList as $carImg) {
            if (file_exists("public/car-photos/" . $carImg['path']))
                echo "<img src='public/car-photos/" . $carImg['path'] . "' alt='Car' class='car_img'>";
            if (unserialize($_COOKIE['user'])['role'] === 'admin')
                echo " <a   class='delbtn' onclick=deletecarPhoto('index.php?action=deleteCarPhoto&id=" . $carImg['id'] . '&car_id=' . $carImg['car_id'] . "')>x</a><br>";
        }
    else echo "<span style='color:red ;'>this car has no photos</span>" ;

    ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function deletecarPhoto(page) {

        $.ajax({
            url: page,
            type: 'GET',
            success: function(data) {
                // Replace the content of the "content" div with the response from the server.
                $('.car-imgs').html(data);
            },
            error: function() {
                // Handle the error case, e.g., show an error message.
                alert('Error loading content.');
            }
        });
    }
</script>