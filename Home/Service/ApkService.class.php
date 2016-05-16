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
        public function getPage($page){
            $app=M('app');
            $start = $page*10 ;
            return $app->order('createTime desc')->limit($start.",10")->select();
        }
        public function downloadplus($packagename){
            if($packagename==null) return ;
           $app=M('app'); 
           $a = $app->where("packagename=".$packagename)->find();
           if($a==null) return ;
           $a['downloadtimes']=$a['downloadtimes']+1;
           return $this->updateApp($a);
        }

        public function openplus($packagename){
            if($packagename==null) return ;
           $app=M('app'); 
           $a = $app->where("packagename=".$packagename)->find();
           if($a==null) return ;
           $a['opentimes']=$a['opentimes']+1;
           return $this->updateApp($a);
        }
        public function getActionApp(){
           $app=M('app'); 
           return $app->where("status=1")->field('opentimes,createTime,company,downloadtimes',ture)->select();
        }
    }
?>
