<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Hash;
use Auth;
use Str;

class ParentController extends Controller
{
   public function list()
    {
        $data['getRecord'] = User::getParent();
        $data['header_title']="Parent List";
         return view('admin.parent.list', $data);
    }
    public function add()
    {     
          $data['header_title']="Add New Parent";
         return view('admin.parent.add', $data);
    }  

    public function insert(Request $request)
    {

        // dd($request->all());

        request()->validate([
        'email' => 'required|email|unique:users',
        'mobile_number' => 'max:10|min:8',
        'occupation' => 'max:255',
        'address' => 'max:255'

    ]);
        $parent = new User;
       $parent->name =trim($request->name);
       $parent->last_name =trim($request->last_name);
        $parent->gender =trim($request->gender);
       $parent->mobile_number =trim($request->mobile_number);
        $parent->occupation =trim($request->occupation);
       $parent->address =trim($request->address);  
      
       $parent->status =trim($request->status);

       $parent->email =trim($request->email);
       $parent->password = Hash::make($request->password);
       $parent->user_type =3;
       $parent->save();

        return redirect('admin/parent/list')->with('success', 'Parent Successfully Created');


    }
    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
          
          $data['header_title']="Edit Parent";
         return view('admin.parent.edit', $data);
        }else{
            abort(404);
        }
        
    }

    public function update($id, Request $request)
    {

       
        request()->validate([
        'email' => 'required|email|unique:users,email,'.$id,
        'mobile_number' => 'max:10|min:8',
        'occupation' => 'max:255',
        'address' => 'max:255'

    ]);
        $parent = new User;
       $parent->name =trim($request->name);
       $parent->last_name =trim($request->last_name);
        $parent->gender =trim($request->gender);
       $parent->mobile_number =trim($request->mobile_number);
        $parent->occupation =trim($request->occupation);
       $parent->address =trim($request->address);  
      
       $parent->status =trim($request->status);

       $parent->email =trim($request->email);
       if (!empty($request->password)) {
          $parent->password = Hash::make($request->password);
        }
       
      
       $parent->save();

        return redirect('admin/parent/list')->with('success', 'Parent Successfully Updated');


    } 
    public function delete($id)
    {
     $getRecord = User::getSingle($id);
     if (!empty($getRecord)) {
         $getRecord->is_delete =1;
     $getRecord->save();

        return redirect()->back()->with('success', 'Parent successfully deleted');
     }else{
        abort(404);
     }
     
    }
    public function myStudent($id)
    {
        $data['getParent'] =User::getSingle($id);
        $data['parent_id']= $id;
        $data['getSearchStudent'] = User::getSearchStudent();
        $data['getRecord'] = User::getMyStudent($id);

        $data['header_title']="Parent Student List";
         return view('admin.parent.my_student', $data);
    }
        public function assignStudentParent($student_id, $parent_id)
        {
            $student =User::getSingle($student_id);
            $student->parent_id =$parent_id;
            $student->save();

     return redirect()->back()->with('success', 'Student successfully Assign');

        }

         public function assignStudentParentDelete($student_id)
        {
            $student =User::getSingle($student_id);
            $student->parent_id = null;
            $student->save();

     return redirect()->back()->with('success', 'Student successfully Assign Deleted');

        }
        


        //parent side
        public function myStudentParent()
        {
            $id=Auth::user()->id;
        $data['getRecord'] = User::getMyStudent($id);

        $data['header_title']="My Student";
         return view('parent.my_student', $data);
        }
        
 
        
        public function report()
{
    $data['getRecord'] = User::getParent(); // Assuming getParent() fetches all parent records
    $data['header_title'] = "Parent Report";
    return view('admin.report.parent', $data);
}
       

    
    
}
