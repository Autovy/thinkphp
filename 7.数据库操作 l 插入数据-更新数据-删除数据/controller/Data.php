<?php


namespace app\data\controller;

// 数据操作——增删改
use think\Db;

class Data
{

// 单条插入操作
// ------------------------
    public function insert(){

        // 插入的数据
        $data=[

            'username' => '鲸落',
            'password' => '123456'

        ];

        // 执行数据插入的两种方式
        $insert = Db::name('user')->insert($data);
        $insert2 = Db::name('user')->data($data)->insert();



        // 插入成功返回值为插入数
        return $insert;
    }

// 批量插入操作
// ----------------------------------------------------
    public function insertall(){
        $data=[

            [
                'username' => 'autovy',
                'password' => '123456'
            ],
            [
                'username' => '233',
                'password' => '123456'
            ]

        ];

        $insert = Db::name('user')->insertAll($data);
        return $insert;
    }

// 数据修改
// -----------------------------------------------------
    public function update(){
        $data = [
          'username' => '李白',
          'id' => 34
        ];

        Db::name('user')->where('id',4)->update($data);

    }

// 利用mysql函数进行数据修改
// -----------------------------------------------------
    public function update2(){
        $data = [
            'username' => Db::raw('UPPER(username)'),
            'id' => Db::raw('id + 10')
        ];

        Db::name('user')->where('id',3)->update($data);

    }

// 删除数据
// ------------------------------------------------
    public function del(){

        // 默认根据id进行删除，也可以用where方法指定字段删除
        // 删除一条
        Db::name('user')->delete(5);

        // 删除多条
        Db::name('user')->delete([1,2]);


    }
}