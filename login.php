<?php include_once './includes/navbar-header.inc.php';?>
<div class="contact mt-4 mb-4">
<?php
    if (isset($_GET["error"])) {
        if($_GET["error"] == "emptyfields") {
            echo '<p class="signuperror">Fill in all fields!</p>';
        }
        elseif($_GET["error"] == "wrongpassword") {
            echo '<p class="signuperror">Password is incorrect!</p>';
        }
        elseif($_GET["error"] == "userdoesnotexist") {
            echo '<p class="signuperror">User does not exist!</p>';            }
        }
        elseif (isset($_GET["login"])) {
            if ($_GET["login"] == "success") {
            echo '<p class="signupsuccess">Login successful!</p>';
        }
    }
    if (!isset($_GET["login"])) {?>
        <h4 style="color: #2A858A">Login</h4>
        <form action="includes/login.inc.php" method="POST">
            <p>
                <label for="exampleInputEmail3">Username</label>
                <input type="text" name="uid" id="exampleInputEmail3" placeholder="Enter Username or Email Id" style="width: 250px;"><br> 
            </p>
            <p>
                <label for="exampleInputPassword3">Password</label>
                <input type="password" name="pwd" id="exampleInputPassword3" placeholder="Enter Password" style="width: 250px;"><br>
            </p>
            <p>
                <a href="signup.php" style="text-decoration: none; color: #0B6A6F;"> New user? Sign up!</a>
                <button type="button" class="btn btn-secondary btn-sm ml-auto" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm ml-1" style="background-color: #0B6A6F; color: floralwhite;" name="login-submit">Sign in</button>   
            </p>   
        </form> <?php
    }
?>
</div>
<?php include_once './includes/footer.inc.php';?>