<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\SubjectModel;
use App\Models\ClassSubjectModel;
use App\Models\User;

class SubjectController extends Controller
{
     public function list()
    {
        $data['getRecord'] = SubjectModel::getRecord();
        $data['header_title'] = "Subject List";
        return view('admin.subject.list', $data);
    }
 public function add()
    {
        $data['header_title'] = "Add New Subject";
        return view('admin.subject.add', $data);
    }

    public function insert(Request $request)
    {
        $save = new SubjectModel;
        $save->name = trim($request->name);
        $save->type = trim($request->type);
        $save->status = trim($request->status);
        $save->created_by = Auth::user()->id;

        $save->save();

        return redirect('admin/subject/list')->with('success', "Subject Successfully Created");
    }

    public function edit($id)
    {
        $data['getRecord'] = SubjectModel::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Subject";
            return view('admin.subject.edit', $data);
        }else{
            abort(404);

        }
    }
     public function update($id, Request $request){
        $save = SubjectModel::getSingle($id);
        $save->name = trim($request->name);
        $save->type = trim($request->type);
        $save->status = trim($request->status);

        $save->save();
        return redirect('admin/subject/list')->with('success', "Subject Successfully Updated");

     }

     public function delete($id)
     {
          $save = SubjectModel::getSingle($id);
        $save->is_delete = 1;

        $save->save();
        return redirect()->back()->with('success', "Subject Successfully Deleted");
     }

     // student sude

     public function mySubject()
     {   
         $data['getRecord'] = ClassSubjectModel::mySubject(Auth::user()->class_id);
        $data['header_title'] = "My Subject";
        return view('student.my_subject', $data);
     }

     // parent side
     public function ParentStudentSubject($student_id)
     {
         $user= User::getSingle($student_id);
         $data['getUser'] =$user;
         $data['getRecord'] = ClassSubjectModel::mySubject($user->class_id);
        $data['header_title'] = "Student Subject";
        return view('parent.my_student_subject', $data);
     }


     public function report()
{
    $data['getRecord'] = SubjectModel::where('is_delete', 0)->paginate(10);
    $data['header_title'] = "Subject Report";
    return view('admin.report.subject', $data);
}
}
