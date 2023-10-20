<?php

// Check if the user is logged in
if (!isset($_COOKIE['user'])) {
    // If the user is not logged in, you can redirect them to the login page
    header('Location: index.php?action=login');
    exit;
}

if (!(unserialize($_COOKIE['user'])['role'] == "admin")) {
    // If the user is not logged in, you can redirect them to the login page
    header('Location: ./views/accessDinied.php');
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

</head>

<body>
    <div class="main">
        <aside class="aside">

            <a class="nav" href="#" onclick="loadContent('index.php?action=profile');">My Profile</a>
            <a class="nav" href="#" onclick="loadContent('index.php?action=allUsers');"> Users</a>
            <a class="nav" href="#" onclick="loadContent('index.php?action=allCars');"> cars</a>
            <a class="nav" href="#" onclick="loadContent('index.php?action=allRents');"> rents</a>
            <a class="nav" href="#" onclick="loadContent('index.php?action=calendar');">calender</a>
            <a class="nav" href="index.php?action=logout">log out</a>

        </aside>
        <div class="xx">


            <div class="content">
               
                <?php 
                    if(isset($_GET['whereTo']) && $_GET['whereTo']=='cars')
                  {  
                      echo "<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>";
                      echo "<script>
                    function loadContent(page) {
                        $.ajax({
                            url: page,
                            type: 'GET',
                            success: function(data) {
                                $('.content').html(data);
                            },
                            error: function() {
                                // Handle the error case, e.g., show an error message.
                                alert('Error loading content.');
                                }
                                });
                            }
                          </script>" ;
                     echo"  <script>loadContent('index.php?action=allCars');</script>" ;
                    }
                    else include_once('usersList.php')
                ?>

            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tab').DataTable();
        });
    </script>
    <script>
        function loadContent(page) {

            $.ajax({
                url: page,
                type: 'GET',
                success: function(data) {
                    // Replace the content of the "content" div with the response from the server.
                    $('.content').html(data);
                },
                error: function() {
                    // Handle the error case, e.g., show an error message.
                    alert('Error loading content.');
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {

            // Handle form submission
            $("#form").on("submit", function(event) {
                event.preventDefault(); // Prevent the default form submission
                // Serialize the form data to send in the request
                var formData = $(this).serialize();

                $.ajax({
                    url: 'index.php?action=search', // URL for your search action
                    type: 'POST', // Use POST method to send the form data
                    data: formData,
                    success: function(data) {
                        // Replace the content of the "content" div with the response from the server.
                        $('.content').html(data);
                    },
                    error: function() {
                        // Handle the error case, e.g., show an error message.
                        alert('Error loading content.');
                    }
                });
            });
        });


        // Function to handle the AJAX request
        function performSearch() {
            // Serialize the form data to send in the request
            var formData = $("#form").serialize();

            $.ajax({
                url: 'index.php?action=search', // URL for your search action
                type: 'POST', // Use POST method to send the form data
                data: formData,
                success: function(data) {
                    // Replace the content of the "content" div with the response from the server.
                    $('.content').html(data);
                },
                error: function() {
                    // Handle the error case, e.g., show an error message.
                    alert('Error loading content.');
                }
            })
        }
    </script>

</body>

</html>