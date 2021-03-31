<?php
namespace app\test\controller;

use think\Controller;
// 前置操作，即页面初始化，可以灵活控制是否渲染指定的初始化方法
// ---------------------------------------------------
// 需要继承controller类
class Before extends Controller
{

// 设置$beforeActionList属性绑定前置方法
//-------------------------------------------
    protected $beforeActionList=[
        'first',                            // 允许该控制器下所有的方法触发frist前置方法
        'second' => ['except'=>'one'],      // 除了one这个方法，其他方法都允许触发
        'third' => ['only' => 'one, two']   // 仅允许one，two两个方法触发
    ];

// 创建对应的前置方法（初始化方法）,这些方法是无法直接访问的
// ------------------------------------------------
    protected function first(){
        echo 'frist<br/>';
    }

    protected function second(){
            echo 'second<br/>';
        }

    protected function third(){
            echo 'third<br/>';
        }

// 创建可调用的方法（前置方法作用对象）
// --------------------------------------------------
public function one(){

}

public function two(){

    }



}