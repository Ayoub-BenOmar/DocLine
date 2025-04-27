<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'title'=>'required|string|max:255',
            'category'=>'required|string:max:255',
            'author'=>'required|string',
            'content'=>'required|string',
            'article_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('article_image')->store('article_images', 'public');

        Articles::create([
            'title'=>$request->title,
            'category'=>$request->category,
            'author'=>$request->author,
            'content'=>$request->content,
            'image'=>$imagePath,
        ]);

        return redirect()->back()->with('success', 'Article created successfully!');
    }
}
