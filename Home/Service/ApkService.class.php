<?php
namespace Home\Service;
use Think\Model;
    class ApkService{
        public function addApk($data){
            $apk=M('app');
            return $apk->add($data);
        } 
        public function getAppByPackage($packagename){
            $app=M('app');
            return $app->where("packagename=".$packagename).find();
        }
        public function updateApp($app){
            $app=M('app');
            return $app->where("id=".$app["id"]).save($app);
        }
    }
?>
