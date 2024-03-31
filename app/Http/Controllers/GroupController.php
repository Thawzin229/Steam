<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Group;
use App\Models\JoinGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    //page 
    public function page()
    {
        $group_id = request('group_id');
        $search = "%".preg_replace("/[^A-Za-z0-9]/",'',request('search'))."%";
        $groups = Group::query()->GroupData($search)->paginate()->withQueryString();
        if($group_id !== null){
        $request_members = JoinGroup::query()->Request($group_id)->get()->toArray();
    }else{
        $request_members = null;
    }

        return Inertia::render('admin/group/page',['groups' => $groups,'request_members' => $request_members,'permission' => Auth::user()->can('create',User::class)]);
    }

    //create page 
    public function createPage()
    {
        $games = Game::select('id','name','image')->paginate();
        return Inertia::render('admin/group/create',['games'=>$games]);
    }
    //create 
    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => "required",
            'game_id' => "required",
        ]);
        Group::create($data);
        return redirect('/admin/group');
    }

    // edite 
    public function editPage($id)
    {
        $group = Group::select("name","game_id",'id')->where('id',$id)->first()->toArray();
        $games = Game::select('id','name','image')->paginate();
        return Inertia::render('admin/group/edit',['group' => $group,'games' => $games]);
    }

    // update 
    public function update(Request $request,$id)
    {
        $data = $request->validate([
            'name' => "required",
            'game_id' => "required",
        ]);
        Group::where('id',$id)->update($data);
        return redirect('/admin/group');

    }

    // delete 
    public function delete($id)
    {
        Group::where('id',$id)->delete();
        return redirect('/admin/group');
    }

    // accept group request 
    public function accept($id,$group_id)
    {
        JoinGroup::where('id',$id)->where('group_id',$group_id)->update(['status' => 'success']);
        return redirect()->back();
    }
    // delete 
    public function deleteRq($id,$group_id)
    {
        JoinGroup::where('id',$id)->where('group_id',$group_id)->where('status','pending')->delete();
        return redirect()->back();
    }
}
