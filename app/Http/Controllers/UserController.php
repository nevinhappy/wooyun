<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Germey\Geetest\CaptchaGeetest;
use Session;
class UserController extends Controller
{
    use CaptchaGeetest;

    /**
     * 登录
     *
     * @return \Illuminate\Http\Response
     */
    public function signin(Request $request){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view("signin");
        }else{
            $result = $this->validate($request, [
                'geetest_challenge' => 'geetest',
            ], [
                'geetest' => config('geetest.server_fail_alert')
            ]);
            $email = I("email");
            $password = I("password");
            if (!$result || is_null($email) || is_null($password)) {
                die;
            }
            $limit = array(
                'email' => $email,
                'password' => $password
                );
            $user = DB::table("user")->where($limit)->take(1)->get();
            if(is_null($user)){
                returnMsg(-1,"邮箱或密码错误");
            }
            session("user",$user);
            $url = session("lasturl");
            if(is_null($url)){
                $url = "/";
            }
            returnMsg(0,"登录成功",$url);
        }
    }

    /**
     * 注册
     *
     * @return \Illuminate\Http\Response
     */
    public function signup(Request $request){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view("signup");
        }else{
            $result = $this->validate($request, [
                'geetest_challenge' => 'geetest',
            ], [
                'geetest' => config('geetest.server_fail_alert')
            ]);
            $email = I("email");
            $password = I("password");
            $nickname = I("nickname");
            p($email);
            p($password);
            p($nickname);
            if (!$result || is_null($email) || is_null($password) || is_null($nickname)) {
                die;
            }
            if(!isEmail($email)){
                returnMsg(-1,"请输入正确格式的邮箱");
            }
            $limit = array(
                'email' => $email,
                );
            $user = DB::table("user")->where($limit)->take(1)->get();
            if($user){
                returnMsg(-1,"邮箱已注册");
            }
            $limit = array(
                'nickname' => $nickname,
                );
            $user = DB::table("user")->where($limit)->take(1)->get();
            if($user){
                returnMsg(-1,"昵称已被使用");
            }
            $activecode = md5(Session::getId().time().$email);
            $data = array(
                'email' => $email,
                'nickname' => $nickname,
                'password' => $password,
                'activecode' => $activecode
                );
            DB::table("user")->insert($data);
            $url = "signin";
            returnMsg(0,"注册成功",$url);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
