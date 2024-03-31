<?php

namespace App\Http\Controllers;

use App\Models\JoinGroup;
use Illuminate\Http\Request;

class JoinGroupController extends Controller
{
     // joinGp
    public function joinGp(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'group_id' => 'required',
        ]);
        $already_data  = JoinGroup::where('user_id',$request->user_id)->where('group_id',$request->group_id)->first();
        if($already_data)
        {
            return back()->withErrors(['message' => 'you have already joined this group']);
        }
        JoinGroup::create($data);
        return redirect('user/community/groups');
    }
}
