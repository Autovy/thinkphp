<?php

namespace app\mod\controller;
// 如果控制器中的类名和model的类名相同，就需要引入,设置别名
// 也可以加入后缀以示区分
use \app\mod\model\User as UseModel;

class User
{

// 数据修改
// -------------------------------------------------

    // get方法获取数据，然后修改
    // 字段出错，没有报错 :(
    public function one(){
        // get方法获取主键
        $user = UseModel::get(8);
        $user->username = '鲨掉';
        $user->password = 'test';
        // 最后通过save()方法保存修改
        echo $user->save();

    }


    // where方法结合find()方法获得数据，然后修改
    public function two(){

        $user = UseModel::where('username','Eem')->find();
        $user->password = 'Subaru!';
        echo $user->save();

    }

    // 直接利用save更新数据
    public function three(){

        $user = new UseModel();
        $result = $user->save([
            // 更新的数据
            'username' => 'test',
            'password' => '1234'

        ], [
            // 定位数据条件
            'username' => 'test'
        ]);

        echo $result;

    }

    // 利用saveAll()方法批量修改数据
    // saveAll方法只能通过主键（放在第一位）进行更新
    public function four(){

        $user = new UseModel();
        $user->saveAll([

            ['id'=> 7, 'username'=> 'test1'],
            ['id'=> 8, 'username'=> 'test2'],
            ['id'=> 9, 'username'=> 'test3'],

        ]);

    }

    // 利用数据库类库的静态方法进行修改
    public function update(){
        $data = [
            'username' => '李白',
            'id' => 34
        ];

        UseModel::name('user')->where('id',4)->update($data);

    }

// 数据查询
// ----------------------------------------------------------
    public function five(){

        // get()方法查询
        $user = UseModel::get(8);
        echo json_encode($user);
        echo '<br/><br/>';

        // find()方法查询
        $user = UseModel::where('id',9)->find();
        echo json_encode($user);
        echo '<br/><br/>';

        // 从模型内部获取数据（即把在控制器进行的数据库操作移植到模型）
        // 控制器直接调用模型类的方法
        $user = new UseModel();
        echo $user->get_password();
        echo '<br/><br/>';

        // 动态查询
        $user = UseModel::getById('40');
        echo json_encode($user);

    }




}