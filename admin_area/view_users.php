
    <div class="container">
        <h1 class="text-info mt-5 mb-4" style="margin-left: 40%;">View Users</h1>
        <table class="table table-striped table-bordered text-center text-light">
            <tr class="bg-info">
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $get_users = "SELECT * FROM `user_table`";
            $run_query = mysqli_query($con, $get_users);
            while ($row_users = mysqli_fetch_array($run_query)) {
                $user_id = $row_users['user_id'];
                $user_name = $row_users['username'];
                $user_email = $row_users['user_email'];
                $user_address = $row_users['user_address'];
                $user_mobile = $row_users['user_mobile'];
                $user_image = $row_users['user_image'];
            ?>
                <tr class="bg-dark">
                    <td><?php echo $user_id; ?></td>
                    <td><?php echo $user_name; ?></td>
                    <td><?php echo $user_email; ?></td>
                    <td><?php echo $user_mobile; ?></td>        
                    <td style="max-width: 20ch; overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo $user_address; ?></td>
                    <td><img src="../user_area/user_images/<?php echo $user_image; ?>" height="50px" width="50px"></td>
                    <td><a href="edit_user.php?edit_user=<?php echo $user_id; ?>"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a></td>
                    <td><a href="delete_user.php?delete_user=<?php echo $user_id; ?>"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>