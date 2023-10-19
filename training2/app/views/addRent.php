

   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   </head>
   <body>
   <form action="index.php?action=addRent" method="POST"  class="car-form">
        <h1 class="form-title">Add Rent</h1>
        <input type="datetime-local" name="rent_start" id="date_start" min="2023-10-10T00:00"  class="date-input" required>
        <input type="datetime-local" name="rent_end" id="date_end" min="2023-10-10T00:00" class="date-input" required>
        <input type="hidden" value="<?php echo $carId ?>" name='car_id'>
        <button type="submit" class="submit-button">add  rent</button>
    </form>
   </body>
   </html>