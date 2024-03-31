<?php

namespace App\Http\Controllers;

use App\Main;
use App\Models\User;
use Inertia\Inertia;
use App\Models\OrderList;
use App\Models\ItemIncome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //home 
    public function home()
    {
        $main = new Main();
        $users = $main->userData();
        $income = DB::select("SELECT
        (select sum(totalprice) from order_lists) as game_income,
        (select sum(price) from item_incomes) as item_income,
        (select count(*) from users where role='user') as users,
        (select count(*) from games ) as games,
        (select count(*) from collections ) as collections
        ");

        return Inertia::render("admin/home",['income' => $income,'users'=> $users]);
    }
    // user list 
    public function UserList()
    {
        $search = "%".preg_replace('/[^A-Za-z0-9]/','',request('search'))."%";
        $data = User::query()->Fetch($search)->paginate(10)->withQueryString();
        return Inertia::render('admin/userlist/list',['data'=>$data,'permission' => Auth::user()->can('create',User::class)]);
    }

    // create page 
    public function CreatePage()
    {
        return Inertia::render('admin/userlist/create');
    }

    // create users
    public function CreateUser(Request $request)
    {
        $data = $request->validate([
            'user_name' => 'required|string|min:3|max:100',
            'email' => 'required|email|min:3|max:100',
            'password' => 'required|string|min:8|max:16|confirmed',
        ]);
        User::create($data);
        return redirect('/admin/userlist');
    }

    // edit page 
    public function EditPage($id)
    {
        $userdata = User::where('id',$id)->first();
        return Inertia::render('admin/userlist/edit',['userdata'=>$userdata]);
    }
    // update 
    public function Update(Request $request)
    {
        $data = $request->validate([
            'user_name' => "required|string",
            'status' => "required|string",
            'role' => "required|string",
            'email' => "sometimes|unique:users,email,".$request->id,
        ]);
        User::where('id',$request->id)->update($data);
        return redirect('/admin/userlist');
    }
    // delete 
    public function Delete($id)
    {
        User::where('id',$id)->delete();
        return redirect('/admin/userlist');
    }

    // account page 
    public function page()
    {
        return Inertia::render("admin/account/page");
    }
    // update 
    public function updateAcc(Request $request)
    {
        $data = $request->validate([
            'user_name'  => 'required|string',
            'status'  => 'required|string',
            'role'  => 'required|string',
        ]);
        if($request->hasFile('image'))
        {
            $old_image = User::where('id',$request->id)->first()->image;
            if($old_image !==  null)
            {
                Storage::delete('user_images/'.$old_image);
            }
            $file_name = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('user_images',$file_name);
            $data['image'] = $file_name;
        }
        User::where("id",$request->id)->update($data);
        return redirect('/admin/home');


    }


}
