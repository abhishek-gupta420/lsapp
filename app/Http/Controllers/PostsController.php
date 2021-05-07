<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    public function index()
    {
        //
      //  $posts = Post::orderBy('title','desc')->take(1)->get();
      //  $posts = DB::select("SELECT * FROM posts");
      //$posts = Post::all();
      $posts = Post::orderBy('created_at','desc')->paginate(20);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //

        $this->validate($request,[
            'title'=> 'required',
            'body'=>'required',
            'cover_image' => 'image|nullable|max:10000'
        ]);

        // handle file upload
        if($request->hasFile('cover_image')){
                //get file name with the extension
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            //get just filename
                $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        // create post
       $post= new Post;
       $post->title=$request->input('title');
       $post -> body= $request->input('body');
       $post ->user_id=auth()->user()->id;
       $post->cover_image=$fileNameToStore;
       $post->save();

       return redirect('/posts')->with('success','Post Created');
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
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
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
        $post=Post::find($id);

        // check for correct user

        if(auth()->user()->id !==$post->user_id)
        {
            return redirect('/posts')->with('error','Unauthorized Page');
        }
        return view('posts.edit')->with('post',$post);

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
        $this->validate($request,[
            'title'=> 'required',
            'body'=>'required'
        ]);
        if($request->hasFile('cover_image')){
            //get file name with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

        //get just filename
            $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //get just extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        //filename to store
        $fileNameToStore= $filename.'_'.time().'.'.$extension;
        $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

    }
        // updating post
       $post= Post::find($id);
       $post->title=$request->input('title');
       $post -> body= $request->input('body');
       if($request->hasFile('cover_image')){
           $post->cover_image=$fileNameToStore;
       }
       $post->save();

       return redirect('/posts')->with('success','Post updated');
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
        $post= Post::find($id);
        if(auth()->user()->id !==$post->user_id)
        {
            return redirect('/posts')->with('error','Unauthorized Page');
        }
        if($post->cover_image !='noimage.jpg'){
            //delte image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();
        return redirect ('/posts')->with('success','Post Removed');


    }
}
