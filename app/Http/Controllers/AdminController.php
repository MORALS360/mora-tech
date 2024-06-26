<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use \App\Models\Post;
    use Illuminate\Support\Facades\Auth;
    class AdminController extends Controller
    {
        Public function post_page (){

            return view('admin.post_page');
        }


       Public function add_post(Request $request)
       {
              $user=Auth()->user();
              $user_id=$user->id;
              $name=$user->name;
              $usertype=$user->usertype;


              $post =new Post;
              $post->title =  $request ->title;
              $post->description =  $request ->description;
              $post->user_id =  $user_id;
              $post->name =  $name;
              $post->usertype =  $usertype;
              $post->post_status ='active';

 ////////////////////////
 $image=$request-> image;

 if($image)
 {
   $imagename=time().'.'.$image->getClientOriginalExtension();
   $request->image->move('postimage',$imagename);
   $post->image-> $imagename;
 }


 $post -> save();

 return redirect()->back()->with('message','Post Added Successfully');
       }
    }

