<?php

namespace App\Http\Controllers;

use App\Models\UserFeedback;
use App\Models\Parking;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Home()
    {
        $parkings=Parking::all();
        return view('parking.home',['parking'=>$parkings]);
    }
    
    
    public function About()
    {
        $data=UserFeedback::all();
        return view('parking.about',['datas'=>$data]);
    }

    public function Services(){
       return view('parking.services');
    }
    
    public function Contact(){
        return view('parking.contact');
    }

    public function Parking(Request $request){
        $request->validate([
            'name' =>'required|string|max:255',
            'vehicleNumber' =>'required|string|max:10',
            'slotNumber' => 'required|string',
            'image'=> 'mimes:web,jpeg,png,jpg,gif|max:2048',
            
        ]);
       
       $parking=new Parking();
       $parking->name=$request->name;
       $parking->vehicleNumber=$request->vehicleNumber;
       $parking->slotNumber=$request->slotNumber;
       $parking->status='BOOKED';

       if($request->hasFile('image')){
        $image=$request->file('image');
        $imageName=time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $parking->image=$imageName;
       }
       $parking->save();
        return redirect()->route('home')->with('message', 'Vahicle parking  successful');
        
    }

    public function Search(Request $request){
        $search=$request->search;
        $parking=Parking::where('vehicleNumber','LIKE','%'.$search.'%')->get();
        return view('parking.home',compact('parking'));
    }
 
    public function Price(){
        return view('parking.pricing');
    }
    public function UpdateStatus($id){
            $update=Parking::find($id);
            $update->status="UnBooked";
            $update->save();
            return redirect()->route('home')->with('message', 'Exit vahicle successfully');
    }
}
