
<h1>users list</h1>




                <table class='display' id="tab">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>User photo</th>
                            <th>Email</th>
                            <th>Created at</th>
                            <th>Role</th>
                            <th> delete</th>
                            <th> update</th>
                        </tr>
                    </thead>
                    <tbody>



<?php
        // Output data of each row
        foreach ($usersList as $user) {
            $photo=(file_exists("public/uploads/" . $user['photo'])) ? $user['photo'] : 'default.png'; 
            
            echo "<tr>";
            echo "<td>" . $user["id"] . "</td>";
            echo "<td>";
            echo    "<img class='profile-image' src='public/uploads/". $photo ."' alt='Profile Image' width='100' height='100' id='user-photo'>" ;
              
              echo "</td>";
            echo "<td>" . $user["email"] . "</td>";
            echo "<td>" . $user["created_at"] . "</td>";
            echo "<td>" . $user["role"] . "</td>";

            echo "<td> <a href='index.php?action=delete&id=" . $user['id'] . "'style='border:1px solid red;color:red'>delete</a></td>";
            echo "<td> <a href='index.php?action=adminEdit&id=" . $user['id'] . "'style='border:1px solid rgb(0, 120, 205);color:rgb(0, 120, 205)'>update</a></td>";
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