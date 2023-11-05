<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use App\Helpers\RBAC;
use Inertia\Response;
use Illuminate\Database\Query\Builder;
/**
* @mixin Builder
*/
class UserController extends Controller
{
//    public function getUsers(): View {
//        {
//            $this->authorize('admin');
//             $users = User::all();
//            $admin = RBAC::Admin;
//            return view('users_list', [
//                'heading' => 'users',
//                'users' => $users,
//            ]);
//        }
//    }

    public function index(): Response {
            $this->authorize('admin');
            $users = User::select(['id','name','email','permissions'])->get()->makeVisible(['permissions']);
            $admin = RBAC::Admin;
            error_log($users);
            return inertia('Users/Index', [
                'users' => $users,
            ]);

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
