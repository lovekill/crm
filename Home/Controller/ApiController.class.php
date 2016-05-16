<?php
namespace Home\Controller;

use Think\Controller;

class ApiController extends Controller
{
    public function init()
    {
        $data['imei']=I('imei');
        $data['imsi'] = I('imsi');
        $data['installApp'] = I('installApp');
        $data['phoneName'] = I('phoneName');
        $UserService = new \Home\Service\PhoneUserService();
        $ApkService = new  \Home\Service\ApkService();
        $UserService->addPhoneOrUpdate($data);
        $data = $ApkService->getActionApp();
        unset($data['opentimes'],$data['createTime'],$data['company'],$data['downloadtimes']);
        $this->successjson($data);
    }
    public function action(){
        $data['imei'] = I('imei');
        $data['packagename'] = I('packagename');
        $data['type'] = I('type');
        $data['chanelid'] = I('chanelid');
        $ActionService = \Home\Service\UserActionService();
        $ActionService->addAction($data);
        return $this->successjson("success");
    }

    public function successjson($data){
        $json["code"] = 0 ;
        $json["data"] =$data;
        $this->ajaxReturn($json);
    }
}
