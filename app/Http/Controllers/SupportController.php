<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Models\SupportReply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SupportController extends Controller
{

    public function index()
    {
        if (\Auth::user()->can('manage support') ) {
            $supports = Support::where('parent_id', '=', parentId())->orWhere('assign_user', parentId())->get();

            return view('support.index', compact('supports'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create()
    {
        if (\Auth::user()->type == 'super admin') {
            $users = User::where('type', 'owner')->get()->pluck('name', 'id');
            $users->prepend(__('All'), 0);
        } elseif (\Auth::user()->type == 'owner') {
            $users = User::where('parent_id', parentId())->orWhere('type', 'super admin')->get()->pluck('name', 'id');
            $users->prepend(__('All'), 0);
        } else {
            $users = User::where('parent_id', parentId())->get()->pluck('name', 'id');
            $users->prepend(__('All'), 0);
        }

        $priority = Support::$priority;
        $status = Support::$status;

        return view('support.create', compact('users', 'priority', 'status'));
    }


    public function store(Request $request)
    {
        if (\Auth::user()->can('create support') ) {
            $validator = \Validator::make(
                $request->all(), [
                    'subject' => 'required',
                    'assign_user' => 'required',
                    'priority' => 'required',
                    'description' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            if (!empty($request->attachment)) {
                $supportFilenameWithExt = $request->file('attachment')->getClientOriginalName();
                $supportFilename = pathinfo($supportFilenameWithExt, PATHINFO_FILENAME);
                $supportExtension = $request->file('attachment')->getClientOriginalExtension();
                $supportFileName = $supportFilename . '_' . time() . '.' . $supportExtension;

                $dir = storage_path('upload/support');


                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                }
                $request->file('attachment')->storeAs('upload/support/', $supportFileName);
            }

            $support = new Support();
            $support->subject = $request->subject;
            $support->assign_user = $request->assign_user;
            $support->priority = $request->priority;
            $support->status = $request->status;
            $support->attachment = !empty($request->attachment) ? $supportFileName : '';
            $support->description = $request->description;
            $support->created_id = parentId();
            $support->parent_id = parentId();
            $support->save();

            return redirect()->back()->with('success', __('Support successfully created.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function show($ids)
    {
        if (\Auth::user()->can('reply support') ) {
            $id = Crypt::decrypt($ids);
            $support = Support::find($id);

            return view('support.show', compact('support'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function edit(Support $support)
    {
        if (\Auth::user()->can('edit support') ) {
            if (\Auth::user()->type == 'super admin') {
                $users = User::where('type', 'owner')->get()->pluck('name', 'id');
                $users->prepend(__('All'), 0);
            } elseif (\Auth::user()->type == 'owner') {
                $users = User::where('parent_id', parentId())->orWhere('type', 'super admin')->get()->pluck('name', 'id');
                $users->prepend(__('All'), 0);
            } else {
                $users = User::where('parent_id', parentId())->get()->pluck('name', 'id');
                $users->prepend(__('All'), 0);
            }

            $priority = Support::$priority;
            $status = Support::$status;

            return view('support.edit', compact('users', 'priority', 'status', 'support'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function update(Request $request, Support $support)
    {
        if (\Auth::user()->can('edit support') ) {
            $validator = \Validator::make(
                $request->all(), [
                    'subject' => 'required',
                    'assign_user' => 'required',
                    'priority' => 'required',
                    'description' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }


            if (!empty($request->attachment)) {
                $supportFilenameWithExt = $request->file('attachment')->getClientOriginalName();
                $supportFilename = pathinfo($supportFilenameWithExt, PATHINFO_FILENAME);
                $supportExtension = $request->file('attachment')->getClientOriginalExtension();
                $supportFileName = $supportFilename . '_' . time() . '.' . $supportExtension;

                $dir = storage_path('upload/support');

                if (!empty($support->attachment)) {

                    unlink($dir . '/' . $support->attachment);
                }

                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                }
                $request->file('attachment')->storeAs('upload/support/', $supportFileName);

                $support->attachment = !empty($request->attachment) ? $supportFileName : '';
            }
            $support->subject = $request->subject;
            $support->assign_user = $request->assign_user;
            $support->priority = $request->priority;
            $support->status = $request->status;
            $support->description = $request->description;
            $support->save();

            return redirect()->back()->with('success', __('Support successfully updated.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy(Support $support)
    {
        if (\Auth::user()->can('delete support') ) {
            $dir = storage_path('upload/support');
            if ($support->attachment) {
                unlink($dir . '/' . $support->attachment);
            }

            SupportReply::where('support_id', $support->id)->delete();
            $support->delete();

            return redirect()->route('support.index')->with('success', 'Support successfully deleted.');
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function reply(Request $request, $id)
    {
        if (\Auth::user()->can('reply support') ) {
            $validator = \Validator::make(
                $request->all(), [
                    'comment' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $support = new SupportReply();
            $support->support_id = $id;
            $support->user_id = parentId();
            $support->description = $request->comment;
            $support->parent_id = parentId();
            $support->save();

            return redirect()->back()->with('success', __('Support reply successfully send.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
