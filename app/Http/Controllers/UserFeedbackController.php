<?php

namespace App\Http\Controllers;

use App\Models\UserFeedback;
use Illuminate\Http\Request;

class UserFeedbackController extends Controller
{
    //
    public function Feedback(Request $request){
        $request->validate([
          'name'=>'required|string|max:255',
          'profession'=>'required|string|max:50',
          'image' => 'required|mimes:jpeg,jpg,png,gif,webp|max:2048',
          'message'=>'required|string|max:400',
        ]);
        $feedback=new UserFeedback();
        $feedback->name=$request->name;
        $feedback->profession=$request->profession;
        $feedback->message=$request->message;
        if($request->hasFile('image')){
            $image=$request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image'),$imageName);
            $feedback->image=$imageName;
        }
        $feedback->save();
        return back()->with('success','Feedback submitted successfully');
    }
   public function GetMessage(Request $request){
    $data=UserFeedback::all();
    return view('parking.about',['datas'=>$data]);
   }
}
