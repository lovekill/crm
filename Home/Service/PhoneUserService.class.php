<?php
namespace Home\Service;
use Think\Model;
    class PhoneUserService{
        public function addPhone($data){
            $phoneuser=M('phoneuser');
            return $phoneuser->add($data);
        } 
        public function getphoneuserByImei($imei){
            $phoneuser=M('phoneuser');
            return $phoneuser->where("imei=".$imei).find();
        }
        public function updatephoneuser($phoneuser){
            $phoneuser=M('phoneuser');
            return $phoneuser->where("id=".$phoneuser["id"]).save($phoneuser);
        }
    }
?>
