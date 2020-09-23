<?php

class AdminContr extends AdminModel {
    public function deleteprofileimg() {
        $this->removeadminimg();
    }
    public function insertprofileimg($fileNameNew) {
        $this->addadminimg($fileNameNew);
    }
}