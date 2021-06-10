<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UesrMangeController extends Controller
{
    
    public function index(){

        $users =User::select('id','name','email')->get();
        return view('dashboard.users.index',compact('users'));

    }

    public function store(UserRequest $request) {
        $data=$request->validated();
        $data['password']=Hash::make($request->password);
        $user=User::create($data);

        return response()->json(['message'=>'تم اضافة المستخدم  بنجاح']);
    }

    public function delete(User $user){
        $user->delete();

        return response()->json(['message'=>'تم حذف المستخدم  بنجاح','user'=>$user]);

    }
}