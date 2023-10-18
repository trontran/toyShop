<?php
include_once('connect.php');
session_start();
if (isset($_POST['btnLogin'])) {
    if ($_POST['username'] && isset($_POST['password'])) {
        $usr = $_POST['username'];
        $pwd = $_POST['password'];
        $c = new Connect();
        $dblink = $c->connectToPDO();
        $sql = "SELECT * FROM Users WHERE username = ? and password = ?";
        $stmt = $dblink->prepare($sql);
        $re = $stmt->execute(array("$usr", "$pwd"));
        $numrow = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC); 

        if ($numrow == 1) {
            echo "Login successfully";

            $_SESSION['user_name'] = $row['username'];
            $_SESSION['user_role'] = $row['role']; 

            if ($row['role'] === 'Admin') {
                header("Location: allproduct.php"); // Điều hướng đến trang admin
            } else {
                header("Location: productForCustomer.php"); // Điều hướng đến trang người dùng
            }
        } else {
            echo "Something wrong with your info <br>";
        }
    } else {
        echo "Please enter your info";
    }
}
?>
<style>
    .login-form {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .form-container {
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 8px;
        text-align: center;
        width: 300px;
    }

    h1 {
        font-size: 24px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .input-group {
        border: 2px solid #007BFF;
        border-radius: 5px;
        display: flex;
        align-items: center;
    }

    .form-control {
        flex-grow: 1;
        border: none;
        background: none;
        outline: none;
        font-size: 15px;
    }

    .btn {
        width: 100%;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 20px;
        cursor: pointer;
        background: #007BFF;
    }

    .btn:hover {
        background: #0056b3;
    }
</style>
<body>
    <div class="login-form">
        <div class="form-container">
            <h1>Welcome</h1>
            <form action="#" method="post">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="username" id="username" placeholder="User Name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="remember" name="remember" value="remember">
                    <label for="remember">Remember</label>
                </div>
                <button type="submit" name="btnLogin" class="btn">Login</button>
            </form>
        </div>
    </div>
</body>

<?php
require_once('footer.php');
?>
