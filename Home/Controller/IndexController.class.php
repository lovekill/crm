<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $this->display("login");
    }
    public function home(){
        $this->display("connection_list") ;
    }
}
