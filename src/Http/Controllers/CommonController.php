<?php

namespace Zzld\Foundation\Http\Controllers;

use App\Http\Controllers\Controller;
use Zzld\Foundation\Support\Scaffoldable;
use Illuminate\Http\Request;
use Zzld\Foundation\Models\User;
use Auth;
use Session;

class CommonController extends Controller
{
    public function changePassword(Request $request){
        $data = [
            'user' => Auth::user()
        ];
        return view("zzld-foundation::auth.change_password", $data);
    }

    public function changePasswordDo(Request $request){

        $params = $request->input();
        $user = User::where('id', $params['uid'])->first();

        if($params['newpassword'] != $params['passwordconfirm']){
            Session::flash('flash-message', '新密码和确认密码不同，请重试!');
            return back();
        }

        if(Auth::attempt(['email' => $user->email, 'password' => $params['password']])) {
            echo "ok";
            $user->password = bcrypt($params['newpassword']);
            $user->save();
            Session::flash('flash-message', '修改成功');
            return back();
        }else{
            Session::flash('flash-message', '原始密码错误');
            return back();
        }
        var_dump($params);
        echo $user->password . '<br/>';
        echo bcrypt($params['password']);
    }

}