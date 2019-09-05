<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin;
use Session;

class AdminController extends Controller
{
   public function index(Request $request)
   {
        $admin = Admin::get();
        $session = $request->session()->get('user');

        $find = Admin::get()->where('username',$session);

        if ($session) {
            return view('admin',['admin'=>$admin,'find'=>$find]);
        }
   }

   public function add(Request $request)
   {
        $this->validate($request,[
            'firstName' => 'required',
            'lastName' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'file' => 'required|file|image',
        ]);

        $session = $request->session()->get('user');

        $file = $request->file('file');

        $fileName = time(). '_' .$file->getClientOriginalName();

        $fileStorage = 'data_file';

        $file->move($fileStorage,$fileName);

        $fullName = $request->firstName . $request->lastName;

        Admin::create([
            'fullName' => $fullName,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'addBy' => $session,
            'image' => $fileName
        ]);

        return redirect()->back();
   }

   public function edit(Request $request)
   {
     $this->validate($request,[
            'id' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'file' => 'required|file|image',
        ]);

        $id = $request->id;

        $session = $request->session()->get('user');

        $file = $request->file('file');

        $fileName = time(). '_' .$file->getClientOriginalName();

        $fileStorage = 'data_file';

        $file->move($fileStorage,$fileName);

        $fullName = $request->firstName . $request->lastName;

        $admin = Admin::find($id);
        $admin->fullName = $fullName;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->image = $fileName;
        $admin->save();

        return redirect()->back();
   }

   public function delete($id)
   {
    $admin = Admin::find($id);
    $admin->delete();

    return redirect()->back();
   }

}
