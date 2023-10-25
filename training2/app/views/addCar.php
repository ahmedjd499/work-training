<!DOCTYPE html>
<html>
<head>
    <title>Add Car</title>
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <link rel="icon" href="public/logo.png" type="image/x-icon">

</head>
<body>

    <form action="index.php?action=addCar" method="POST" enctype="multipart/form-data" class="car-form flex-col">
        <h1 class="form-title">Add Car</h1>

        <input type="text" name="marque" required placeholder="Enter a car marque" class="form-input" id="car-marque">
        <input type="text" name="model" required placeholder="Enter a car model" class="form-input" id="car-model">
        <input type="number" name="hourly_price" required placeholder="Enter an hourly price" class="form-input" id="hourly-price">

        <input type="file" multiple placeholder="Choose the car photos" name="file[]" accept="image/*" class="form-input" id="file">

        <h4>uploaded photos</h1>
    <div class="chosen_photos" id="chosen-photos">no photos was uploaded</div>

        <div class="flex-row">
            <button type="submit" class="btn">add  Car</button>
            or
            <a href="index.php?action=admin&whereTo=cars" class="link">cancel</a>
        </div>
    </form>

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
