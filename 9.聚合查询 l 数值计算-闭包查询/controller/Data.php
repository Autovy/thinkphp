<?php


namespace app\data\controller;

// 查询表达式
use think\Db;

class Data
{

// 聚合查询
// -----------------------------------------

    // 计算数值
    public function one(){

       // 数量计算
       $result = Db::name('user')->count();
       echo $result;
       echo '<br/>';

       // 最值计算
        $result2 = Db::name('user')->max('id');
        echo $result2;
        echo '<br/>';

        // 平均值计算
        $result3 = Db::name('user')->avg('id');
        echo $result3;
        echo '<br/>';

        // 数据综合计算
        $result = Db::name('user')->sum('id');
        echo $result;
        echo '<br/>';

    }

// 子查询
// ----------------------------------------------
    public function two(){

        // fetchSql:不执行sql语句，返回sql语句
        $result1 = Db::name('user')->fetchSql(true)->select();
        echo $result1;
        echo '<br/>';

        // buildSql:不执行sql语句，返回sql语句，相比fetchSql不需要写select()
        $result2 = Db::name('user')->buildSql(true);
        echo $result2;
        echo '<br/>';

        // 利用子查询，闭包查询实现多表查询
        // sql实现：SELECT * FROM tp_user WHERE id in (SELECT id FROM tp_two WHERE gender = '男');
        $result3 = Db::name('user')->where('id', 'in', function ($query){
            $query->name('two')->field('id')->where('gender', '男');
        })->select();

        return json($result3);




    }



}