<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\AddFriendNotification;
use Illuminate\Support\Facades\Notification;
use App\FriendData;

class FriendController extends Controller
{
    //page 
    public function page()
    {
        $search = request('search');
        $search = "%".preg_replace('/[^A-Za-z0-9]/','',$search)."%";
        $users = User::select('id','user_name','image','avatar','email','second_email')
        ->when($search,function($query,$search){
            $query->whereRaw("regexp_replace(user_name,'[^A-Za-z0-9]','') like ?",[$search])->paginate(6)->withQueryString();
        })
        ->where('role','user')->paginate(10)->withQueryString();
        $fri_data = new FriendData;
        $fried_users = $fri_data->friends();
        $requested_users =$fri_data->requests();

        $filter_user = $users->items();
        $friended_users = Friend::where("receiver_id",Auth::user()->id)->where('status','friended')->pluck('sender_id')->toArray();
        foreach($filter_user as $user)
        {
            $user->is_friended = in_array($user->id,$friended_users) ? true : false;
        }
        return Inertia::render('user/community/friend',['users'=>$users,'friends'=>$fried_users,'requested_users'=>$requested_users]);
    }

    // add 
    public function add(Request $request)
    {
        $data = $request->validate([
            'sender_id' => 'required',
            'receiver_id' => 'required',
        ]);
        $noti_user = User::where('id',$request->receiver_id)->first();
        $data_present = Friend::where("receiver_id",$request->receiver_id)->where('sender_id',$request->sender_id)->where('status','friended')->first();
        if($data_present)
        {
            return back()->withErrors(['message'=>"you cannt add the same person."]);
        }
        if(Friend::where("receiver_id",$request->receiver_id)->where('sender_id',$request->sender_id)->first())
        {
            Friend::where("receiver_id",$request->receiver_id)->where('sender_id',$request->sender_id)->delete();
        }
        Friend::create($data);
        Notification::send($noti_user,new AddFriendNotification($request->sender_id));
        return redirect()->back();
    }

    // accept 
    public function accept(Request $request)
    {
        $data = $request->validate([
            'sender_id' => 'required',
            'receiver_id' => 'required',
        ]);
        Friend::where('sender_id',$request->sender_id)->where('receiver_id',$request->receiver_id)->update(['status' => 'friended']);
        return redirect('/user/community/friend');
    }
    public function decline(Request $request)
    {
        $data = $request->validate([
            'sender_id' => 'required',
            'receiver_id' => 'required',
        ]);
        Friend::where('sender_id',$request->sender_id)->where('receiver_id',$request->receiver_id)->delete();
        return redirect('/user/community/friend');
    }
    public function unfriend(Request $request)
    {
        $data = $request->validate([
            'sender_id' => 'required',
            'receiver_id' => 'required',
        ]);
        Friend::where('sender_id',$request->sender_id)->where('receiver_id',$request->receiver_id)->update(['status' => 'requested']);
        return redirect('/user/community/friend');
    }
}
