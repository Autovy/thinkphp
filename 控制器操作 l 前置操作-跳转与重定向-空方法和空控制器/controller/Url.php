<?php


namespace app\test\controller;


use think\Controller;

class Url extends Controller
{

// 跳转条件设置
// ------------------------------
    protected $flag = true;

// 跳转触发
// ----------------------------------------------------
    public function index(){

        if($this->flag){
            // 不指定url，默认返回上一层
            $this->success('访问成功', '../test/before/one');
        }else{
            // 自动后退到上一页
            $this->error('访问失败了');
        }


    }

// 空链接（空方法） 拦截
// ------------------------------------------
    public function _empty($name){
        $string = '此方法不存在:'.$name;
        $this->error($string);
    }



}