<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allPosts = [
            ['id' => 1 , 'title' => 'laravel is cool', 'posted_by' => 'Ahmed', 'creation_date' => '2022-10-22', 'desc' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti voluptas nisi quod magni facilis consequuntur recusandae non reiciendis? Voluptatem est facere tempora, similique quasi accusamus nemo velit culpa laborum porro.'],
            ['id' => 2 , 'title' => 'PHP deep dive', 'posted_by' => 'Mohamed', 'creation_date' => '2022-10-15', 'desc' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti voluptas nisi quod magni facilis consequuntur recusandae non reiciendis? Voluptatem est facere tempora, similique quasi accusamus nemo velit culpa laborum porro.'],
        ];
        return view('posts.index',['posts' => $allPosts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect('/posts/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $allPosts = [
            ['id' => 1 , 'title' => 'laravel is cool', 'posted_by' => 'Ahmed', 'creation_date' => '2022-10-22', 'desc' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti voluptas nisi quod magni facilis consequuntur recusandae non reiciendis? Voluptatem est facere tempora, similique quasi accusamus nemo velit culpa laborum porro.'],
            ['id' => 2 , 'title' => 'PHP deep dive', 'posted_by' => 'Mohamed', 'creation_date' => '2022-10-15', 'desc' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti voluptas nisi quod magni facilis consequuntur recusandae non reiciendis? Voluptatem est facere tempora, similique quasi accusamus nemo velit culpa laborum porro.'],
        ];

        $requiredPost = $allPosts[$id - 1];
        return view('posts.show',['post' => $requiredPost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allPosts = [
            ['id' => 1 , 'title' => 'laravel is cool', 'posted_by' => 'Ahmed', 'creation_date' => '2022-10-22', 'desc' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti voluptas nisi quod magni facilis consequuntur recusandae non reiciendis? Voluptatem est facere tempora, similique quasi accusamus nemo velit culpa laborum porro.'],
            ['id' => 2 , 'title' => 'PHP deep dive', 'posted_by' => 'Mohamed', 'creation_date' => '2022-10-15', 'desc' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti voluptas nisi quod magni facilis consequuntur recusandae non reiciendis? Voluptatem est facere tempora, similique quasi accusamus nemo velit culpa laborum porro.'],
        ];

        $requiredPost = $allPosts[$id - 1];
        return view('posts.edit',['post' => $requiredPost]);
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
        return redirect('/posts/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect('/posts/');
    }
}
