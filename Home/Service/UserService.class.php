<?php
namespace Home\Service;
use Think\Model;
    class UserService{
        public function adduser($data){
            $user=M('user');
            return $user->add($data);
        } 
        public function getuserByUsername($username){
            $user=M('user');
            return $user->where("username=".$username).find();
        }
        public function updateuser($user){
            $user=M('user');
            return $user->where("id=".$user["id"]).save($user);
        }
    }
?>
