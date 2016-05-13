<?php
namespace Home\Service;
use Think\Model;
    class ChanelService{
        public function addChanel($data){
            $chanel=M('chanel');
            return $chanel->add($data);
        } 
        public function getChanelByChanelId($chanelid){
            $chanel=M('chanel');
            return $chanel->where("chanelid=".$chanelid).find();
        }
        public function updateChanel($chanel){
            $chanel=M('chanel');
            return $chanel->where("id=".$chanel["id"]).save($chanel);
        }
    }
?>
