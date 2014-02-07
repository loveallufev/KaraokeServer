<?php
/**
 * File : View.php
 * User : loveallufev
 * Date:  5/19/13
 * Group: Hieu-Trung
*/

defined('APP') or die('Access denied');

/**
 * Class Core_View: class which responsible to display output
 */
class Core_View {

    /**
     * @var var: data of view
     */
    private $data = array();

    /**
     * This is an override function
     * Assign element has key '$index' with value '$value'
     * @param $index : index of array
     * @param $value : value
     */
    public function __set($index, $value){
        $this->data[$index] = $value;
    }

    /**
     * This is an override function
     * Get element has key '$index'
     * @param $index : index of array
     */
    public function __get($index){
        if(isset($this->data[$index])){
            return $this->data[$index];
        }
        return null;
    }

    /**
     * Holds render status of view.
     */
    private $render = FALSE;

    /**
     * Accept a template to load
     */
    public function __construct($template='')
    {
        if (!empty($template)){
            $this->setTemplate($template);
        } else {
            $this->render = '';
        }
    }

    /**
     * Set template for output
     * The template will be: /View/$template.php, for example: /View/Amazon/product.php
     * @param $template: name of template file (contain html + php code to display)
     */
    public function setTemplate($template){
        $theme = '';
        if (MY_THEME != ""){
            $theme = MY_THEME . '/';
        }
        //compose file name
        $file = SERVER_ROOT . '/View/' . $theme . $template . '.php';

        if (file_exists($file))
        {
            /**
             * trigger render to include file when this model is destroyed
             * if we render it now, we wouldn't be able to assign variables
             * to the view!
             */
            $this->render = $file;
        }
    }

    /**
     * Render the output directly to the page, or optionally, return the
     * generated output to caller.
     *
     * @param $direct_output Set to any non-TRUE value to have the
     * output returned rather than displayed directly.
     */
    public function render($direct_output = TRUE){

        if (!isset($this->render)){
            return '';
        }

        // Turn output buffering on, capturing all output
        if ($direct_output !== TRUE)
        {
            ob_start();
        }

        // Parse data variables into local variables
        $data = $this->data;

        // Get template
        include($this->render);

        // Get the contents of the buffer and return it
        if ($direct_output !== TRUE)
        {
            return ob_get_clean();
        }
    }

    public function __destruct(){
    }


}