


<style>

.head{
    display: flex;
    align-items: center;
    justify-content: space-between;
}


</style>


<div class="head">


<h1 >My rents list</h1>

</div>
                <table class='display' id="tab">
                    <thead>
                        <tr>
                            <th> car marque</th>
                            <th>car model</th>
                            <th>hourly price</th>
                            <th>rent start</th>
                            <th>rent end</th>
                            <th>Total price</th>
                        </tr>
                    </thead>
                    <tbody>



<?php
        // Output data of each row
        foreach ($rentList as $rent) {
            
            echo "<tr>";
            echo "<td>" . $rent["marque"] . "</td>";
            echo "<td>" . $rent["model"] . "</td>";
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
    
