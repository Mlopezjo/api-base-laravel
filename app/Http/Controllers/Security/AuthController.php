<?php

namespace App\Http\Controllers\Security;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',

        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email',$fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'Bads credentials'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function checkEmail(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
        ]);

        $user = User::where('email',$fields['email'])->first();

        if(!$user){
            return response([
                'message' => 'Bads credentials'
            ], 401);
        }

        //send mail
        return response([
            'message' => 'A email with a link to change your password has been sending to your adress'
        ], 201);

        // $layout = 'emails.template';
        // $to = $user->email;
        // $title = 'Demande de nouveau mot de passe.';
        
        // $userId = $user->id;
        // $hashName = MD5($user->name);
        
        // $link = route('frontend.renewal.show', ['userId' => $userId, 'hashName' => $hashName]);
        // // select the view for the mail
        // $view = view('emails.web.renewal', [
        //     'link' => $link
        // ]);

        // //Sending the mail
        // Mail::send($layout, [
        //     'title' => $title,
        //     'banner' => $image,
        //     'content' => $view
        // ], function($email) use ($to, $title) {
        //     $email->from('noreply@creactivecom.fr', 'Creactive Communication');
        //     $email->to($to);
        //     //$email->bcc(config('crm.debug.email'));
        //     $email->subject($title);
        // });
    }

    public function changePassword(Request $request)
    {
        $fields = $request->validate([
            'id' => 'required|int',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::where('id',$fields['id'])->first();

        $user->update([
            'password' => bcrypt($fields['password'])
        ]);

        return response([
            'message' => 'Password change successfully'
        ], 201);

    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged Out'
        ];
    }
}
