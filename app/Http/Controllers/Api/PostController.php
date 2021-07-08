<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /* $posts = Post::all();
      return response()->json($posts); */

      /* $post= DB::table('posts')
      ->select(
        'posts.id',
        'posts.title',
        'posts.content',
        'posts.created_at as date',
        'categories.name as category'
      )      
      ->get()
      ->join('categories', 'posts.category_id', 'category.id'); */

        $posts = DB::table('posts')
        ->select(
            'posts.id',
            'posts.title',
            'posts.content',
            'posts.created_at as date',
            'categories.name as category'
        )
        ->join('categories','posts.category_id','categories.id')
        ->paginate(3);

        // è possibile fare le jopin in questo modo
        // con with si passa la proprietà della join prensente nel Model
        // il risultato sono una serie di elementi annidati
        //$posts = Post::with(['category','tags'])->paginate(3);

        /* $post = Post::with('category')->get(); */

        return response()->json($posts);


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
