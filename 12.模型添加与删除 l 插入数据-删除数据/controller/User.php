<?php

namespace app\mod\controller;
// 如果控制器中的类名和model的类名相同，就需要引入,设置别名
// 也可以加入后缀以示区分
use \app\mod\model\User as UseModel;

class User
{

// 利用模型进行数据添加（一条）
// -------------------------------------------------------
    public function insert(){

        // 创建一个模型实例
        $user = new UseModel();

        // 插入操作，返回布尔值
        $insert = $user->save([
            'username' => 'Emiria',
            'password' => '486'
        ]);

        // 新增后，可输出主键
        echo $user->id.'<br/>';
        echo $insert;

    }


// 利用模型批量插入数据
// -------------------------------------------------------
    public function insertall(){

        // 创建一个模型实例
        $user = new UseModel();

        // 设置数据
        $dataAll =[

            [
                'username' => 'Emiria',
                'password' => '486'
            ],

            [
                'username' => 'Subaru',
                'password' => 'EMT'
            ],

            [
                'username' => 'Eem',
                'password' => '486'
            ],

        ];

        // 插入全部数据，返回插入数据对象
        $result = $user->saveAll($dataAll);
        print_r($result);

    }

// 数据删除delete()方法
// -------------------------------------------
    public function del(){

        // 指定主键值然后删除，返回布尔值
        $user = UseModel::get(41)->delete();
        echo $user;

    }


// 数据删除destroy()方法
// -------------------------------------------
    public function del2(){

        // 静态方法调用destroy()方法，通过主键删除数据
        UseModel::destroy(41);

        // 也可以进行批量删除
        UseModel::destroy([1,2,3]);

    }

// 条件删除
// -----------------------------------------------------
    public function del3(){

        // 通过数据库类的条件查询删除
        UseModel::where('id','<',10)->delete();

        // 闭包方式删除
        UseModel::destroy(function ($query){
           $query->where('id','<',10);
        });
    }



}