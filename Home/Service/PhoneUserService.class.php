<?php
namespace Home\Service;
use Think\Model;
    class PhoneUserService{
        public function addPhoneOrUpdate($data){
            $phoneuser=M('phoneuser');
            $user["createtime"] = date('Y-m-d H:i:s',time());
            $user["lastlogintime"] = date('Y-m-d H:i:s',time());
            $user = $this->getphoneuserByIme($data['imei']);
            if($user!=null){
                $user['imsi']=$data['imsi'];
                $user['installApp']=$data['installApp'];
                $user["lastlogintime"] = date('Y-m-d H:i:s',time());
                return $this->updatephoneuser($user);
            }
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
