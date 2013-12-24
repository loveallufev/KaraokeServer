<?php
/**
 * File : Product.php
 * User : loveallufev
 * Date:  5/22/13
 * Group: Hieu-Trung
*/


class Controller_Product extends Core_Controller{

    /**
     * @var : the real controller to handle action of each merchant
     */
    private $merchant_controller;

    /**
     * Action display index page
     * @param $param
     */
    public function indexAction($param){
        $this->view->title = 'Amazons Product Tracking';
        $this->view->header = (new Core_View('header'))->render(FALSE);
        $this->view->footer = (new Core_View('footer'))->render(FALSE);
        $this->view->body = 'Index page here';
        $this->view->setTemplate('product');
        $this->view->render();
    }

    /**
     * Action view detail of a product
     * @param $param
     */
    public function viewAction($param){
        if (!isset($param['active']) || !isset($param['id'])){
            return $this->indexAction($param);
        }


        // create controller of merchant (which has already declared in config file)
        $this->merchant_controller = new Core::$config['modules']['merchant'][$param['active']]['class']();

        // check if product has been tracked or not
        // if yes, display the information from database
        $param['tracked'] = FALSE;
        if (Model_Product::checkExistProductByID($param['id'], $param['active'])){
            $param['tracked'] = TRUE;
            Controller_Product::getTrackedPriceOfProduct($param['id']);
            $param['type_of_price'] = Model_Product::getPriceTypeOfProduct($param['id']);

            $temp=array();
            foreach ($param['type_of_price'] as $key => $value){
                array_push($temp, sprintf("['%s' , '%s']", $key, $value));
            }
            $param['type_of_price'] = '[' . implode(',', $temp) . ']';
        }

        // call viewAction of each merchant's controller


        $this->merchant_controller->viewAction($param);



        // if no, display the information from amazon or ebay...
        //$this->view->title = 'Product Tracking';
        //$this->view->setTemplate('');


    }

    /**
     * Tracking a product
     * @param $param : containt ID of product we want to keep track
     */
    public function trackAction($param){
        echo "Tracking of Product";
        if (!isset($param['id'])){
            return;
        }

        $product_code = $param['id'];
        $merchant = $param['site'];

        $product_name = rawurldecode($param['name']);

        // if we've already tracked this product, simply skip it
        if (Model_Product::checkExistProductByID($product_code, $merchant)){
            $param['tracked'] = TRUE;
        }
        else
        {
            // create controller of merchant (which has already declared in config file)
            $this->merchant_controller = new Core::$config['modules']['merchant'][$param['site']]['class']();

            if (isset($_SESSION['product'])){
                $product = $_SESSION['product'];
            }
            else{
                $product = $this->merchant_controller->lookupAction($param);
            }

            if ($this->merchant_controller->trackAction($product)){
                echo "<pre>". "Track OK" ."</pre>";
            }
            else
                echo "Add product to track fail";
        }

        $param['active']=$merchant;
        $this->viewAction($param);
    }

    public static function getTrackedPriceOfProduct($productID){
        Model_Product::getTrackedPrices($productID);
    }

    public function getPriceAction($param){
        if (!isset($param['id']) || (!isset($param['type']))){
            return null;
        }

        $p = Model_Product::getTrackedPricesByType($param['id'], $param['type'])->price;

        header('Content-type: application/json');
        echo $_GET['callback'] . '(';
        echo "[";
        $temp = array();
        foreach($p[$param['type']] as $time=>$price){
            array_push($temp, sprintf("[%d, %f]", Lib_Utility::wp_mktime($time)*1000, $price));
        }
        $temp = implode(',', $temp);
        echo $temp;
        //echo json_encode($p[$param['type']]);
        echo "]";
        echo ");";


        return;
    }

}