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
        foreach ($data as &$app) {
           $app['apkpath'] ="http://".I("server.HTTP_HOST")."/apks/".$app['apkpath'];
        }
        $this->successjson(json_encode($data));
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
        $json["data"] =json_decode($data);
        $this->ajaxReturn($json,"JSON");
    }
}
