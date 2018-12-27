<?php

class Default_Models_Advertise {

    public $advertiseId;
    public $advertiseName;
    public $description;
    public $image;
    
    private $con = null;

    public function __construct($db) {
        $this->con = $db;
    }

    public function getAllSlide() {
        $query = "SELECT advertiseId, image FROM advertises WHERE classify = 'slide'";
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return $stmt;
        } else {
            return null;
        }
    }
    public function getAllImage1() {
        $query = "SELECT advertiseID, image FROM advertises WHERE classify = 'quangcao1'";
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return $stmt;
        } else {
            return null;
        }
    }
        public function getAllImage2() {
            $query = "SELECT advertiseId, image FROM advertises WHERE classify = 'quangcao2'";
            $stmt = $this->con->prepare($query);
            $stmt->execute();
    
            $rowCount = $stmt->rowCount();
            if ($rowCount > 0) {
                return $stmt;
            } else {
                return null;
            }
    }
    public function getAllVideo1() {
        $query = "SELECT advertiseID, source,advertiseName FROM advertises WHERE classify = 'video1'";
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return $stmt;
        } else {
            return null;
        }
}




    
}
?>

