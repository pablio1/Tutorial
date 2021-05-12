<?php
    include_once './config/config.php';
    include './includes/header.php';
?>
<body>
    <div class="row justify-content-center">
        <div class="col-lg-3">
            <?php
                if(isset($_POST['btnSave']))
                {
                    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
                    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
                    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
                    $address = mysqli_real_escape_string($conn, $_POST['address']);
                    $username = mysqli_real_escape_string($conn, $_POST['username']);
                    $password = mysqli_real_escape_string($conn, $_POST['password']);

                    if(mysqli_query($conn, "INSERT INTO users (firstname,lastname,contact,address,username,`password`) VALUES ('$firstname','$lastname','$contact','$address','$username','$password')"))
                        echo "Success";
                }
            ?>
            <form method="POST">
                <h3>Personal Information</h3>
                <div class="form-group mt-1">
                    <input type="text" name="firstname" placeholder="Firstname" class="input form-control"/>
                </div>
                <div class="form-group mt-1">
                    <input type="text" name="lastname" placeholder="Lastname" class="input form-control"/>
                </div>
                <div class="form-group mt-1">
                    <input type="text" name="contact" placeholder="Contact" class="input form-control"/>
                </div>
                <div class="form-group mt-1">
                    <input type="text" name="address" placeholder="Address" class="input form-control"/>
                </div>
                <hr class="mt-5"></hr>
                <h3>Account Information</h3>
                <div class="form-group mt-1">
                    <input type="text" name="username" placeholder="Username" class="input form-control"/>
                </div>
                <div class="form-group mt-1">
                    <input type="text" name="password" placeholder="Password" class="input form-control"/>
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