<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class UserController extends Controller
{
    public function getUsers(): View {
        {
            $this->authorize('admin');
             $users = User::all();
            error_log($users);
            return view('users_list', [
                'heading' => 'users',
                'users' => $users,
            ]);
        }
    }
    public function deleteUser(): View {
        {

            $this->authorize('admin');
            $users = User::all();
            return view('users_list', [
                'heading' => 'users',
                'users' => $users,
            ]);
        }
    }
}