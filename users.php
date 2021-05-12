<?php
    include_once './config/config.php';
    include './includes/header.php';
?>
<body>
    <div class="row">
        <div class="col-md-8">
            <?php
                if(isset($_GET['deleteid']))
                {
                    $userid = mysqli_real_escape_string($conn, $_GET['deleteid']);
                    $query = "DELETE FROM users WHERE userid = '$userid'";
                    $result = mysqli_query($conn, $query);

                    $query = "DELETE FROM school WHERE userid = '$userid'";
                    if(mysqli_query($conn, $query) && $result)
                        echo "Successfully deleted!";
                }
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>School</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM users INNER JOIN school ON users.userid = school.userid";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result))
                        {
                            echo "
                                <tr>
                                    <td>".$row['firstname']."</td>
                                    <td>".$row['lastname']."</td>
                                    <td>".$row['contact']."</td>
                                    <td>".$row['address']."</td>
                                    <td>".$row['school_name']."</td>
                                    <td>".$row['course']."</td>
                                    <td>".$row['year']."</td>
                                    <td>
                                        <a href='edit.php?userid=".$row['userid']."'>Edit</a> 
                                        <a href='users.php?deleteid=".$row['userid']."'>Delete</a>
                                    </td>
                                </tr>
                            ";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<?php
    include './includes/footer.php';
?>