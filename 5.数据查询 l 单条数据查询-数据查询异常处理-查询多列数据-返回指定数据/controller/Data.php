<?php


namespace app\data\controller;
use think\Controller;
use think\Db;
use think\db\exception\DataNotFoundException;

// 查询数据
class Data extends Controller
{
// 查询一条数据
// ------------------------------------------------
    public function one(){
        // find()默认查询第一条语句
        $data = Db::table('tp_user')->find();
        echo json_encode($data);
        echo '<br/>';
        // 输出最近执行的sql语句
        echo Db::getLastSql();

        echo '<br/>';

        // where返回特定条件数据
        $data2 = Db::table('tp_user')->where('id',3)->find();
        echo json_encode($data2);
        echo '<br/>';
        // 输出最近执行的sql语句
        echo Db::getLastSql();

    }


// 数据不存在时异常处理
// -----------------------------------------------
public function two($id){
        // 异常捕捉
        try{
            $data = Db::table('tp_user')->where('id', $id)->findOrFail();
        }

        catch (DataNotFoundException $e){
            return '查询不到数据！';
        }

        return json($data);

}

// 查询多列数据
// --------------------------------------------
public function three(){
    $data = Db::table('tp_user')->select();
    return json($data);
}


// 指定返回数据查询
// --------------------------------------------
public function four($id){

        // value方法指定返回字段的值
        $data1 = Db::name('user')->where('id', $id)->value('username');
        // 字符串
        echo $data1;

        echo '<br/>';

        // column方法返回指定列，并指定某字段作为索引
        $data2 = Db::name('user')->column('username','password');
        echo json_encode($data2);

}



}