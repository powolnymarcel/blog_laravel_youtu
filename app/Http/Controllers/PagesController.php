<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller{
    public function getIndex()
    {
        $posts = Post::orderBy('created_at','DESC')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout()
    {
        return view('pages.about');

    }
    public function getContact()
    {
        return view('pages.contact');

    }

    public function postContact(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'sujet' => 'min:3',
            'message' => 'min:10']);
        $data = array(
            'email' => $request->email,
            'sujet' => $request->sujet,
            'bodyMessage' => $request->message
        );

        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('powolnymarcel@gmail.com');
            $message->subject($data['sujet']);
        });
        Session::flash('success', 'email envoyé!');
        return redirect('/');
    }






}






























