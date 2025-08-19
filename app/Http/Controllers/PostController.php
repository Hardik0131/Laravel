<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('categories')->latest()->get();
        return view('post.create', compact('posts'));
    }

    public function create(){
        $categories =  Category::where('username', Auth::user()->username)->get();
        return view('partial.post', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'post_name' => 'required|max:255',
            'image' => 'nullable|mimes:jpg,pbg,jpeg,webp',
            'desc' => 'nullable',
        ]);

        $filename = NULL;

        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $path = 'public/image/post';
            $filename = time().'.'. $extension;
            $file->move($path, $filename);
        }

        $post = Post::create([
            'username' => Auth::user()->username,
            'post_name' => $request->post_name,
            'image' => $filename,
            'desc' => $request->desc,
        ]);

        if($request->has('category_id')){
            $categories = [];
            foreach($request->category_id as $categoryId){
                $categories[$categoryId] = ['username' => Auth::user()->username];
            }
            $post->categories()->attach($categories);
        }

        return back()->with('success', 'Post created Succesfully.');
    }
}
