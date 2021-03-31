<?php


namespace app\data\controller;

// 查询表达式
use think\Db;

class Data
{

// 比较查询
// ----------------------------------------------------------
    public function one(){
        // 输出id != 10的数据
        $result = Db::name('user')->where('id', '<>',10)->select();
        return json($result);

        //

    }

// 模糊查询（即模糊查询字符串）
// -------------------------------------------------------------
    public function two(){

        // 模糊查询，密码（password）以12345开头的数据
        $result = Db::name('user')->whereLike('password','12345%')->select();
        return json($result);
    }

// 区间查询
// -----------------------------------------------------------------
    public function three(){

        // 查询id为1-10之间的数据
        $result = Db::name('user')->whereBetween('id',[1,10])->select();
        return json($result);

    }

// 多条查询
// ------------------------------------------------------
    public function four(){

        // 查询id为7,8,10的数据
        $result = Db::name('user')->whereIn('id',[7,8,10])->select();
        return json($result);

    }

// 自定义查询（可以自己构建sql查询语句）
// ----------------------------------------------
    public function five(){

        // 查询id为7,8,10的数据
        $result = Db::name('user')->whereExp('id','In(7,8,9)')->select();
        return json($result);


    }

}