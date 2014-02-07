<?php
/**
 * Created by PhpStorm.
 * User: loveallufev
 * Date: 2/6/14
 * Time: 2:42 AM
 */

class Controller_Record  extends  Core_Controller{

    public function listenAction($param){
        $id = $param['id'];


        $this->view->record = Model_Record::getRecordByID($id);

        $this->view->related = Model_Record::getRelatedRecordByUser($this->view->record->user);

        $this->view->setTemplate('listen_to_record');



        $this->view->render();
    }
} 