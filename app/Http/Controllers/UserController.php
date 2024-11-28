<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    public function myAccount()
    {    
        $data['getRecord'] =User::getSingle(Auth::user()->id);
        $data['header_title'] = "My Account";
        if (Auth::user()->user_type ==2) {
            return view('teacher.my_account', $data);
        }elseif (Auth::user()->user_type ==1)  {
            return view('admin.my_account', $data);
        }elseif (Auth::user()->user_type ==3)  {
            return view('parent.my_account', $data);
        }elseif (Auth::user()->user_type ==4)  {
            return view('student.my_account', $data);
        }
        
          }

          public function UpdateMyAccountAdmin(Request $request)
          {
              $id=Auth::user()->id;
              request()->validate([
              'email' => 'required|email|unique:users,email,'.$id
        

            ]);

               $admin = User::getSingle($id);
            $user->name =trim($request->name);
             $user->email =trim($request->email);
              $user->save();

        return redirect()->back()->with('success', 'Admin Successfully Updated');


       
          }





   public function UpdateMyAccount(Request $request)
    {   
        $id=Auth::user()->id;
        request()->validate([
        'email' => 'required|email|unique:users,email,'.$id,
        'mobile_number' => 'max:10|min:8',
        'marital_status' => 'max:10'

    ]);

        $teacher = User::getSingle($id);
        $teacher->name =trim($request->name);
        $teacher->last_name =trim($request->last_name);
        $teacher->email =trim($request->email);
        $teacher->gender =trim($request->gender);
      if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth =trim($request->date_of_birth);
        }
    
        $teacher->mobile_number =trim($request->mobile_number);
        $teacher->marital_status =trim($request->marital_status);
        $teacher->current_address =trim($request->current_address);
        $teacher->permanent_address=trim($request->permanent_address);
        $teacher->qualification  =trim($request->qualification);
        $teacher->work_experience =trim($request->work_experience);
        
 
        $teacher->save();

        return redirect()->back()->with('success', 'Account Successfully Updated');
          }


    
   public function UpdateMyAccountStudent(Request $request){
         $id=Auth::user()->id;
             request()->validate([
        'email' => 'required|email|unique:users,email,'.$id,
        'blood_group' => 'max:10',
        'mobile_number' => 'max:10|min:8',
        'caste' => 'max:50',
        'religion' => 'max:50',
        'height' => 'max:10',
        'weight' => 'max:10'

    ]);
        $student = User::getSingle($id);
        $student->name =trim($request->name);
        $student->last_name =trim($request->last_name);
        
        $student->gender =trim($request->gender);
        if (!empty($request->date_of_birth)) {
            $student->date_of_birth =trim($request->date_of_birth);
        }
        $student->hobbies =trim($request->hobbies);

        $student->caste  =trim($request->caste);
        $student->religion =trim($request->religion);
        $student->mobile_number =trim($request->mobile_number);
      
        $student->blood_group =trim($request->blood_group);
        $student->height =trim($request->height);  
        $student->weight =trim($request->weight);

        $student->email =trim($request->email);
        
        
        $student->save();

        return redirect()->back()->with('success', 'Account Successfully Updated');
   }

   public function UpdateMyAccountParent(Request $request){
         $id=Auth::user()->id;

     request()->validate([
        'email' => 'required|email|unique:users,email,'.$id,
        'mobile_number' => 'max:10|min:8',
        'occupation' => 'max:255',
        'address' => 'max:255'

    ]);
        $parent = User::getSingle($id);
       $parent->name =trim($request->name);
       $parent->last_name =trim($request->last_name);
        $parent->gender =trim($request->gender);
       $parent->mobile_number =trim($request->mobile_number);
        $parent->occupation =trim($request->occupation);
       $parent->address =trim($request->address);  
      
     

       $parent->email =trim($request->email);
     
      
       $parent->save();

        return redirect()->back()->with('success', 'Parent Successfully Updated');
    
   }

    public function change_password()
    {   
        $data['header_title'] = "change_password";
        return view('profile.change_password', $data);
          }
          public function update_change_password(Request $request)
          {
              $user = User::getSingle(Auth::user()->id);    
              if (Hash::check($request->old_password, $user->password)) {
                        $user->password =Hash::make($request->new_password);
                        $user->save();

                        return redirect()->back()->with('success', "Password successfully updated");
                    }      else{

                        return redirect()->back()->with('error', "Old Password is not Correct");

                    }
          }
      }
