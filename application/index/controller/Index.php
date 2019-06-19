<?php
namespace app\index\controller;
use Db;
class Index
{
    public function index()
    {
        $arr=Db::table('zs')->find();
        var_dump($arr);
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
