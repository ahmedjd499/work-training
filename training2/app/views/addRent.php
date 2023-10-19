

   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   </head>
   <body>
    <style>
        .rent-form{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .rent-form input{
border-radius: 0.5rem; 
margin: 0.5rem;
        }
    </style>
      <h1 class="form-title">Add Rent</h1>
   <form action="index.php?action=addRent" method="POST"  id="rent-form">
      
        <input type="datetime-local" name="rent_start" id="date_start" min="<?php echo date("Y-m-d H:i:s");?>"  class="date-input" required value="<?php echo date("Y-m-d H:i:s");?>">
        <input type="datetime-local" name="rent_end" id="date_end" min="<?php echo date("Y-m-d H:i:s");?>" class="date-input" required value="<?php echo date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +1 hour"))?>">
        <input type="hidden" value="" name='car_id'>
        <input type='hidden' value='search' name='action'>
        <button type="submit" class="submit-button">🔍</button>
    </form>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  
// Handle form submission
$("#rent-form").on("submit", function(event) {
    event.preventDefault(); // Prevent the default form submission
    // Serialize the form data to send in the request
    var formData = $(this).serialize();

    $.ajax({
        url: 'index.php?action=addRent', // URL for your search action
        type: 'POST', // Use POST method to send the form data
        data: formData,
        success: function(data) {
            // Replace the content of the "content" div with the response from the server.
            $('.freeCars').html(data);
        },
        error: function() {
            // Handle the error case, e.g., show an error message.
            alert('Error loading content.');
        }
    });
});

        
    </script>
   </body>
   </html>