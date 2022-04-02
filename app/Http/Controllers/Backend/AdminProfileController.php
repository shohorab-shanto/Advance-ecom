<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;


class AdminProfileController extends Controller
{
    public function AdminProfile(){
        $adminData = Admin::find(1);
        return view('admin.admin_profile_view',compact('adminData'));
    } //end method
    public function AdminProfileEdit(){
        $editData = Admin::find(1); //admin er first row thke data niye asar jnno
        return view('admin.admin_profile_edit',compact('editData'));
    } //end method
    public function AdminProfileStore(Request $request){
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path'); //
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_photo_path']= $filename;
        }
        $data->save();
        $notification = array(
            'message' =>  'Admin Profie Update Sucessyfuly',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);

    } //end method

    public function AdminChangePassword(){
        return view('admin.admin_change_password');
    } //end method

    public function AdminUpdateChangePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required' ,
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Admin::find(1)->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');

        }else{
            return redirect()->back();
        }
    } //end method

    public function AllUsers(){
        $users = User::all();
        return view('backend.user.index',compact('users'));
    }

     //banned user
     public function UserBan($user_id){
        User::findOrFail($user_id)->update(['isban' => 1]);
        $notification=array(
            'message'=>'User Banned',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }

     //unbanned user
    public function UserUnban($user_id){
        User::findOrFail($user_id)->update(['isban' => 0]);
        $notification=array(
        'message'=>'User UnBanned Success',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification);
    }

}
