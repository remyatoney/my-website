<?php

class AdminView extends AdminModel {
    public function showprofileimg() {
        $result = $this->getadminimg();
        if ($result['statusid'] == 1) {
            echo '<img class="d-flex mr-3 img-thumbnail align-self-center" src="img1/'.$result['imgname'].'" height="200" width="200"><br>';       
        }
        else {
            echo '<img class="d-flex mr-3 img-thumbnail align-self-center" src="img1/defaultprofilepic.jpg" height="200" width="200"><br>';
        }   
    }
    public function showbutton() {
        $result = $this->getadminimg();
        if ($result['statusid'] == 0) {
            echo '<form action="updateprofimg.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <button type="btn" name="submit-update" style="background-color: #0B6A6F; color: floralwhite;">
                        Insert image</button><br><br>
                </form>';
        }
        else {
            echo '<form action="deleteprofimg.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="imgname" value="'.$result['imgname'].'">
                    <button type="btn" name="submit-delete" style="background-color: #0B6A6F; color: floralwhite;">
                        Delete image</button><br><br>
                </form>';
        }
    }
}