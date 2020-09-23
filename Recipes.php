<?php 
    include_once './includes/navbar-header.inc.php';
?>
    <div class="container">  
    	<div class="row row-content">
    	    <div class="col">
 				<div id="mycarousel" class="carousel slide" data-ride="carousel">
 					<div class="carousel-inner" role="listbox">
                       <div class="carousel-item active">
                           	<a href="./showrecipe.php?id=2"><img class="d-block img-fluid" src="img1/pic2" alt="Baked Fish">
                            <div class="carousel-caption d-none d-md-block">
                                <h4>Baked Fish</h4>
                                <p class="d-none d-sm-block">My favourite dish when it comes to an in-house dinner date cos its fancy, tasty 
                                    and most importantly very easy to make.
	                			</p>
                            </div></a>
                        </div>
                    	<div class="carousel-item">
                            <a href="./showrecipe.php?id=3"><img class="d-block img-fluid" src="img1/pic3" alt="Crispy prawn toast">
                        	<div class="carousel-caption d-none d-md-block">
                                <h4>Crispy prawn toast</h4>
	                			<p class="d-none d-sm-block">This crispy, crunchy , flavourful toast is a great party starter. You'll have 
                                no clue what you're holding till you put that first bite in your mouth.
	  					  	  	</p>
                            </div></a>    
                    	</div>
                   	 	<div class="carousel-item">
                        	<a href="./showrecipe.php?id=4"><img class="d-block img-fluid" src="img1/pic4" alt="Chocolate Chip Cookies">
                        	<div class="carousel-caption d-none d-md-block">
	                    		<h4>Chocolate Chip Cookies</h4>
	                    		<p class="d-none d-sm-block">Nothing better than a fresh batch of soft, warm, chewy chocolate chip
                                    cookies to celebrate a sunday evening.
		                    	</p>
	                        </div></a>
	                	</div>
	                </div>
                	<ol class="carousel-indicators">
	                    <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
	                    <li data-target="#mycarousel" data-slide-to="1"></li>
	                    <li data-target="#mycarousel" data-slide-to="2"></li>
                 	</ol>
            	</div>
            	<a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
                   <span class="carousel-control-next-icon"></span>
                </a>
                <button class="btn btn-danger btn-sm" id="carouselButton">
                    <span id="carousel-button-icon" class="fa fa-pause"></span>
                </button>
            </div>
        </div>
        <div class="row">
        <h2 style="color: #2A858A" class="mr-auto">Recipes</h2>
        <form action="search.php" method="POST" class="mr-5">
            <input type="text" name="search" placeholder="Search in recipes">
            <button type="submit" name="submit-search" style="background-color: #5AAAAE; color: floralwhite;">Search</button>
        </form>
        </div>
        <div class="row row-content align-items-center">    
            <?php
                $recipesObj = new RecipesView();
                $recipesObj->showrecipeimg();
            ?>       
        </div>
        <?php
            if (isset($_SESSION['userUid'])) {
                if ($_SESSION['userUid'] == "Admin") {
                    echo '<div class="contact mt-4 mb-4">
                            <h4 style="color: #2A858A">Upload</h4>';
                    if (isset($_GET["error"])) {
                        if($_GET["error"] == "emptyfields") {
                            echo '<p class="signuperror">Fill in all fields!</p>';
                        }
                        elseif($_GET["error"] == "bigfile") {
                            echo '<p class="signuperror">File Size is too big!</p>';
                        }
                        elseif($_GET["error"] == "fileerror") {
                            echo '<p class="signuperror">File is erroneous!</p>';            
                        }
                        elseif($_GET["error"] == "improperfiletype") {
                            echo '<p class="signuperror">You need to upload a proper file type(jpg, jpeg or png)!</p>';            
                        }
                        elseif (isset($_GET["upload"])) {
                            if ($_GET["upload"] == "success") {
                                echo '<p class="signupsuccess">Upload successful!</p>';
                            }
                        }
                    }
                    echo '<form action="includes/recipes-upload.inc.php" method="POST" enctype="multipart/form-data">
                                <p>
                                <label for="exampleFileName3">File Name</label>
                                <input type="text" name="filename" id="exampleFileName3" placheholder="New file name" style="width: 250px;"><br> 
                                </p>
                                <p>
                                <label for="exampleTitle3">Title</label><br>
                                <input type="text" name="title" id="exampleTitle3" placeholder="Image title" style="width: 250px;"><br> 
                                </p>
                                <p>
                                <label for="exampleDescription3">Description</label>
                                <input type="text" name="descRecipe" id="exampleDescription3" placeholder="Image description" style="width: 250px;"><br> 
                                </p>
                                <p>
                                <label for="exampleRecipe3">Recipe</label>
                                <textarea name="recipe" id="exampleRecipe3" style="width: 250px; height: 300px;"></textarea><br>
                                </p>
                                <p class="ml-5">
                                <input type="file" name="file">
                                </p>
                                <p>
                                <button type="submit" name="submit" class="btn btn-sm ml-1" style="background-color: #0B6A6F; color: floralwhite;">Upload</button>
                                </p>    
                            </form>
                            </div>';
                }
            }
        ?>
    </div>
<?php include_once './includes/footer.inc.php';?>
