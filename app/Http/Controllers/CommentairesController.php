<?php

namespace App\Http\Controllers;

use App\Commentaire;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class CommentairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $this->validate($request, array(
            'name'      =>  'required|max:255',
            'email'     =>  'required|email|max:255',
            'commentaire'   =>  'required|min:5|max:2000'
        ));
        $post = Post::find($post_id);
        $comment = new Commentaire();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->commentaire = $request->commentaire;
        $comment->approved = true;
        $comment->post()->associate($post);
        $comment->save();
        Session::flash('success', 'Commentaire ajouté');

        return redirect()->route('blog.single', [$post->slug]);
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
        $commentaire = Commentaire::find($id);
        return view('commentaires.edit')->withCommentaire($commentaire);
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
        $commentaire = Commentaire::find($id);
        $this->validate($request, array('commentaire' => 'required'));
        $commentaire->commentaire = $request->commentaire;
        $commentaire->save();
        Session::flash('success', 'Commentaire mis à jour');
        return redirect()->route('posts.show', $commentaire->post->id);
    }
    public function delete($id)
    {
        $commentaire = Commentaire::find($id);
        return view('commentaires.delete')->withComment($commentaire);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commentaire = Commentaire::find($id);
        $post_id = $commentaire->post->id;
        $commentaire->delete();
        Session::flash('success', 'Commentaire supprimé');
        return redirect()->route('posts.show', $post_id);
    }
}