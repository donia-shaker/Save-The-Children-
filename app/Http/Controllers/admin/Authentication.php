<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\VerificationPassword;
use App\Models\ResetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Authentication extends Controller
{
    public function showRegister(){
        return view('admin.register');
    }

    public function saveUser(Request $request){
        // return $request;
        Validator::validate($request->all(), [
            'name' => ['required', 'min:3', 'max:20'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:5'],
            'confirmPass' => ['same:password'],
        ]);
        $user =new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $token=Str::uuid();
        $user->remember_token = $token;
        if($user->save())
        $user->attachRole('admin');
        return redirect()->route('users')->with(
            ['success' => 'تم انشاء الحساب بنجاح ']);
    }

    public function showLogin(){
        if (Auth::check())
            return redirect()->route($this->checkRole());
        else
            return view('web.login');
    }

    public function userlogin(Request $request){
        Validator::validate($request->all(), [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'min:5'],
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->route('login')->with(['password'=>false, 'password' => 'اوبس! كلمة السر غير صحيحة']);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password , 'is_active' => 1])) {
            // if (Auth::user()->hasRole('admin'))
            if(Auth::user()->isAbleTo('all_dashboard') ||
            Auth::user()->isAbleTo('manage_services'))
                return redirect()->route('services');
            else if(Auth::user()->isAbleTo('manage_location'))
            return redirect()->route('countries');
            else if(Auth::user()->isAbleTo('manage_content'))
            return redirect()->route('news');
            else
            Auth::logout();
        } else {
            return redirect()->back()->with([
                'error' => '  عذرا! تاكد من تفعيل حسابك اولا',
            ]);
        }
    }

    public function showResetPassword(){
        return view('web.resetPassword');
    }

    public function resetPassword(Request $request){
        // return $request;
        Validator::validate($request->all(),[
            'email'=>['required','email'],
        ]);

        $user=new ResetPassword();
        $user->email=$request->email;

        $token=Str::uuid();
        $user->token=$token;

        if($user->save()){
        $email_data=array('email'=>$request->email,
        'activation_url'=>URL::to('/')."/verify_password/".$token);
        // return ($email_data);
        try {

            Mail::to($request->email)->send(new VerificationPassword($email_data));
            return  redirect()->back()->with(['success'=>' يرجى مراجعة الايميل لتستطيع تغيير كلمة المرور ']);


            } catch (\Exception ) {

                return back()->with(['error'=>'تأكد من كتابة الايميل بالشكل الصحيح ']);
            }
        }
    }

    public function formPassword($token){
        $resetPass = ResetPassword::select()->where('token', $token)->first();
        $userInfo = User::select()->where('email', $resetPass->email)->first();
        return view('web.newPassword', [
            'userInfo' => $userInfo
        ]);
    }

    public function newPassword(Request $request){
        // return $request;
        Validator::validate($request->all(),[
            'email'=>['required','email'],
            'password'=>['required','min:5'],
            'confirm_pass'=>['same:password']
        ]);

        $id = $request->id;
        $password = Hash::make($request->password);
        $user = User::where('id', $id)->update(['password' => $password]);
        if($user)
        return redirect('login')
        ->with(['success'=>'تم تعديل كلمة المرور بنجاح']);
        return redirect('login')->with(['error'=>'هناك خطا حاول مره اخرى']);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function checkRole()
    {
        if (Auth::user()->hasRole('super_admin') ||
        Auth::user()->isAbleTo('all_dashboard'))
            return 'users';
        else if(Auth::user()->isAbleTo('all_dashboard') ||
        Auth::user()->isAbleTo('manage_services'))
            return 'services';
        else if(Auth::user()->isAbleTo('manage_location'))
        return 'countries';
        else if(Auth::user()->isAbleTo('manage_content'))
        return 'news';
        else
        Auth::logout();
        return 'login';
    }
}