<?php


class IndexAction extends Action 
{
    public function index()
    {
        $this->redirect('Business/index', array('id' => 1));
    }
}