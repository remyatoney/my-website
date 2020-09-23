<?php include_once './includes/navbar-header.inc.php';?>
    <div class="container">  
        <div class="row row-content align-items-center">
        	<div class="col-12 col-sm-2">
				<h2>About Me</h2>
	        </div>
	        <div class="col-12 col-sm-8 offset-sm-1">
	        	<div class="media">
                    <?php
                        $adminObj = new AdminView();
                        $adminObj->showprofileimg();
                    ?>       
	                <div class="media-body">
                        <h4 class="mt-0">Reshma Emmanuel</h4>
                        <p class="d-none d-sm-block">Self taught home baker cum cook and a mum of two. Cooking has been my passion since time immemorial; 
                            I have seen my mother cooking, and have always wished I was in her place. Cooking to me has come as second nature. 
                            I believe I have a uniques skill set as far as cooking is concerned, not because I can cook everything, 
                            but because whatever I cook is always appreciated and liked by others.
                        </p>
	                </div>
                </div>
                <?php
                    if (isset($_SESSION['userUid'])) {
                        if ($_SESSION['userUid'] == "Admin")
                        {
                            $adminObj->showbutton();                           
                        }
                    }
                ?>
	        </div>
        </div>
    </div>
<?php include_once './includes/footer.inc.php';?>