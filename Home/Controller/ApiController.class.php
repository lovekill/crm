<?php
namespace Home\Controller;

use Think\Controller;

class ApiController extends Controller
{
    public function init()
    {
        $this->ajaxRetrun("eeee") ;
    }
    public function action(){
        $this->ajaxRetrun("action");
    }
}
