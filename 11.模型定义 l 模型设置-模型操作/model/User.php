<?php


namespace app\mod\model;


use think\Model;

// 模型名会自动对应到数据表
// 模型类与表名的差别：1.去除前缀tp_，2.变成大驼峰式命名
class User extends Model
{

// 设置模型的方式
// -------------------------------------------------------------

        // 改变主键
        protected $pk = 'username';

        // 设置其他表
        // User默认绑定了数据库中tp_user这张表，但是也可以让其指向其他表
        protected $table = 'tp_two';

        // 模型初始化，与控制器初始化类似，可以初始化渲染内容
        protected static function init()
        {
            echo 'hello,world<br/>';
        }

}