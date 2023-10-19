<style>

.head{
    display: flex;
    align-items: center;
    justify-content: space-between;
}


</style>


<div class="head">


<h1 >rents list</h1>

</div>
                <table class='display' id="tab">
                    <thead>
                        <tr>
                            <th> ID</th>
                            <th>rent ID</th>
                            <th>user ID</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Total price</th>
                        </tr>
                    </thead>
                    <tbody>



<?php
        // Output data of each row
        foreach ($rentList as $rent) {
            
            echo "<tr>";
            echo "<td>" . $rent["id"] . "</td>";
            echo "<td>" . $rent["car_id"] . "</td>";
            echo "<td>" . $rent["user_id"] . "</td>";
            echo "<td>" . $rent["rent_start"] . "</td>";
            echo "<td >" . $rent["rent_end"] . "</td>";
            echo "<td >" . $rent["total_price"] . "</td>";
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
