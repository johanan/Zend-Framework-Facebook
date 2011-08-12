<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $bootstrap = $this->getInvokeArg('bootstrap'); 
		
		
        $this->options = $bootstrap->getOptions();
		
		$this->view->options = $this->options['facebook'];
    }

}

