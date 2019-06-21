<?php
namespace app\admin\controller;
use think\Controller;
use think\captcha\Captcha;
use Request;
use Db;
class Login extends Controller
{
    public function login()
    {
        return $this->fetch();
    }
    public function loginAction()
    {
    	$code=Request::get('code');
    	$user=Request::get('user');
    	$password=Request::get('password');
    	$captcha = new Captcha();
    	if( !$captcha->check($code)){
    		$arr=['code'=>'1','status'=>'error','message'=>'验证码错误'];
    	}else{
    		$where=['name'=>$name,'password'=>$password];
    		$res=Db::table('admin')->where($where)->find();
    		if (empty($res)){
    			$arr=['code'=>'2','status'=>'error','message'=>"账号或者密码错误"];
    		}else{
    			$arr=['code'=>'0','status'=>'ok','message'=>"登陆成功"];
    		}
    	}
    	$json=json_encode($arr);
    	echo $json;
    }
    
   }

//     public function captchaCheck()
//     {     

//       header("Content-Type:applicaction/json; charset=utf-8");
    	  
//     	    $code=Request::get('code');
// 			$captcha = new Captcha();
// 			if( !$captcha->check($code))
// 			{
// 			$arr=['status'=>'error','message'=>'验证码错误'];
			
// 			}else{
// 			$arr=['status'=>'ok','message'=>'验证码正确'];
			
// 			}
// 			$json=json_encode($arr);
// 			 echo $json;
// 			// return  ajxa($json);
//     } 


// }