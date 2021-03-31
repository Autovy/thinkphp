<?php


namespace app\data\controller;


use app\data\model\User;
use think\Db;

class Data
{
// 按表名查找数据库，必须加上前缀
// ------------------------------
    public function getone(){
        $data = Db::table('tp_user')->select();
        return json($data);
    }

//  自动加上索引内的前缀
// ----------------------------
    public function gettwo(){
        $data = Db::name('user')->select();
        return json($data);
    }

// 使用模型访问数据库
// ---------------------------------
    public function getmod(){
        $data = User::select();
        return json($data);
    }

}