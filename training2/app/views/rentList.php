<style>

.head{
    display: flex;
    align-items: center;
    justify-content: space-between;
}

td{
    border-left: 1px solid gray;
}
</style>


<div class="head">


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
?>
        
        </tbody>
                </table>

                <script >
        $(document).ready(function() {
            $('#tab').DataTable();
        });

    </script>
