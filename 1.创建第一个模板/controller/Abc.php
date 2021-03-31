<?php
// 命名空间，索引到test模块的控制器文件
namespace app\test\controller;

class Abc{
    public function hello($name){
        return 'hello'.$name;
    }
}