<?php

class Default_Controllers_Care extends Libs_Controller {

    public function __construct() {
        parent::__construct();
        //Đã có thuộc tính view của cha
    }

    public function index() {

        $this->view->render('care/index');
    }
   
}

?>