<?php
    $error=[];
    $missing=[];
    if(isset($_POST['submit'])) {
        $expected=['name','email','question'];
        $required=['name','email','question'];
        require './includes/process.inc.php';
    }
    include_once './includes/navbar-header.inc.php';
?>

    <div class="contact mt-4 mb-4">  
        <h3 style="color: #2A858A">Contact Me</h3>
        <?php if($error || $missing) :?>
        <p class="warning">Please fix the items indicated</p>
        <?php endif;?>
        <form action="<?= $_SERVER['PHP_SELF'];?>" method="POST">
            <p>
                <label for="name" style="color: #2A858A"> Name:</label><br>
                <input type="text" name="name" id="name"
                    <?php
                        if ($error || $missing) {
                            echo 'value="' . htmlentities($name) . '"';
                        }
                    ?>
                >
                <?php if ($missing && in_array('name', $missing)) : ?>
                <span class="warning">Please enter your name</span>
                <?php endif; ?>
            </p>
            <p>
                <label for="email" style="color: #2A858A"> Email:</label><br>
                <input type="email" name="email" id="email" placeholder="xyz@example.com"
                <?php
                    if ($error || $missing) {
                        echo 'value="' . htmlentities($email) . '"';
                    }
                ?>
                >
                <?php if ($missing && in_array('email', $missing)) : ?>
                <span class="warning">Please enter your email address</span>
                <?php endif; ?>
            </p>
            <p>
                <label for="question" style="color: #2A858A">Have a question? Ask me here..</label>
                <textarea name="question" id="question" placeholder="Have a question? Ask me here..">
                <?php
                    if ($error || $missing) {
                        echo htmlentities($question);
                    }
                ?>
                </textarea>
                <?php if ($missing && in_array('question', $missing)) : ?>
                <span class="warning">You forgot to add a question</span>
                <?php endif; ?>
            </p>
            <p>
                <input type="submit" name="submit" id="submit" value="Send your question"  style="background-color: #0B6A6F; color: floralwhite;">
            </p>
        </form>
        <?php
            if(isset($_POST['submit']) && !$error && !$missing) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $question = $_POST['question'];
                $contactObj = new ContactContr();
                $contactObj->insertquestion($name, $email, $question);
                echo "Thank you for the feedback. Successfully stored your question into the database.";
            }
        ?>
    </div>
<?php include_once './includes/footer.inc.php';?>
