<?php
    include_once './includes/navbar-header.inc.php';
?>    

<div class="contact mt-4 mb-4">
    <?php
        if (isset($_GET["error"])) {
            if($_GET["error"] == "emptyfields") {
                echo '<p class="signuperror">Fill in all fields!</p>';
            }
            elseif($_GET["error"] == "invailuidmail") {
                echo '<p class="signuperror">Invalid username and email! </p>';
            }
            elseif($_GET["error"] == "invaliduid") {
                echo '<p class="signuperror">Invalid username!</p>';
            }
            elseif($_GET["error"] == "invalidmail") {
                echo '<p class="signuperror">Invalid email!</p>';
            }
            elseif($_GET["error"] == "passwordcheck") {
                echo '<p class="signuperror">Your passwords do not match!</p>';
            }
            elseif($_GET["error"] == "usertaken") {
                echo '<p class="signuperror">Username is already taken!</p>';
            }
        }
        elseif (isset($_GET["signup"])) {
            if ($_GET["signup"] == "success") {
            echo '<p class="signupsuccess">Signup successful!</p>';
            }
        }    
        if (!isset($_GET["signup"])) {?>
            <h4 style="color: #2A858A">Signup</h4>
            <form action="includes/signup.inc.php" method="POST">
                <p>
                    <label for="exampleInputUsername3">Username:</label><br>
                    <input type="text" name="uid" id="exampleInputUsername3" placeholder="Enter Username" value=
                    <?php if ((isset($_GET["error"])) && ($_GET["error"] == "emptyfields")) { 
                                echo $_GET['uid'];       
                            }
                            elseif ((isset($_GET["error"])) && ($_GET["error"] == "invalidumail")) {
                                echo $_GET['uid'];  
                            }
                            if ((isset($_GET["error"])) && ($_GET["error"] == "passwordcheck")) { 
                                echo $_GET['uid'];       
                            }
                    ?>>
                </p> 
                <p>
                    <label for="exampleInputEmail3">Email:</label><br>
                    <input type="email" name="mail" id="exampleInputEmail3" placeholder="Enter Email" value=
                    <?php if ((isset($_GET["error"])) && ($_GET["error"] == "emptyfields")) {
                                echo $_GET['mail'];}
                            elseif ((isset($_GET["error"])) && ($_GET["error"] == "invaliduid")) {
                            echo $_GET['mail'];}
                            elseif ((isset($_GET["error"])) && ($_GET["error"] == "passwordcheck")) {
                                echo $_GET['mail'];}
                    ?>>
                </p>
                <p>
                    <label for="exampleInputPassword3">Password:</label><br>
                    <input type="password" name="pwd" id="exampleInputPassword3" placeholder="Enter Password">
                </p>
                <p>
                    <label for="exampleInputRPassword3">Repeat Password:</label>
                    <input type="password" name="pwd-repeat" id="exampleInputRPassword3" placeholder="Repeat Password">
                </p>
                <p>
                    <button type="submit" name="signup-submit">Sign Up</button>
                <p>
            </form> <?php 
        } 
    ?>
</div>

<?php
    include_once './includes/footer.inc.php';
?>    
