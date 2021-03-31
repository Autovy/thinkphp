<?php


namespace app\test\controller;

// 控制器不存在异常处理
// ----------------------------
use think\Request;

class Error
{
    public function index(Request $request){

        return '当前控制器不存在'.$request->controller();
    }

}