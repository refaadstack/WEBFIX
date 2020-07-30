<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PengunjungController extends Controller
{
    public function index(){
        $users = User::latest()->paginate(10);
        return view('user.index')->withUsers($users);
    }
}
