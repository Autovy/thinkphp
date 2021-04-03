<?php


namespace app\mod\model;


use think\Model;

// 模型名会自动对应到数据表
// 模型类与表名的差别：1.去除前缀tp_，2.变成大驼峰式命名
class User extends Model
{


// 获取器，修改返回字段的值（针对查询操作）
// -----------------------------------
    // 自动获取指定字段的值，get(字段名)Attr
    public function getStatusAttr($value){

        // 过滤器（必须包含该字段所有可能的内容）
        $myGet=[1=>'正常', 0=>'禁用', -1=>'删除'];
        return $myGet[$value];


    }

// 修改器，修改插入的值（针对插入操作）
// ------------------------------------------
    public function setPasswordAttr($vaule){

        return md5($vaule);
    }


}