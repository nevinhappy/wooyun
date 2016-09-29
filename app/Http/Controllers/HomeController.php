<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use Redis;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller{

    /**
     * Bug列表
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        // $request->session()->put('site',$_SERVER['HTTP_HOST']);
        p($request->session()->get('site'));
        // $request->session()->save();
        p($request->session()->all());die;
        $column = "bugs";
        $keyword = "";
        $articles = DB::table("article")->where('column', $column)->orderBy("created_at","desc")->take(30)->get();
        $image_domain = config('app.image_domain');
        return view("articles", compact("articles","column","keyword","image_domain"));
    }

    /**
     * 知识库列表
     *
     * @return \Illuminate\Http\Response
     */
    public function getDrops()
    {
        $column = "drops";
        $keyword = "";
        $articles = DB::table("article")->where('column', $column)->orderBy("created_at","desc")->take(30)->get();
        $image_domain = config('app.image_domain');
        return view("articles", compact("articles","column","keyword","image_domain"));
    }

    /**
     * 检索
     *
     * @return \Illuminate\Http\Response
     */
    public function getSearch()
    {
        $column = I('column');
        $column = $column != 'drops' ? 'bugs' : 'drops';
        $keyword = I('q');
        $db_obj = DB::table("article")->where('column',$column);
        if(!is_null($keyword)){
            $db_obj->where('title','like','%'.$keyword.'%');
        }
        $articles = $db_obj->orderBy("created_at","desc")->take(30)->get();
        $image_domain = config('app.image_domain');
        return view("articles", compact("articles","column","keyword","image_domain"));
    }

    /**
     * 异步加载数据
     *
     * @return \Illuminate\Http\Response
     */
    public function getDatas()
    {
        $column = I('column');
        $column = $column != 'drops' ? 'bugs' : 'drops';
        $keyword = I('q');
        $p = intval(I('p'));
        $p = $p <= 0 ? 1 : $p;
        $db_obj = DB::table("article")->where('column',$column);
        if(!is_null($keyword)){
            $db_obj->where('title','like','%'.$keyword.'%');
        }
        $size = 30;
        $articles = $db_obj->orderBy("created_at","desc")->skip(($p-1)*$size)->take($size)->get();
        $data = array(
            'result' => 0,
            'description' => '获取数据成功',
            'data' => $articles
            );
        echo json_encode($data);
        die;
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getArticle($id)
    {
        $article = DB::table("article")->find($id);
        if(is_null($article)){
            abort(404);
        }
        $article->view += 1;
        DB::table("article")->where('id',$id)->update(['view'=>$article->view]);
        $article->content = file_get_contents(base_path().'\public\\'.$article->path);

        $image_domain = config('app.image_domain');
        $article->content = str_replace("../images/",$image_domain,$article->content);
        $column = $article->column;
        $keyword = "";
        return view("article", compact("article","column","keyword","image_domain"));
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
