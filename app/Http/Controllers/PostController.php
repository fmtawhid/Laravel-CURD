<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function createController(Request $request){

        $validation = $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'image' =>'nullable',  
            ],
        );

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName); 

        $post = new Post();

        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $imageName;
        $post->save();
        return redirect()->route('home')->with('success', 'Added Your Post');
        
    }
    public function editController($id){
        $post = Post::findOrFail($id);
        return view('update', ['ourpost'=> $post]);
    }


    public function updateController(Request $request, $id){
        $validation = $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'image' => 'nullable|image', 
            ]
        );
    
        $post = Post::findOrFail($id);
    
        
        $post->name = $request->name;
        $post->description = $request->description;
    
        
        if ($request->hasFile('image') && $request->image->isValid()) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }
        $post->save();
    
        return redirect()->route('home')->with('success', 'Your post has been updated.');
    }
    public function deleteController($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('home')->with('success', 'Your post has been deleted.');
    }
}
