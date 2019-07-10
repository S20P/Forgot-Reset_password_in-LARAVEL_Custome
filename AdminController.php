<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Mail;
use Validator;

class AdminController extends Controller
{

    public function getResetAdminPassword()
    {
        return view('ResetPasswod.reset_password');
    }

    public function postResetAdminPassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if (!$validator->fails()) {

            $email = request()->input('email');
            $user = Admin::where('email', $email)->first();

            if ($user) {
                $token = str_random(64);
                $user_name = $user->first_name." ".$user->last_name;
                $mail = Mail::send('ResetPasswod.emails.SendReserPasswordLink', ['actionUrl' => $token, 'email' => $email,"user_name"=>$user_name], function (Message $message) use ($user) {
                    $message->subject(config('app.name') . ' Password Reset Link');
                    $message->to($user->email);
                });

                Admin::where('email', $email)->update([
                    "password_reset_token" => $token,
                ]);
                return back()->with('success', 'Mail sent successfully.');

            } else {
                return back()->with('error', 'User not Found for this Email Address.');

            }

        }else{
            return redirect()->back()->withInput()->withErrors($validator);
        }

    }

    public function resetPassword(Request $request, $email, $verificationLink)
    {
        $user = Admin::where('email', $email)->where('password_reset_token', "=", $verificationLink)->first();
        $userid = $user->id;
        $data["userid"] = $userid;
        return view('ResetPasswod.new_password', $data);
    }

    public function newPassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        if (!$validator->fails()) {
            $param = $request->all();
            $userid = $param['userid'];
            $new_password = $param['new_password'];
            $data["password"] = bcrypt($new_password);
            $updated_status = Admin::where("id", $userid)->update($data);

            if ($updated_status) {

                return redirect('/admin/login')->with("success", 'Password Reset successfully.');
            }

        } else {

            return redirect()->back()->withInput()->withErrors($validator);
        }
    }

}
