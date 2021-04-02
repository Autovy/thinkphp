<?php

namespace app\mod\controller;
// 如果控制器中的类名和model的类名相同，就需要引入,设置别名
// 也可以加入后缀以示区分
use \app\mod\model\User as UseModel;

class User
{

//  使用模型基本操作数据库
// -------------------------------------------------------
    public function one(){

        $result = UseModel::select();
        echo json_encode($result);

    }

// 更改主键后删除
// -----------------------------------------------
    public function two(){
        // 但主键为id时，可以生效
        UseModel::destroy(11);

        // 主键改为username后，做删除操作
        UseModel::destroy('李白');

    }




}