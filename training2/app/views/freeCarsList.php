<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="icon" href="public/logo.png" type="image/x-icon">

    <title>Document</title>
</head>

<body>

<main >
    <div class="heading">
        
        <a href="index.php?action=profile" class=''>↩</a>
        <h1>Available cars list</h1>
    </div>    
<div class='carsContainer'>
<?php 
foreach ($carsList as $car) {
  echo " <div class='property-card'>";
  echo " <div class='property-image'>";
  
  if (!isset($car["photos"][0])) {
    echo "<img class='image' src='public/car-photos/car.png'>";
  } else {
    echo "<div class='image-carousel' id='car-container-wrapper'>"; // Create a container for the image carousel
    foreach ($car["photos"] as $img) {
      echo "<img class='image' src='public/car-photos/" . $img['path'] . "'>";
    }
    echo "</div>";
  }
  echo "   </div>";

  echo "  <div class='property-description'>";
  echo "     <h5> ".$car["marque"]." </h5>";
  echo "     <h4>".$car["model"]."</h4>";
  echo " <span class='chip primary'>".$car["hourly_price"]." $/h - total : ".$car["total_price"]."$</span>";      

  echo "   </div>";
  echo "<form action='index.php?action=addRent' method='POST' class='addRent'>";
  echo "<input type='hidden' value='" . $car["id"] . "' name='car_id'>";
  echo "<input type='hidden' value='rent' name='action'> ";
  echo  "<input type='hidden' value='$date_start' name='rent_start'>";
  echo  "<input type='hidden' value='$date_end' name='rent_end'>";
  echo " <button type='submit' class='btn' style='z-index:999;'>rent</button> </form>";
  echo "  </div>";
}
?>
</div>

</main>
  

<!-- Add the following JavaScript code at the end of your HTML file -->
<script>
  // Get all car containers and attach image carousel functionality to each one
  var carContainers = document.querySelectorAll(".property-card");
// Get the common ancestor that contains all car containers
// Get all common ancestor containers with the specified class
var commonAncestors = document.querySelectorAll(".property-card"); // Replace with the actual class name

commonAncestors.forEach(function (commonAncestor) {
  commonAncestor.addEventListener("mouseenter", function (event) {
    var carousel = event.target.querySelector(".image-carousel");
    if (carousel) {
      var images = carousel.querySelectorAll(".image");
      var currentIndex = 0;
      var intervalId;

      function startCarousel() {
        intervalId = setInterval(function () {
          images[currentIndex].style.display = "none";
          currentIndex = (currentIndex + 1) % images.length;
          images[currentIndex].style.display = "block";
        }, 2000);
      }

      function stopCarousel() {
        clearInterval(intervalId);
      }

      // Start the carousel when hovering over the container
      carousel.addEventListener("mouseenter", startCarousel);

      // Stop the carousel when the mouse leaves the container
      carousel.addEventListener("mouseleave", stopCarousel);

      // Initially, only show the first image
      images[currentIndex].style.display = "block";
    }
  });
});



</script>


    <script>
 

        function loadcarPhotos(page) {
            $.ajax({
                url: page,
                type: 'GET',
                success: function(data) {
                    // Replace the content of the "content" div with the response from the server.
                    $('#carPhotosContainer').html(data);
                    const carPhotosContainer = document.getElementById('carPhotosContainer');

                },
                error: function() {
                    // Handle the error case, e.g., show an error message.
                    alert('Error loading content.');
                }
            });
            // Make an AJAX request to fetch the car photos

        }
    </script>
  
</body>

</html>