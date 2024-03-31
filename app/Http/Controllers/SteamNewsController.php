<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\SteamNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SteamNewsController extends Controller
{
    //page 
    public function page()
    {
        $search = "%".preg_replace('/[^A-Za-z0-9]/','',request('search'))."%";
        $news = SteamNews::query()->select('steam_news.*',DB::raw("DATE_FORMAT(created_at,'%M %e , %Y') as date"))
        ->when($search,function($query,$search){
            $query->whereRaw("regexp_replace(title,'[^A-Za-z0-9]','') like ?",[$search])->paginate()->withQueryString();
        })
        ->paginate()->withQueryString();

        return Inertia::render('admin/news/page',['news' => $news,'permission' => Auth::user()->can('create',User::class)]);
    }

    //create page 
    public function createPage()
    {
        return Inertia::render('admin/news/create');

    }

    //create 
    public function create(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|max:2000'
        ]);
        if($request->hasFile('image'))
        {
            $file_name = uniqid().$request->file("image")->getClientOriginalName();
            $request->file('image')->storeAs('news_images',$file_name);
            $data['image'] = $file_name;
        }
        SteamNews::create($data);
        return redirect('/admin/steam-news');
        
    }

    // edit 
    public function edit($id)
    {
        $news = SteamNews::where('id', $id)->first();
        return Inertia::render('admin/news/edit', ['news' => $news]);
    }

    // update 
    public function update(Request $request )
    {
        $data = $request->validate([
            'title' => "required",
            'body' => "required",
            'image' => 'nullable',
        ]);
        if($request->hasFile('image'))
        {
            $old_image = SteamNews::where('id', $request->id)->first()->image;
            if($old_image !== null)
            {
                Storage::delete('news_images/' . $old_image);
            }
            $file_name = uniqid().$request->file("image")->getClientOriginalName();
            $request->file('image')->storeAs('news_images',$file_name);
            $data['image'] = $file_name;
        }
        SteamNews::where('id', $request->id)->update($data);
        return redirect('admin/steam-news');
    }

    // dlelete 
    public function delete($id)
    {
        $old_image = SteamNews::where('id', $id)->first()->image;
            if($old_image !== null)
            {
                Storage::delete('news_images/' . $old_image);
            }
            SteamNews::where('id',$id)->delete();
        return redirect('admin/steam-news');
    }
}
