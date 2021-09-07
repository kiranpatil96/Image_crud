<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\File;
class StudentController extends Controller
{
    //create index method here.
    public function index()
    {
      $student = Student::all();
      return view('students.index',compact('student'));
    }

    public function create()
    {
      return view('students.create');
    }

    public function store(Request $request)
    {
      $student = new Student;
      $student->name = $request->input('name');
      $student->email = $request->input('email');
      // var_dump($student);exit();
      // $student->profile_image = $request->input('profile_image');

      if($request->hasfile('profile_image'))
      {
        $file = $request->file('profile_image');
        // echo "<pre>"; print_r($file);exit();
      $extention = $file->getClientOriginalExtension();
        $filename = time() .'.'.$extention;
        $file->move('public/uploads/images/',$filename);
        $student->profile_image = $filename;
      }

     //  if ($request()->hasfile('profile_image'))
     //  {
     //   $uploadedImage = $request->file('profile_image');
     //   echo "<pre>"; print_r( $uploadedImage);exit();
     //   $imageName = time() . '.' . $image->getClientOriginalExtension();
     //   $destinationPath = public_path('/uploads/images/');
     //   $uploadedImage->move($destinationPath, $imageName);
     //   $image->imagePath = $destinationPath . $imageName;
     //   $student->profile_image = $imageName;
     // }

      $student->save();
      // return view('students.create');
      return redirect(url('students'));
    }

    public function edit($id)
    {
      $student = Student::find($id);
      return view('students.edit',compact('student'));
    }
    public function update(Request $request, $id)
   {
       $student = Student::find($id);
       $student->name = $request->input('name');
       $student->email = $request->input('email');


       if($request->hasfile('profile_image'))
       {
           $destination = 'public/uploads/images/'.$student->profile_image;
           if(File::exists($destination))
           {
               File::delete($destination);
           }
           $file = $request->file('profile_image');
           $extention = $file->getClientOriginalExtension();
           $filename = time().'.'.$extention;
           $file->move('public/uploads/images/', $filename);
           $student->profile_image = $filename;
       }

       $student->update();
       // return redirect()->route('students.index')->with('status','Student Data Updated Successfully');
       return redirect(url('students'));
   }
   public function destroy($id)
   {
       $student = Student::find($id);
       $destination = 'public/uploads/images/'.$student->profile_image;
       if(File::exists($destination))
       {
           File::delete($destination);
       }
       $student->delete();
       return redirect()->back()->with('status','Student Image Deleted Successfully');
   }

}
