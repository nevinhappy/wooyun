<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Germey\Geetest\CaptchaGeetest;
use Session;
use Validator;
use DB;
use App\Models\User;
use App\Models\Article;

class UserController extends Controller{
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
            $validator = Validator::make($request->all(), [
                'geetest_challenge' => 'geetest',
            ]);
            if($validator->fails()){
                // returnMsg(-1,config('geetest.server_fail_alert'));
            }
            $email = I("email");
            $password = I("password");
            if (is_null($email) || is_null($password)) {
                die;
            }
            $limit = array(
                'email' => $email,
                'password' => md5($password.config('md5_sort'))
                );
            $user = DB::table("user")->where($limit)->first();
            if(is_null($user)){
                returnMsg(-1,"邮箱或密码错误");
            }
            $request->session()->put('uid',$user->id);
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
            $validator = Validator::make($request->all(), [
                'geetest_challenge' => 'geetest',
            ]);
            if($validator->fails()){
                returnMsg(-1,config('geetest.server_fail_alert'));
            }
            $email = I("email");
            $password = I("password");
            $nickname = I("nickname");
            if (is_null($email) || is_null($password) || is_null($nickname)) {
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
                'password' => md5($password.config('md5_sort')),
                'active_code' => $activecode
                );
            DB::table("user")->insert($data);
            $url = "signin";
            returnMsg(0,"注册成功",$url);
        }
    }

    /**
     * 登出
     *
     * @return \Illuminate\Http\Response
     */
    public function signout(Request $request){
        $request->session()->forget('uid');
        return redirect('/');
    }

    /**
     * 用户的最新文章
     * @return [type] [description]
     */
    public function latestarticles($u){
        $uid = decode_uid($u);
        if(!$uid){
            abort(404);
        }
        $user = User::find($uid);
        $column = "latestarticles";
        $keyword = "";
        $image_domain = config('app.image_domain');
        $articles = Article::where('user_id', $uid)->orderBy("created_at","desc")->take(30)->get();
        return view("user/uarticles",compact("articles","column","keyword","image_domain","user"));
    }

    /**
     * 用户的最热文章
     * @return [type] [description]
     */
    public function hotarticles($uid){
        $uid = decode_uid($uid);
        if(!$uid){
            abort(404);
        }
        $user = User::find($uid);
        $column = "hotarticles";
        $keyword = "";
        $image_domain = config('app.image_domain');
        $articles = Article::where('user_id', $uid)->orderBy("view","desc")->take(30)->get();
        return view("user/uarticles",compact("articles","column","keyword","image_domain","user"));
    }
}
