<?php
namespace Home\Controller;

use Think\Controller;
use \Home\Service;

class IndexController extends Controller
{
    public function index()
    {
        $this->display("login");
    }
    public function home(){
        $ApkService = new \Home\Service\ApkService();
        $apks = $ApkService->getPage(0);
        $this->assign("apks",$apks); 
        $this->display("apk_list") ;
    }
    public function addapp(){
        $this->display("add_apk"); 
    }
    public function doaddapp(){        
        $config = array(
            'maxSize'    =>    0,
            'rootPath'   =>    './apks/',
            'savePath'   =>    '',
            'saveName'   =>    array('uniqid',''),
            'exts'       =>    array('apk'),
            'autoSub'    =>    true,
            'subName'    =>    array('date','Ymd'),
        );
        $data['packagename']=I("packagename");
        $upload = new \Think\Upload($config);// 实例化上传类
        $info   =   $upload->uploadOne($_FILES['apk']);
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功 获取上传文件信息
            $data["apkpath"]=$info['savepath'].$info['savename'];
        }
        $data['name'] = I("name");
        $data['needopentime'] = I("needopentime");
        $data['level']=I("level");
        $data["company"]=I("company");
        $data['price'] =I("price");
        $data["createTime"] = date('Y-m-d H:i:s',time());
        $ApkService = new \Home\Service\ApkService();
        $ApkService->addApk($data);
        $this->home();
    }
}

