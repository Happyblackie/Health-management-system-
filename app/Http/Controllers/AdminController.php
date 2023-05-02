<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;

class AdminController extends Controller
{
    //
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {

        $doctor = new doctor;
        //request from input name
        $image=$request->file; 
        //image will be named as per time difference
        $imagename=time().'.'.$image->getClientoriginalExtension();
        //store image in a folder, will be created automatically
        $request->file->move('doctorimage',$imagename);
        //sending image to database
        $doctor->image=$imagename;

        //sending other input fields to database
        $doctor->name=$request->name;
        $doctor->phone=$request->number;
        $doctor->room=$request->room;
        $doctor->speciality=$request->speciality;

        //save now
        $doctor->save();

        //after saving, saty on the same page
       return redirect()->back()->with('message','Doctor added successfully');
    }

    public function show_appointments()
    {
        $datas = appointment::all();
        return view('admin.show_appointments',compact('datas'));
    }

    public function approved($id)
    {
        $data = appointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back();
    }
    public function canceled($id)
    {
        $data = appointment::find($id);
        $data->status='canceled';
        $data->save();
        return redirect()->back();
    }
    public function show_doctor()
    {
        $data = doctor::all();
       
        return view('admin.show_doctor',compact('data'));
    }

    public function deletedoctor($id)
    {
        $data = doctor::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function updatedoctor($id)
    {
        $data = doctor::find($id);
        return  view('admin.updatedoctor', compact('data'));
    }
    public function editdoctor(Request $request,$id)
    {
        $doctor = doctor::find($id);
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;   

        $image=$request->file; 
        //image will be named as per time difference
        if($image)
        {
            $imagename=time().'.'.$image->getClientoriginalExtension();
            //store image in a folder, will be created automatically
            $request->file->move('doctorimage',$imagename);
            //sending image to database
            $doctor->image=$imagename;
        }
       

        $doctor->save();
         
        return redirect()->back()->with('message','Doctor Details Updated Successfully');
    }
}
