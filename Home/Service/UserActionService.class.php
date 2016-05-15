<?php
namespace Home\Service;
use Think\Model;
    class UserActionService{
        public function addAction($data){
            $action=M('user_action');
            $data['createtime'] = data('Y-m-d H:i:s',time());
            return $action->add($data);
        } 
        public function getactionByCondition($condition){
            $action=M('action');
            return $action->where($condition).select();
        }
    }
?>
