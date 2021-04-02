<?php


namespace app\data\controller;
use think\Db;

// 常用链式方法
class Data
{

// where()链式方法
// ------------------------------------------------
    public function one(){

        // 关联数组设置多个查询条件
        $result1 = Db::name('user')->where([

            'password' => 123456,
            'id' => [7,8,9,10]

        ])->select();

        echo json_encode($result1);
        echo '<br/><br/>';


        // 索引数组查询
        // 组装复杂数据，通过变量传递
        $map[] = ['id', 'between', [7,10]];
        $map[] = ['password','=', 123456];
        $result2 = Db::name('user')->where($map)->select();
        echo json_encode($result2);
        echo '<br/><br/>';



        // 字符串形式传递查询
        $result3 = Db::name('user')->where('id in (7,10) and password=123456 ')->select();
        echo  json_encode($result3);
        echo '<br/><br/>';

    }


// field()链式方法
// -------------------------------------------------------------------
        public function two(){

            // 查询指定字段
            $result1 = Db::name('user')->field('id,username')->select();
            echo json_encode($result1);
            echo '<br/><br/>';

            // field()方法中设置mysql函数
            $result2 = Db::name('user')->field('sum(id)')->select();
            echo json_encode($result2);
            echo '<br/><br/>';

            // 屏蔽掉指定字段
            $result2 = Db::name('user')->field('password',true)->select();
            echo json_encode($result2);
            echo '<br/><br/>';


        }


// limit()链式方法
// --------------------------------------------------------
        public function three($num=3){

            // 限制输出数据个数
            $result1 = Db::name('user')->limit($num)->select();
            echo json_encode($result1);
            echo '<br/><br/>';

            // 分页模式输出数据，但要严格计算开始位置
            //如：limit(2,5)：从第3条开始显示5条数据
            // 第一页
            $result2 = Db::name('user')->limit(0,$num)->select();
            echo json_encode($result2);
            echo '<br/><br/>';
            //第二页
            $result3 = Db::name('user')->limit($num,$num)->select();
            echo json_encode($result3);
            echo '<br/><br/>';


        }



// page()链式方法
// -----------------------------------------------------------------------
        public function four($page=1,$num=3){

            // 循环输出页面
            for($page; $page<5; $page++){
                // page()分页方法，优化了limit()方法，无需进行分页条数计算
                $result1 = Db::name('user')->page($page, $num)->select();
                // 但数据为空，跳出循环
                if($result1==NULL){
                    break;
                }
                else{
                    echo json_encode($result1);
                    echo '<br/><br/>';
                }

            }

        }

// group()链式方法
// --------------------------------------------------
        public function five(){

            // 对某字段进行分组然后统计（按性别分组统计id平均数）
            $result = Db::name('two')->group('gender')->field('gender, avg(id)')->select();
            return json($result);
        }


// having()链式方法
// -------------------------------------------------------------
        public function six(){

            // 对分组后的数据进行筛选
            $result = Db::name('two')
                    ->group('gender')
                    ->field('gender, avg(id) as avg')
                    ->having('avg(id)<10')
                    ->select();

            return json($result);

        }




}



