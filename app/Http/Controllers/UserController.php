<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use App\Helpers\RBAC;
use Inertia\Response;
use Illuminate\Database\Query\Builder;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

/**
* @mixin Builder
*/
class UserController extends Controller
{
//    public function getUsers(): View {
//        {
//            $this->authorize('Admin');
//             $users = User::all();
//            $admin = RBAC::Admin;
//            return view('users_list', [
//                'heading' => 'users',
//                'users' => $users,
//            ]);
//        }
//    }

    public function index(Request $request): Response {
            $this->authorize('Admin');
            $query = User::query();
            $query -> select(['id','name','email','permissions']);
            $admin = RBAC::Admin;
            return inertia('Users/Index', [
                'users' => User::getUsers($request->get('search'))
            ]);

    }
    public function findById(string $id) {
        {
            if(!is_numeric($id) || strpos($id,'.')) {
                return response()->json([
                    'message' => "Id should be an integer",
                ], 400);
            }
            $user = User::findById($id);
            if(!isSet($user)) {
                return response()->json([
                    'message' => "User with id $id not found",
                ], 404);
            }
            return response()->json([$user],200);
        }
    }

    
    public function updateUserPermissions(Request $request,string $id) {
        {
            if(!is_numeric($id) || strpos($id,'.')) {
                return response()->json([
                    'message' => "Id should be an integer",
                ], 400);
            }
            try {
                $valid = request()->validate([
                    'permissions' => 'required|integer',
                ]);
            } catch (ValidationException $err) {
                return $err->validator->errors();
            }
            if($valid['permissions'] >= RBAC::Admin->value) {
                return response()->json([
                    'message' => "Cannot set another user to admin",
                ], 400);
            }
            User::updateUserPermissions($id, $valid['permissions']);
            return response()->noContent(200);
        }
    }
}
