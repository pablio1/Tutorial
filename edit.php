<?php
    include_once './config/config.php';
    include './includes/header.php';
?>
<body>
    <div class="row justify-content-center">
        <div class="col-lg-3">
            <?php

                if(isset($_GET['userid']))
                {
                    $userid = mysqli_real_escape_string($conn, $_GET['userid']);
                    $query = "SELECT * FROM users WHERE userid = '$userid'";
                    $result = mysqli_query($conn, $query);
                    $data = mysqli_fetch_array($result);
                }

                if(isset($_POST['btnSave']))
                {
                    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
                    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
                    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
                    $address = mysqli_real_escape_string($conn, $_POST['address']);
                    $query = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', contact = '$contact', address = '$address' WHERE userid = '$userid'";
                    if(mysqli_query($conn, $query))
                        echo "Successfulyy updated!";
                }
            ?>
            <form method="POST">
                <h3>Personal Information</h3>
                <div class="form-group mt-1">
                    <input type="text" name="firstname" value="<?php echo $data['firstname'] ?>" placeholder="Firstname" class="input form-control"/>
                </div>
                <div class="form-group mt-1">
                    <input type="text" name="lastname" value="<?php echo $data['lastname'] ?>" placeholder="Lastname" class="input form-control"/>
                </div>
                <div class="form-group mt-1">
                    <input type="text" name="contact" value="<?php echo $data['contact'] ?>" placeholder="Contact" class="input form-control"/>
                </div>
                <div class="form-group mt-1">
                    <input type="text" name="address" value="<?php echo $data['address'] ?>" placeholder="Address" class="input form-control"/>
                </div>
                <div class="form-group mt-5">
                    <button class="btn btn-primary" name="btnSave">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>
<?php
    include './includes/footer.php';
?>