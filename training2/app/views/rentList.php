


<div class="flex-row">


<h1 >rents list</h1>

</div>
                <table class='display' id="tab">
                    <thead>
                        <tr>
                            <th>Rent ID</th>
                            <th>User Email</th>
                            <th>Car ID</th>
                            <th>Car Model</th>
                            <th>Car Marque</th>
                            <th>Hourly Price</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>



<?php
if(count($rentList)>0)
        // Output data of each row
        foreach ($rentList as $rent) {
            
            echo "<tr>";
            echo "<td>" . $rent["id"] . "</td>";
            echo "<td>" . $rent["email"] . "</td>";
            echo "<td>" . $rent["id"] . "</td>";
            echo "<td>" . $rent["model"] . "</td>";
            echo "<td>" . $rent["marque"] . "</td>";
            echo "<td>" . $rent["hourly_price"] . " $</td>";
            echo "<td>" . $rent["rent_start"] . "</td>";
            echo "<td >" . $rent["rent_end"] . "</td>";
            echo "<td >" . $rent["total_price"] . " $</td>";
            echo "</tr>";
        }
else echo 'no rents is booked yet' ;
?>
        
        </tbody>
                </table>

                <script >
        $(document).ready(function() {
            $('#tab').DataTable();
        });

    </script>
