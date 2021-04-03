<?php


namespace app\mod\model;


use think\Model;

// 模型名会自动对应到数据表
// 模型类与表名的差别：1.去除前缀tp_，2.变成大驼峰式命名
class User extends Model
{
    // 从模型内部获取数据（即把在控制器进行的数据库操作移植到模型）
    public function get_password(){
        // 返回某个字段
        return self::where('id','>',10)->find()->getAttr('password');
    }
}