<?php
/**
 * Created by PhpStorm.
 * User: pizepei
 * Date: 2019/10/21
 * Time: 11:28
 * @title 应用端微服务管理
 */


namespace normphpCore\microServices\controller;


use normphpCore\microServices\service\BasicsMicroserviceAppsService;
use normphp\staging\Controller;
use normphp\staging\Request;

class BasicsMicroServiceApi extends Controller
{
    /**
     * 基础控制器信息
     */
    const CONTROLLER_INFO = [
        'User'=>'pizepei',
        'title'=>'应用端微服务API',//控制器标题
        'namespace'=>'micro_service',//门面控制器命名空间
        'baseAuth'=>'MicroserviceAuth:public',//基础权限继承（加命名空间的类名称）
        'basePath'=>'/micro-service/api/',//基础路由
    ];

    /**
     * @Author 皮泽培
     * @Created 2019/10/21 14:24
     * @param Request $Request
     *   path [object] 路径参数
     *      appid [uuid] MicroserviceCentreConfig的 appid
     *   raw [object] post参数
     *          timestamp [int required]   时间戳
     *          nonce [int required required]   随机数
     *          encrypt_msg [string required] 加密的数据
     *          signature [string required] 签名
     *          urlencode [bool] 是否使用urlencode
     * @return array [json] 定义输出返回数据
     *      data  [raw] apps配置
     *          timestamp [int required]   时间戳
     *          nonce [int required required]   随机数
     *          encrypt_msg [string required] 加密的数据
     *          signature [string required] 签名
     *          urlencode [bool] 是否使用urlencode
     * @title  配置中心响应微服务apps配置
     * @explain 配置中心响应微服务apps配置
     * @baseAuth MicroserviceAuth:public
     * @throws \Exception
     * @router post  apps/config/:appid[uuid]
     */
    public function getAppsConfig(Request $Request)
    {
        return $this->succeed(BasicsMicroserviceAppsService::getLocalAppsConfig($Request->raw(),$Request->path('appid')),'获取成功');
    }

}