<?php
namespace app\admin\controller;
use think\Controller;
use think\captcha\Captcha;
use Request;
use Db;
use think\facade\Session;
class Login extends Controller
{
    public function login()
    {
        return $this->fetch();
    }
    public function loginAction()
    {
    	$code=Request::post('code');
    	$user=Request::post('user');
    	$password=Request::post('password');
    	$captcha = new Captcha();
    	if( !$captcha->check($code)){
    		$arr=['code'=>'1','status'=>'error','message'=>'验证码错误'];
    	}else{
    		$where=['user'=>$user ,'password'=>$password];
    		$res=Db::table('admin')->where($where)->find();
    		if (empty($res)){
    			$arr=['code'=>'2','status'=>'error','message'=>"账号或者密码错误"];
    		}else{
    			$arr=['code'=>'0','status'=>'ok','message'=>"登陆成功"];
                Session::set('name',$user);

    		}


    	}
    	$json=json_encode($arr);
    	echo $json;
    }
     public function loginOut(){
        Session::delete('name');
        $this->redirect('login/login');
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