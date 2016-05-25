<?php
namespace Home\Service;
use Think\Model;
    class PhoneUserService{
        public function addPhoneOrUpdate($data){
            $phoneuser=M('phoneuser');
            $user = $this->getphoneuserByImei($data['imei']);
            $data["createtime"] = date('Y-m-d H:i:s',time());
            $data["lastlogintime"] = date('Y-m-d H:i:s',time());
            if($user!=null){
                $user['imsi']=$data['imsi'];
                $user['installApp']=$data['installApp'];
                $user["lastlogintime"] = date('Y-m-d H:i:s',time());
                return $this->updatephoneuser($user);
            }else{
                return $phoneuser->add($data);
            }
        } 
        public function getphoneuserByImei($imei){
            $phoneuser=M('phoneuser');
            return $phoneuser->where("imei=".$imei)->find();
        }
        public function updatephoneuser($user){
            $phoneuser=M('phoneuser');
            return $phoneuser->where("id=".$user["id"])->save($user);
        }

        public function getUserReport(){
            $m = M("") ;
            return $m->query("SELECT DATE_FORMAT( createtime, '%Y-%m-%d' ) dateTime , COUNT( * ) usercount FROM phoneuser GROUP BY DATE_FORMAT( createtime, '%Y-%m-%d' )  order by createtime desc");
        }
    }
?>
