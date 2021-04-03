<?php

namespace app\mod\controller;

use \app\mod\model\User as UseModel;

class User
{

// 经过模型的获取器，返回数据
// -----------------------------------
    public function one(){

        $user = UseModel::get(41);
        // 输出原始值
        echo json_encode($user->getData());

        echo "<br/><br/>";

        // 输出经过获取器过滤的值
        echo json_encode($user);

    }

// 动态获取器，直接在控制端过滤数据
// --------------------------------------

    public function two(){

        // withAttr方法：指定字段，然后调用方法
        $result = UseModel::withAttr('password', function ($value){

            return md5($value);

        })->select();

        return json($result);

    }

// 获取器优先级比较
// -----------------------------------------------------------
    // 模型获取器比动态获取器优先级高
    // 对同一字段过滤时，动态获取器返回值会覆盖模型获取器的返回值
    public function three(){
        // withAttr方法：指定字段，然后调用方法
        $result = UseModel::withAttr('status', function ($value){

            // 在模型里的正常，禁止等值会被这里的获取器a，b等值覆盖
            $myGet=[1=>'a', 0=>'b', -1=>'c'];
            return $myGet[$value];

        })->select();

        return json($result);
    }

// 经过修改器，插入数据
    public function four(){
        // 创建一个模型实例
        $user = new UseModel();

        // 插入操作，返回布尔值
        $insert = $user->save([
            'username' => 'Emiria',
            'password' => 'qweee',
            'status' => '1',
        ]);
    }


}