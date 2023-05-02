<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    //
    public function redirect()
    {
        if (Auth::id())
        {
            if(Auth::user()->usertype == '0')
            {
                $doctors =  doctor::all();
                return view('user.home',compact('doctors'));
            }
            else
            {
                return view('admin.home');
            }
        }
        
        else
        {
            return redirect()->back();
        }
    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }
        else
        {
            $doctors =  doctor::all();
            return view('user.home',compact('doctors'));
        }
    }

    public function appointment(Request $request)
    {
        $data = new appointment;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->date=$request->date;
        $data->phone=$request->number;
        $data->message=$request->message;
        $data->doctor=$request->doctor;
        $data->status='In progress';

        if(Auth::id()) //only if user is logged in he/she is assigned an id
        {
            $data->user_id=Auth::user()->id;
        }
        $data->save();

        return redirect()->back()->with('message','Appointment request Successful . We will contact you soon');
        
    }
    
    //displaying appointment
    public function myappointment()
    {
        //unauthenticated user cant view myappointment view page
        if(Auth::id())
        {
            //displaying each users appointment
            $userid = Auth::user()->id;
            $appoints = appointment::where('user_id',$userid)->get();



            return view('user.myappointment',compact('appoints'));
        }
        else
        {
            return redirect()->back();
        }
   
    }

    //delete function
    public function cancel_appoint($id)
    {
        $data = appointment::find($id);
        $data->delete();

        return redirect()->back();
    }



    
}
