<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct() {
    	
    }

    public function index() {

    	if (!Auth::check()){
            return redirect(route('backend.dashboard.login'));
        }
        $noidung = 'Nội dung bài viết';
        return view('backend.dashboard.home.index', ['noidung' => $noidung, 'title' => 'Trang chủ']);

    }
}
