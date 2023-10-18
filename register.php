<?php
require_once('headerCus.php');
include_once('connect.php');
if (isset($_POST['btnRegister'])) {
    $c = new Connect();
    $dblink = $c->ConnectToPDO();

    $username = $_POST['set_username'];
    $password = $_POST['set_password'];
    $email = $_POST['email'];
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];

    $sql = "INSERT INTO `Users` (`username`, `password`, `email`, `full_name`, `address`, `phone_number`,`role`) VALUES (?, ?, ?, ?, ?, ?,?)";
    $re = $dblink->prepare($sql);
    $valueArray = [$username, $password, $email, $full_name, $address, $phone,$role];
    $stmt = $re->execute($valueArray);

    if ($stmt) {
        echo "Congratulations";
    } else {
        echo "Registration failed";
    }
}
?>
<body>
    <div class="container">
        <h2>Member Registration</h2>
        <form id="formreg" class="formreg" name="formreg" role="form" method="post">
            <div class="mb-3">
                <label for="set_username" class="form-label">Username:</label>
                <input id="usrname" type="text" name="set_username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="set_password" class="form-label">Password:</label>
                <input type="password" name="set_password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name:</label>
                <input type="text" name="full_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" name="address" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number:</label>
                <input type="tel" name="phone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role:</label>
                <input type="tel" name="role" class="form-control" required>
            </div>
            <div class="mb-3">
                <div class="d-grid col-6 mx-auto">
                    <input type="submit" name="btnRegister" value="Register" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<?php
require_once('footer.php');
?>