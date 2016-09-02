<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Germey\Geetest\CaptchaGeetest;

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
            returnMsg(0,"登录成功");
        }
    }

    /**
     * 注册
     *
     * @return \Illuminate\Http\Response
     */
    public function signup(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view("signup");
        }else{

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
