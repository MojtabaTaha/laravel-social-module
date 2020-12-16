<?php

namespace App\Http\Controllers;

use App\Models\Posts;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Posts::all();
        return view('/home', compact('posts'));
    }

    public function user($id)
    {
        $user = User::find($id);
        $posts = $user->posts()->get();

        return view('/user')->with(array('user' => $user, 'posts' => $posts));

    }

    public function store(Request $request)
    {
        $posts = new Posts();
        $posts->user_id = Auth::user()->id;
        $posts->title = $request->input('title');
        $posts->description = $request->input('description');

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/photos/', $filename);
            $posts->image = $filename;
        } else {
            return $request;
            $posts->image = '';
        }

        $posts->save();
        return redirect('/home')->with('posts', $posts);
    }

    public function edit($id){
        $posts = Posts::find($id);
        return view('edit', compact('posts'));
    }

    public function update(Request $request,$id){
        $posts = Posts::find($id);

        $posts->user_id = Auth::user()->id;
        $posts->title = $request->input('title');
        $posts->description = $request->input('description');

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/photos/', $filename);
            $posts->image = $filename;
        }
        $posts->save();
        return redirect('/user'. '/'. $posts->user_id)->with('posts',$posts);
    }

    public function destroy($id){
        $posts = Posts::find($id);
        $posts->delete();
        return redirect('/home')->with('posts', $posts);
    }

}
