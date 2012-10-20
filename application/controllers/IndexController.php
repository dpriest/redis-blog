<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	$request = $this->getRequest();
    	$page = $request->getParam('page')?$request->getParam('page'):1;
    	$start = ($page-1)*10;
    	$end = $page*10;
        $redis = new Application_Model_Redis();
        $redis->addserver('localhost');
        $this->view->posts = $redis->lrange('posts', $start, $end);
    }


}

