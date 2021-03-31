<?php


namespace app\data\controller;
use think\Controller;
use think\Db;


// 通过'->'符号进行链式查询
class Data extends Controller
{

// 查询规则
// ----------------------------------------------
    //只要还是数据库对象都可以继续使用链式查询
    // 用find()和select()方法时结果查询，输出不再是对象
    public function index(){
        print_r(Db::name('user')->where('id',3)->order('id', 'desc'));
    }

// 保存实例避免资源浪费（链式查询的特点，可以保存对象）
// --------------------------------------------
    public function one(){
        // 保存数据库对象
        $user = Db::name('user');

        // 通过上面一个对象分别进行查询
        // 但是要清除针对这个对象所有的链式查询项，才能下次查询
        $data1 = $user->where('id', 3)->find();
        echo json_encode($data1).':'.Db::getLastSql();
        echo '<br/><br/>';


        // 不清除链式查询项的情况
        $data2 = $user->select();
        echo json_encode($data2).':'.Db::getLastSql();
        echo '<br/><br/>';

        // 清除链式查询项的情况
        $data3 = $user->removeOption('where')->select();
        echo json_encode($data3).':'.Db::getLastSql();
        echo '<br/><br/>';


    }



}