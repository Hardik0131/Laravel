<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create(){
        return view('partial.category');
    }

    public function store(Request $request){
        $request->validate([            
            'category_name' => 'required|unique:categories,category_name,NULL,id,username,' . Auth::user()->username,
            'image' => 'nullable|mimes:jpg,jpeg,webp,png',
            'short_desc' => 'required',
            'long_desc' => 'nullable',
        ]);

        $filename = NULL;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'. $extension;
            $path = 'public/image/category';
            $file->move($path, $filename);
        }

        Category::create([
            'username' => Auth::user()->username,
            'category_name' => $request->category_name,
            'image' => $filename,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
        ]);

        

        return back()->with('success', 'Category added Succesfully');
    }
}
