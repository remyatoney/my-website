<?php

class AdminModel extends Dbh {
    protected function getadminimg() {
        $sql = "SELECT * FROM profileimg WHERE username='Admin';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }    
    protected function removeadminimg() {
        $sql = "UPDATE profileimg SET statusid=0, imgname='NIL' WHERE username='Admin'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }
    protected function addadminimg($fileNameNew) {
        $sql = "UPDATE profileimg SET statusid=1, imgname='$fileNameNew' WHERE username='Admin';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }
}