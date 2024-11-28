   <?php

   use Illuminate\Support\Facades\Route;
   use App\Http\Controllers\AuthController;
   use App\Http\Controllers\DashboardController;
   use App\Http\Controllers\AdminController;
   use App\Http\Controllers\ClassController;
   use App\Http\Controllers\SubjectController;
   use App\Http\Controllers\ClassSubjectController;
   use App\Http\Controllers\UserController;
   use App\Http\Controllers\StudentController;
   use App\Http\Controllers\ParentController;
   use App\Http\Controllers\TeacherController;
   use App\Http\Controllers\AssignClassTeacherController;
   use App\Http\Controllers\ClassTimetableController;
   use App\Http\Controllers\AttendanceController;
   use App\Http\Controllers\CommunicateController;
   use App\Http\Controllers\ChatController;
   use App\Http\Controllers\StudentReportController;








   /*
   |--------------------------------------------------------------------------
   | Web Routes
   |--------------------------------------------------------------------------
   |
   | Here is where you can register web routes for your application. These
   | routes are loaded by the RouteServiceProvider and all of them will
   | be assigned to the "web" middleware group. Make something great!
   |
   */

   // Route::get('/', function () {
   //     return view('welcome');
   // });
   Route::get('/', [AuthController::class, 'login']);
   Route::post('login', [AuthController::class, 'AuthLogin']);
   Route::get('logout', [AuthController::class, 'logout']);
   Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
   Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
   Route::group(['middleware' => 'common'], function(){
      Route::get('chat', [ChatController::class, 'chat']);

   });






   Route::group(['middleware' => 'admin'], function(){
      Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
      Route::get('admin/admin/list', [AdminController::class, 'list']);
         Route::get('admin/admin/add', [AdminController::class, 'add']);
         Route::post('admin/admin/add', [AdminController::class, 'insert']);
         Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
          Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
          Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);

          


          //Student

           Route::get('admin/student/list', [StudentController::class, 'list']);
         Route::get('admin/student/add', [StudentController::class, 'add']);
         Route::post('admin/student/add', [StudentController::class, 'insert']);
         Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);
          Route::post('admin/student/edit/{id}', [StudentController::class, 'update']);
          Route::get('admin/student/delete/{id}', [StudentController::class, 'delete']);


          //parent

           Route::get('admin/parent/list', [ParentController::class, 'list']);
         Route::get('admin/parent/add', [ParentController::class, 'add']);
         Route::post('admin/parent/add', [ParentController::class, 'insert']);
         Route::get('admin/parent/edit/{id}', [ParentController::class, 'edit']);
          Route::post('admin/parent/edit/{id}', [ParentController::class, 'update']);
          Route::get('admin/parent/delete/{id}', [ParentController::class, 'delete']);
          Route::get('admin/parent/my_student/{id}', [ParentController::class, 'myStudent']);
             Route::get('admin/parent/assign_student_parent/{student_id}/{parent_id}', [ParentController::class, 'assignStudentParent']);
             Route::get('admin/parent/assign_student_parent_delete/{student_id}', [ParentController::class, 'assignStudentParentDelete']);
             Route::get('admin/parent/report', [ParentController::class, 'report'])->name('parent.report');

          


          //teacher

           Route::get('admin/teacher/list', [TeacherController::class, 'list']);
         Route::get('admin/teacher/add', [TeacherController::class, 'add']);
         Route::post('admin/teacher/add', [TeacherController::class, 'insert']);
         Route::get('admin/teacher/edit/{id}', [TeacherController::class, 'edit']);
          Route::post('admin/teacher/edit/{id}', [TeacherController::class, 'update']);
          Route::get('admin/teacher/delete/{id}', [TeacherController::class, 'delete']);
        Route::get('admin/teacher/report', [TeacherController::class, 'report'])->name('teacher.report');
        Route::get('admin/student/report', [StudentController::class, 'report'])->name('student.report');



          

          // class url
         Route::get('admin/class/list', [ClassController::class, 'list']);
         Route::get('admin/class/add', [ClassController::class, 'add']);
         Route::post('admin/class/add', [ClassController::class, 'insert']);
         Route::get('admin/class/edit/{id}', [ClassController::class, 'edit']);
          Route::post('admin/class/edit/{id}', [ClassController::class, 'update']);
          Route::get('admin/class/delete/{id}', [ClassController::class, 'delete']);
          Route::get('admin/class/report', [ClassController::class, 'report'])->name('class.report');


         // subject url
          Route::get('admin/subject/list', [SubjectController::class, 'list']);
         Route::get('admin/subject/add', [SubjectController::class, 'add']);
         Route::post('admin/subject/add', [SubjectController::class, 'insert']);
         Route::get('admin/subject/edit/{id}', [SubjectController::class, 'edit']);
          Route::post('admin/subject/edit/{id}', [SubjectController::class, 'update']);
          Route::get('admin/subject/delete/{id}', [SubjectController::class, 'delete']);


          //report
          Route::get('admin/report/student', [StudentReportController::class, 'index'])->name('admin.report.student');
          
          Route::get('admin/report/teacher', [TeacherController::class, 'teacherReport'])->name('teacher.report');
         
Route::get('admin/report/parent', [ParentController::class, 'report']);
Route::get('admin/report/class', [ClassController::class, 'report']);
Route::get('admin/report/subject', [SubjectController::class, 'report'])->name('subject.report');









          // assign_subject url
          Route::get('admin/assign_subject/list', [ClassSubjectController::class, 'list']);
         Route::get('admin/assign_subject/add', [ClassSubjectController::class, 'add']);
         Route::post('admin/assign_subject/add', [ClassSubjectController::class, 'insert']);
         Route::get('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'edit']);
          Route::post('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'update']);
          Route::get('admin/assign_subject/delete/{id}', [ClassSubjectController::class, 'delete']);
          Route::get('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'edit_single']);
          Route::post('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'update_single']);


          Route::get('admin/class_timetable/list', [ClassTimetableController::class, 'list']);
          Route::post('admin/class_timetable/get_subject', [ClassTimetableController::class, 'get_subject']);
          Route::post('admin/class_timetable/add', [ClassTimetableController::class, 'insert_update']);
          
 
          
          Route::get('admin/account', [UserController::class, 'myAccount']); 
            Route::post('admin/account', [UserController::class, 'UpdateMyAccountAdmin']);  

          
          Route::get('admin/change_password', [UserController::class, 'change_password']);
         Route::post('admin/change_password', [UserController::class, 'update_change_password']);


          Route::get('admin/change_password', [UserController::class, 'change_password']);

   Route::get('admin/attendance/student', [AttendanceController::class, 'AttendanceStudent']);
   Route::post('admin/attendance/student/save', [AttendanceController::class, 'AttendanceStudentSubmit']);


   Route::get('admin/attendance/report', [AttendanceController::class, 'AttendanceReport']);
   Route::get('admin/communicate/notice_board', [CommunicateController::class, 'NoticeBoard']);


   Route::get('admin/communicate/notice_board/add', [CommunicateController::class, 'AddNoticeBoard']);
   Route::post('admin/communicate/notice_board/add', [CommunicateController::class, 'InsertNoticeBoard']);

     Route::get('admin/communicate/notice_board/edit/{id}', [CommunicateController::class, 'EditNoticeBoard']);
   Route::post('admin/communicate/notice_board/edit/{id}', [CommunicateController::class, 'UpdateNoticeBoard']);

     Route::get('admin/communicate/notice_board/delete/{id}', [CommunicateController::class, 'DeleteNoticeBoard']);
      Route::get('admin/communicate/send_email', [CommunicateController::class, 'SendEmail']);
     Route::post('admin/communicate/send_email', [CommunicateController::class, 'SendEmailUser']);

      Route::get('admin/communicate/search_user', [CommunicateController::class, 'SearchUser']);



      // report


Route::get('admin/report/student', [StudentReportController::class, 'index'])->name('admin.report.student');



   });




         // assign class teacher
   
        Route::get('admin/assign_class_teacher/list', [AssignClassTeacherController::class, 'list']);
        Route::get('admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'add']);
        Route::post('admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'insert']);
        
        Route::get('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'edit']);
        Route::post('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'update']);
        Route::get('admin/assign_class_teacher/edit_single/{id}', [AssignClassTeacherController::class, 'edit_single']);
        Route::post('admin/assign_class_teacher/edit_single/{id}', [AssignClassTeacherController::class, 'update_single']);
         Route::get('admin/assign_class_teacher/delete/{id}', [AssignClassTeacherController::class, 'delete']);
        





       Route::group(['middleware' => 'teacher'], function(){
      Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);
      
         Route::get('teacher/change_password', [UserController::class, 'change_password']);
         Route::post('teacher/change_password', [UserController::class, 'update_change_password']);
            Route::get('teacher/account', [UserController::class, 'myAccount']); 
            Route::post('teacher/account', [UserController::class, 'UpdateMyAccount']);   


            Route::get  ('teacher/my_student', [StudentController::class, 'myStudent']);   

              
            Route::get('teacher/my_class_subject', [AssignClassTeacherController::class, 'MyClassSubject']); 
            Route::get('teacher/my_class_subject/class_timetable/{class_id}/{subject_id', [ClassTimetableController::class, 'MyTimetableTeacher']); 

            Route::get('teacher/attendance/student', [AttendanceController::class, 'AttendanceStudentTeacher']);
   Route::post('teacher/attendance/student/save', [AttendanceController::class, 'AttendanceStudentSubmit']);
   Route::get('teacher/attendance/report', [AttendanceController::class, 'AttendanceReportTeacher']);
       Route::get('teacher/my_notice_board', [CommunicateController::class, 'MyNoticeBoardTeacher']); 


   });

   Route::group(['middleware' => 'parent'], function(){
       Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);

       Route::get('parent/change_password', [UserController::class, 'change_password']);
         Route::post('parent/change_password', [UserController::class, 'update_change_password']);
          Route::get('parent/account', [UserController::class, 'myAccount']); 
            Route::post('parent/account', [UserController::class, 'UpdateMyAccountParent']); 
          Route::get('parent/my_student', [ParentController::class, 'myStudentParent']); 

          Route::get('parent/my_student/subject/{student_id}', [SubjectController::class, 'ParentStudentSubject']); 
         Route::get('parent/my_student/subject/class_timetable/{class_id}/{subject_id/{student_id}', [ClassTimetableController::class, 'MyTimetableParent']); 

         Route::get('parent/my_student', [ParentController::class, 'myStudentParent']); 

            Route::get('parent/my_student/attendance/{student_id}', [AttendanceController::class, 'MyAttendanceParent']); 

 Route::get('parent/my_notice_board', [CommunicateController::class, 'MyNoticeBoardParent']); 
               

   });

   Route::group(['middleware' => 'student'], function(){
       Route::get('student/dashboard', [DashboardController::class, 'dashboard']);

       Route::get('student/change_password', [UserController::class, 'change_password']);
         Route::post('student/change_password', [UserController::class, 'update_change_password']);
          Route::get('student/account', [UserController::class, 'myAccount']); 
            Route::post('student/account', [UserController::class, 'UpdateMyAccountStudent']);

            Route::get('student/my_subject', [SubjectController::class, 'mySubject']); 
            Route::get('student/my_timetable', [ClassTimetableController::class, 'MyTimetable']); 
            Route::get('student/my_attendance', [AttendanceController::class, 'MyAttendanceStudent']); 
       Route::get('student/my_notice_board', [CommunicateController::class, 'MyNoticeBoardStudent']); 

           
     
           
   });
