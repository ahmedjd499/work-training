<?php
// Check if the user is logged in
if (!isset($_COOKIE['user'])) {
    // If the user is not logged in, you can redirect them to the login page
    header('Location: index.php?action=login');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit car</title>
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <link rel="icon" href="public/logo.png" type="image/x-icon">

</head>

<body>

        <form method="post" action="index.php?action=editCar&id=<?php echo $car['id']; ?>" enctype="multipart/form-data" class='car-form flex-col'>
        <h1>Edit Car</h1>

            <label for="model">New model:</label>
            <input type="text" name="model" value="<?php echo $car['model']; ?>" class="form-input" required><br>
            <label for="marque">New marque:</label>
            <input type="text" name="marque" value="<?php echo $car['marque']; ?>" class="form-input"><br>
            <label for="hourly_price">Hourly price:</label>
            <input type="text" name="hourly_price" value="<?php echo $car['hourly_price']; ?>" class="form-input"><br>


            <input type="file" name="file[]" accept="image/*" id="file" multiple class="form-input">
            <h1>uploaded photos</h1>
    <div class="chosen_photos" id="chosen-photos">no photos was uploaded</div>
    <h1>old photos</h1>

            <div id='PhotosContainer'>

            </div>
            <div class="flex-row">
            <button type="submit" class="btn">save  changes</button>
            or
            <a href="index.php?action=admin&whereTo=cars" class="link">cancel</a>
        </div>
        </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      
        function loadcarPhotos(page) {
            $.ajax({
                url: page,
                type: 'GET',
                success: function(data) {
                    // Replace the content of the "content" div with the response from the server.
                    $('#PhotosContainer').html(data);
                },
                error: function() {
                    // Handle the error case, e.g., show an error message.
                    alert('Error loading content.');
                }
            });
            // Make an AJAX request to fetch the car photos

        }
        loadcarPhotos("index.php?action=getCarPhotos&id=<?php echo $car['id']; ?>")
    </script>
        <script>
        document.getElementById("file").addEventListener("change", function(e) {
            const chosenPhotos = document.getElementById("chosen-photos");
            chosenPhotos.innerHTML = ''; // Clear any previous content

            const files = e.target.files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                if (file.type.startsWith('image/')) {
                    const img = document.createElement("img");
                    img.classList.add("chosen-image");
                    img.file = file;

                    const reader = new FileReader();
                    reader.onload = (function(aImg) {
                        return function(e) {
                            aImg.src = e.target.result;
                        };
                    })(img);

                    reader.readAsDataURL(file);
                    chosenPhotos.appendChild(img);
                }
            }
        });
    </script>

</body>

</html>