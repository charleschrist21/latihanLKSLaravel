<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Admin;

class PostController extends Controller
{
   public function index(Request $request)
   {
        $post = Post::get();

        $session = $request->session()->get('user');

        $find = Admin::get()->where('username', $session);
        

        if ($session) {
            return view('post',['post'=>$post,'find'=>$find]);
        }else{
            return redirect('/');
        }
   }
   public function add(Request $request)
   {
        $this->validate($request,[
            'title' => 'required',
            'location' => 'required',
            'category' => 'required',
            'photoBy' => 'required',
            'description' => 'required',
            'file' => 'required|image|file'
        ]);

        $file = $request->file('file');

        $fileName = time() . "_" . $file->getClientOriginalName();

        $fileStorage = 'data_file';

        $file->move($fileStorage,$fileName);

        Post::create([
            'title' => $request->title,
            'location' => $request->location,
            'category' => $request->category,
            'photoBy' => $request->photoBy,
            'description' => $request->description,
            'image' => $fileName
        ]);

        return redirect()->back();  
   }

   public function edit(Request $request)
   {
        $this->validate($request,[
            'id' => 'required',
            'title' => 'required',
            'location' => 'required',
            'category' => 'required',
            'photoBy' => 'required',
            'description' => 'required',
            'file' => 'required|image|file'
        ]);

        $file = $request->file('file');

        $fileName = time() . "_" . $file->getClientOriginalName();

        $fileStorage = 'data_file';

        $file->move($fileStorage,$fileName);

        $id = $request->id;

        $post = Post::find($id);
        $post->title = $request->title;
        $post->location = $request->location;
        $post->category = $request->category;
        $post->photoBy = $request->photoBy;
        $post->description = $post->description;
        $post->image = $fileName;
        $post->save();

        return redirect()->back();
   }

   public function delete($id)
   {
        $post = Post::find($id);
        $post->delete();

        return redirect()->back();
   }
}
