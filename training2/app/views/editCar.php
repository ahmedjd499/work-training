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
    <title>Edit Profile</title>
    <style>
        h1 {
            text-align: center;
        }

        .form-container {
            /* Adjust the max-width as needed */
            max-width: 50rem;
            margin: 0 auto;
            padding: 1rem;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .form-container form {
            padding: 1rem;
        }



        label {
            display: block;
            margin: 15px;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px auto;
            border: 1px solid #ccc;
            border-radius: 4px;
        }




        input[type="submit"] {
            background-color: #0074cc;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 10px auto;
        }

        input[type="submit"]:hover {
            background-color: #0056a4;
        }

        #PhotosContainer {
            width: 100%;
            background-color: white;
            outline: 1px solid #ccc;
            margin: 0 auto;

        }

        #h1,
        #closebtn {
            display: none;
        }

        .chosen-image{
    width: 10rem;
    height: 10rem;
    margin: 1rem;
    object-fit: cover;
    border-radius: 0.5rem;
    padding: 5px;
    outline:1px solid plum

}

.chosen_photos{
    min-height: 5rem;
    outline: 1px solid #ccc;
    margin: 0.5rem;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}
    </style>
</head>

<body>
    <h1>Edit Profile</h1>

    <div class="form-container">
        <form method="post" action="index.php?action=editCar&id=<?php echo $car['id']; ?>" enctype="multipart/form-data" class='ff'>

            <label for="model">New model:</label>
            <input type="text" name="model" value="<?php echo $car['model']; ?>" required><br>
            <label for="marque">New marque:</label>
            <input type="text" name="marque" value="<?php echo $car['marque']; ?>"><br>
            <label for="hourly_price">Hourly price:</label>
            <input type="text" name="hourly_price" value="<?php echo $car['hourly_price']; ?>"><br>


            <input type="file" name="file[]" accept="image/*" id="file" multiple>
            <h1>uploaded photos</h1>
    <div class="chosen_photos" id="chosen-photos">no photos was uploaded</div>
    <h1>old photos</h1>

            <div id='PhotosContainer'>

            </div>
            <input type="submit" value="Save Changes">
        </form>
    </div>
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