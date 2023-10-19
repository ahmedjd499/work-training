
<style>
    .profile-image{
        width: 3rem;
        height: 3rem;
        overflow: hidden;
        object-fit: cover;
        border-radius: 50%;
    }
</style>
<h1>users list</h1>

<form action="" id="form" method="POST" class="searchForm">
    <div class="form-row">
        <input type="text" placeholder="Search for users" name="search" id="searchInput" required onkeyup="performSearch()" class="search-input">
        <select name="role_filter" id="role_filter" class="filter-select">
            <option value="">any</option>
            <option value="admin">admin</option>
            <option value="user">user</option>
        </select>
        <label for="date_filter" class="date-label">Create between</label>
        <input type="datetime-local" name="date_start" id="date_start" min="2023-10-10T00:00" value="2023-10-10T00:00" class="date-input">
        <input type="datetime-local" name="date_end" id="date_end" min="2023-10-10T00:00" class="date-input">
        <button type="submit" class="search-button">Search</button>
    </div>
</form>


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
            echo    "<img class='profile-image' src='public/uploads/". $photo ."' alt='Profile Image' width='100' height='100' id='photo'>" ;
              
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