<?php

namespace App\Http\Controllers;

use App\Category;
use App\Commentaire;
use App\Tag;
use Illuminate\Http\Request;
use App\Post;
use Session;
use App\Http\Requests;
use Purifier;
use Image;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','DESC')->paginate(5);

        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags=Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            'title'         => 'required|max:255',
            'category'=>'required|integer',
            'body'          => 'required'
        ));
        // store in the database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = str_slug($request->title, '-');
        $post->category_id=$request->category;
        $post->body = Purifier::clean($request->body);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $post->image = $filename;

            $miniature = $request->file('image');
            $filename = time() . '_min.' . $miniature->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($miniature)->resize(200, 100)->save($location);
            $post->image_miniature = $filename;
        }

        if($post->save()){
            $post->tags()->sync($request->tags,false);
        }
       else{
           Session::flash('success', 'Le psot a bien ete sauvegarde!');
       }



        Session::flash('success', 'Le psot a bien ete sauvegarde!');
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);

        return view('posts.show')->with('post',$post)   ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $tags=Tag::all();

        $post=Post::find($id);
        return view('posts.edit')->withPost($post)->withCategories($categories)->withTags($tags);
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
        $post=Post::find($id);
       if ($request->input('title')== str_slug($post->slug,'-') ){
           $this->validate($request, array(
               'title' => 'required|max:255',
               'body'  => 'required',
               'category'=>'required|integer',

           ));
       }
        else{
        // Validate the data
            $this->validate($request, array(
                'title' => 'required|max:255',
                'body'  => 'required',
                'category'=>'required|integer',

            ));
        }
        // Save the data to the database
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug = str_slug($request->input('title'), '-');
        $post->category_id=$request->input('category');
        $post->body = Purifier::clean($request->input('body'));
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $post->image = $filename;

            $miniature = $request->file('image');
            $filename = time() . '_min.' . $miniature->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($miniature)->resize(200, 100)->save($location);
            $post->image_miniature = $filename;
        }
        $post->save();

        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync(array());
        }


        // set flash data with success message
        Session::flash('success', 'Le post a bien ete mis à jour.');
        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->tags()->detach();
        $post->delete();
        Session::flash('success', 'Le post a bien ete supprimé.');

        return redirect()->route('posts.index');
    }
}
