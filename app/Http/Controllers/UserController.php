<?php

namespace App\Http\Controllers;

use App\Models\LoggedHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        if (\Auth::user()->can('manage user')) {
            if (\Auth::user()->type == 'super admin') {
                $users = User::where('parent_id', parentId())->where('type', 'admin')->get();
            } else {
                $users = User::where('parent_id', parentId())->whereNotIn('type',['tenant','maintainer'])->get();
            }
        } else {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }

        return view('user.index', compact('users'));
    }


    public function create()
    {

        $roles = Role::where('parent_id', parentId())->whereNotIn('name', ['tenant','maintainer'])->get()->pluck('name', 'id');

        return view('user.create', compact('roles'));
    }


    public function store(Request $request)
    {
        if (\Auth::user()->can('create user')) {
            $validator = \Validator::make(
                $request->all(), [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'email' => 'required|email|unique:users',
                    'password' => 'required|min:6',
                    'role' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $role_r = Role::findById($request->role);
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->password = \Hash::make($request->password);
            $user->type = $role_r->name;
            $user->profile = 'avatar.png';
            $user->lang = 'english';
            $user->parent_id = parentId();
            $user->save();

            $user->assignRole($role_r);

            return redirect()->route('users.index')->with('success', __('User successfully created.'));
        } else {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::where('parent_id', '=', parentId())->whereNotIn('name', ['employee'])->get()->pluck('name', 'id');

        return view('user.edit', compact('user', 'roles'));
    }


    public function update(Request $request, $id)
    {
        if (\Auth::user()->can('edit user')) {

            $validator = \Validator::make(
                $request->all(), [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'email' => 'required|email|unique:users,email,' . $id,
                    'role' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $role = Role::findById($request->role);
            $user = User::findOrFail($id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->type = $role->name;
            $user->save();
            $user->assignRole($role);
            return redirect()->route('users.index')->with('success', 'User successfully updated.');
        } else {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }
    }


    public function destroy($id)
    {

        if (\Auth::user()->can('delete user') ) {
            $user = User::find($id);
            $user->delete();

            return redirect()->route('users.index')->with('success', __('User successfully deleted.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function loggedHistory()
    {
        if (\Auth::user()->can('manage logged history')) {
            $histories = LoggedHistory::where('parent_id', parentId())->get();
            return view('logged_history.index', compact('histories'));
        } else {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }
    }

    public function loggedHistoryShow($id)
    {
        if (\Auth::user()->can('manage logged history')) {
            $histories = LoggedHistory::find($id);
            return view('logged_history.show', compact('histories'));
        } else {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }
    }

    public function loggedHistoryDestroy($id)
    {
        if (\Auth::user()->can('delete logged history')) {
            $histories = LoggedHistory::find($id);
            $histories->delete();
            return redirect()->back()->with('success', 'Logged history succefully deleted.');
        } else {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }
    }


}
