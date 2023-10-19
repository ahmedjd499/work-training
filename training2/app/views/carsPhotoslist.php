
<style>
.car_img{
    width: 10rem;
    height: 10rem;
    margin: 1rem;
    object-fit: cover;
    border-radius: 0.5rem;
    padding: 5px;
    outline:1px solid plum

}

.car-imgs{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}
.delbtn{
    position: relative;
    text-align: center;
    top:-5rem;
    left: -2rem;
    width: 1rem;
    height: 1rem;
    outline: 1px solid black;
    border-radius: 50%;
    font-size: 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color:rosybrown;
    color: white;
    padding: 5px;
    cursor: pointer;
}

</style>
<div class="car-imgs">

    <h1 id='h1'>car : photos   </h1>
    <button type=button style='cursor:pointer;margin:0.5rem;padding:0.5rem'  id='closebtn'>❌</button><br>
<?php
if(count($carsPhotosList)>0)
        foreach ($carsPhotosList as $carImg) {
            if(file_exists("public/car-photos/".$carImg['path']))
             echo "<img src='public/car-photos/".$carImg['path']."' alt='Car' class='car_img'>" ;
   echo " <a   class='delbtn' onclick=deletecarPhoto('index.php?action=deleteCarPhoto&id=".$carImg['id'].'&car_id='.$carImg['car_id']."')>x</a><br>" ;

        }
  else echo "this car has no photos"      
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