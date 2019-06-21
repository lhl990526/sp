<?php
namespace app\admin\controller;
use think\Controller;
class Index extends common
{
    public function index()
    {
        return $this->fetch();
    }

  
}
