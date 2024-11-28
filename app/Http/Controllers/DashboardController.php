<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\ClassModel;
use App\Models\SubjectModel;
use App\Models\AssignClassTeacherModel;
use App\Models\NoticeBoardModel;
use App\Models\ClassSubjectModel;
use App\Models\StudentAttendanceModel;



class DashboardController extends Controller
{
    public function dashboard(){
        $data['header_title'] = 'Dashboard';
        if(Auth::user()->user_type ==1){
            $data['TotalAdmin']= User::getTotalUser(1);
            $data['TotalTeacher']= User::getTotalUser(2);
            $data['TotalParent']= User::getTotalUser(3);
            $data['TotalStudent']= User::getTotalUser(4);
            $data['TotalClass']= ClassModel::getTotalClass();
            $data['TotalSubject']= SubjectModel::getTotalSubject();

                     return view('admin.dashboard', $data);

              } 
              else if(Auth::user()->user_type ==2){
            $data['TotalStudent']= User::getTeacherStudentCount(Auth::user()->id);
            $data['TotalClass']= AssignClassTeacherModel::getMyClassSubjectGroupCount(Auth::user()->id);
            $data['TotalSubject']= AssignClassTeacherModel::getMyClassSubjectCount(Auth::user()->id);
            $data['TotalNoticeBoard']= NoticeBoardModel::getRecordUserCount(Auth::user()->user_type);
                 return view('teacher.dashboard', $data);
            
              } 
              else if(Auth::user()->user_type ==3){
          $data['TotalStudent']= User::getMyStudentTotal(Auth::user()->id);
            $data['TotalNoticeBoard']= NoticeBoardModel::getRecordUserCount(Auth::user()->user_type);
            $data['TotalAttendance']= StudentAttendanceModel::getRecordStudentTotal(Auth::user()->id);

                 return view('parent.dashboard', $data);

              } 
              else if(Auth::user()->user_type ==4){
             $data['TotalSubject']= ClassSubjectModel::mySubjectTotal(Auth::user()->class_id);
            $data['TotalNoticeBoard']= NoticeBoardModel::getRecordUserCount(Auth::user()->user_type);
            $data['TotalAttendance']= StudentAttendanceModel::getRecordStudentTotal(Auth::user()->id);
            
                  return view('student.dashboard', $data);

              }  
    }
}
