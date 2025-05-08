<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\memos;
use Hash;
use Session;
use Illuminate\Support\Facades\DB;
use Log;



class TaskController extends Controller
{
    public function login()
    {
        return view("user/login");
    }

    public function signUp()
    {
        return view("user/signUp");
    }

    public function signUpUser(Request $request)
    {

        $request->validate([
            
            'email'         => 'required|email',
            'userId'        => 'required|unique:memos|min:1|max:255',
            'password'      => 'required|regex:/^(?=.*[!@#$%^&*+=-])+/|min:6|max:15',
            'pwdCheck'      => 'same:password',
            'name'          => 'required',
            'birth'         => 'required',
          
        ], [
            'email.required'    => '이메일 주소를 입력해주세요.',
            'email.email'       => '이메일 주소를 선택해주세요.',
            'userId.required'   => '아이디를 입력해주세요.',
            'userId.unique'     => '이미 사용중인 아이디입니다.',
            'password.required' => '비밀번호를 입력해주세요.',
            'password.regex'    => '특수문자를 포함해 주세요.',
            'password.min'      => '최소 6자리를 입력해주세요.',
            'password.max'      => '최대 15자리입니다.',
            'pwdCheck.same'     => '비밀번호가 일치하지 않습니다.',
            'name.required'     => '이름을 입력해주세요.',
            'birth.required'    => '생년월일을 선택해주세요.',
           
        ]);

        $memos = new memos();
        $memos -> userId = str_replace(' ', '', $request ->userId); 
        $memos -> password = Hash::make($request ->password);
        $memos -> name = str_replace(' ', '', $request ->name); 
        $memos -> birth = str_replace(' ', '', $request ->birth);
        $memos -> email = str_replace(' ', '', $request ->email);
       
        if($request -> agreement1 === "check" && $request -> agreement2 === "check")
        {
            $res = $memos->save();
        }
        else
        {
            return back()->with('fail','체크박스를 선택해주세요.');
        }
        if($res)
        {
            return redirect('user/login')->with('success','가입되었습니다.');
        }
        else
        {
            return back()->with('fail','가입에 실패하였습니다.');
        }
    }




    public function loginUser(Request $request)
    {
        $request->validate([
            'userId'=>'required',
            'password'=>'required',
        ], [
            'userId.required' => '아이디를 입력해주세요.',
            'password.required' => '비밀번호를 입력해주세요.',
           
        ]);
        $memos = memos::where('userId', '=', $request->userId)
                      ->where('status','=',true)
                      ->first();
      
        if($memos)
        {
            if(Hash::check($request->password, $memos->password))
            {
                return back()->with('success','로그인 성공.');
             
            }
            else
            {
                return back()->with('fail','비밀번호를 다시 입력해주세요.')->withInput();
            }
        }
        else
        {
            return back()->with('fail','존재하지 않는 아이디입니다.');
        }
    }
}