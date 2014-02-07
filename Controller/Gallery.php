<?php
/**
 * Created by PhpStorm.
 * User: loveallufev
 * Date: 2/7/14
 * Time: 12:58 AM
 */

class Controller_Gallery extends Core_Controller {

    public function indexAction($param){
        $this->view->setTemplate('gallery');
        $this->view->render();
    }
} 