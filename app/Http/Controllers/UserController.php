<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Helpers\ImageHelper;

class UserController extends Controller
{

    public function __construct() {
    }

    public function index(Request $request) {
        $query = User::query();
        $query->where('id', '!=', Auth::user()->id);
    
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('phone', 'like', '%' . $search . '%')
                  ->orWhere('user_name', 'like', '%' . $search . '%')
                  ->orWhere('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
            });
        }
        
        $users = $query->orderby('id', 'desc')->with('image')->paginate(20);
    
        return view('backend.dashboard.user.index', [
            'users' => $users,
            'title' => 'Danh sách người dùng'
        ]);
    }

    public function edit(Request $request){
        $user = User::where('id', $request->id)->with('image')->first();
        if($request->type){
            return view('backend.dashboard.user.form', ['user' => $user, 'title' => Auth::user()->id == $request->id ? 'Sửa Profile' : 'Sửa người dùng']);
        }else{
            return response()->json([
                'user' => $user
            ]);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|unique:users,user_name,' . $request->input('id') . '|min:3|max:50',
            'email' => 'required|email|unique:users,email,' . $request->input('id'),
            'name' => 'required|string|max:100',
            'phone' => 'required|digits_between:9,15',
            'birthday' => 'required|date',
            'password' => $request->has('id') ? 'nullable|min:6|confirmed' : 'required|min:6|confirmed',
            'picture' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $userData = [
            'user_name' => $request->input('user_name'),
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'birthday' => $request->input('birthday'),
        ];

        if($request->has('id') && $request->id != Auth::user()->id){
            $userData['super_user'] = $request->super_user ? 1 : 0;
        }

        if ($request->filled('password')) {
            $userData['password'] = bcrypt($request->input('password'));
        }


        $user = User::updateOrCreate(
            ['id' => $request->input('id')],
            $userData
        );

        // if ($request->hasFile('picture')) {
        //     $file = $request->file('picture');
        //     $file_name = Str::uuid().'_'.date('YmdHis')."_".Auth::user()->id."_".$file->getClientOriginalName();
        //     $file->move('public/uploads/users/', $file_name);

        //     Image::updateOrCreate(
        //         [
        //             'record_type' => 'User',
        //             'record_id' => $user->id
        //         ],
        //         [
        //             'name' => 'Picture',
        //             'picture' => $file_name
        //         ]
        //     );
        // }

        if ($request->hasFile('picture')) {
            $fileName = ImageHelper::saveImage($request->file('picture'),'public/uploads/users/');

            Image::updateOrCreate(
                [
                    'record_type' => 'User',
                    'record_id' => $user->id,
                    'name' => 'Picture',
                ],
                [
                    'picture' => $fileName
                ]
            );
        }

        if (Auth::user()->id == $user->id) {
            return redirect(route('backend.dashboard.home.index'));
        } else {
            return redirect(route('backend.dashboard.user.index'));
        }
    }

    public function delete(Request $request){
        if($request->id == 1){
            return redirect()->back()->withErrors("Không thể xóa mục này")->withInput();
        }
        $user = User::where('id', $request->id)->delete();
        // $image = Image::where('record_type', 'User')->where('record_id', $request->id)->first();
        // $path = 'public/uploads/users/' . $image->picture;
        // if (file_exists($path)) {
        //     unlink($path);
        // }
        // $image->delete();
        return redirect(route('backend.dashboard.user.index'));
    }
}
