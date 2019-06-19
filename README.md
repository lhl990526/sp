# sp
购物网
## 说明
1.基于thinkphp5.1.37
2.git没有提交的文件/vender、/thinkphp、/config/
databases.php,需要手动上传
3.如果是的nginx的的的的的的参考5.1手册，把
 location /sp/public/ {
       if (!-e $request_filename){
          rewrite  ^/sp/public/(.*)$  /sp/public/index.php?s=/$1  last;
     }
   }





