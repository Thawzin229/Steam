<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Category;
use App\Models\ScreenShot;
use App\Models\GameCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GameController extends Controller
{
    // helper 
    public function rules($id=null)
    {
        if($id){
            return [
                'name' => 'required|string',
                'price' => 'required|string',
                'os' => 'required|string',
                'image' => ['nullable'],
                'directx' => 'required|string',
                'ram' => 'required|string',
                'cpu' => 'required|string',
                'gpu' => 'required|string',
                'storage' => 'required|string',
            ];
        }
        return [
            'name' => 'required|string',
            'price' => 'required|string',
            'categories' => 'required|array',
            'screenshots' => 'required|array',
            'image' => "required|file",
            'os' => 'required|string',
            'directx' => 'required|string',
            'ram' => 'required|string',
            'cpu' => 'required|string',
            'gpu' => 'required|string',
            'storage' => 'required|string',
        ];
    }
    //page 
    public function page()
    {
        $search = "%".preg_replace("/[^A-Za-z0-9]/",'',request('search'))."%";
        $data = Game::query()->fetchData($search)->get()->toArray();
        return Inertia::render('admin/games/list',['data' => $data,'permission' => Auth::user()->can('create',User::class)]);
    }
    // create page 
    public function createPage()
    {
        $categories = Category::get()->toArray();
        return Inertia::render('admin/games/create',['categories' => $categories]);
    }

    // create 
    public function create(Request $request)
    {
        $data = $request->validate($this->rules());
        if($request->hasFile('image'))
        {
            $file_name = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('game_image',$file_name);
        }
        $data['image'] = $file_name;
        Game::create($data);
        $id = Game::where('name',$request->name)->first()->id;
        foreach ($request->categories as $category) {
            GameCategory::create([
                'game_id' => $id,
                'category_id' => $category
            ]);
        }
        foreach ($request->screenshots as $ss) { 
            $filename  =  uniqid().$ss->getClientOriginalName();
            $ss->storeAs('screen_shots',$filename);
            ScreenShot::create([
                'game_id' => $id,
                'screenshot' => $filename
            ]);
        }
        return redirect('/admin/games');
    }

    // edit 
    public function edit($id)
    {
        $data = Game::with(['gamecategory' => function($query){
            $query->select("game_id")
            ->addSelect(['category_name' => Category::select("name")->whereColumn("id",'game_categories.category_id')->take(1)]);
        },'screenshots' =>  function($query){
            $query->select("game_id",'screenshot');
        }])
        ->where('id',$id)->first();
        $categories = Category::get()->toArray();
        return Inertia::render("admin/games/edit",['game_data' => $data,'categories' => $categories]);
    }

    // update 
    public function update(Request $request)
    {
        $data = $request->validate($this->rules($request->id));
        if($request->hasFile("image"))
        {
            $old_imge = Game::where('id',$request->id)->first()->image;
            if($old_imge !== null)
            {
                Storage::delete("game_image/".$old_imge);
            }
            $file_name = uniqid().$request->file('image')->getClientOriginalName();
            $request->file("image")->storeAs("game_image",$file_name);
            $data['image'] = $file_name;
        }
        Game::where("id",$request->id)->update($data);
        if(!empty($request->gamecategory)){
            GameCategory::where('game_id',$request->id)->delete();
            foreach ($request->gamecategory as $category) {
                GameCategory::create(['game_id' => $request->id,'category_id'=> $category]);
            }
        }
        if(!empty($request->screenshots)) {
            $screenshots_to_delete = ScreenShot::where('game_id',$request->id)->get()->toArray();
            foreach($screenshots_to_delete as $ss){
                Storage::delete('screen_shots/'.$ss['screenshot']);
            }
            ScreenShot::where('game_id',$request->id)->delete();
            foreach ($request->screenshots as $ss) { 
                $filename  =  uniqid().$ss->getClientOriginalName();
                $ss->storeAs('screen_shots',$filename);
                ScreenShot::create([
                    'game_id' => $request->id,
                    'screenshot' => $filename
                ]);
            }
        }
        return redirect('/admin/games');
    }

    // delelte 
    public function delete($id)
    {
        $oldimage =  Game::where('id',$id)->first()->image;
        if($oldimage !== null)
        {
            Storage::delete('game_image/'.$oldimage);
        }
        $screenshots_to_delete = ScreenShot::where('game_id',$id)->get()->toArray();
            foreach($screenshots_to_delete as $ss){
                Storage::delete('screen_shots/'.$ss['screenshot']);
            }

        Game::where('id',$id)->delete();
        GameCategory::where('game_id',$id)->delete();
        ScreenShot::where('game_id',$id)->delete();
        return redirect('/admin/games');
    }

    public function singlegame($id)
    {
        $game = Game::query()
        ->select("games.*",DB::raw("DATE_FORMAT(created_at,'%M %e, %Y') as date"))
        ->with(['gamecategory' => function($query){
            $query->select("game_id")
            ->addSelect(['category_name' => Category::select('name')->whereColumn('id','game_categories.category_id')->take(1)]);
        },'screenshots'])
        ->where("id",$id)
        ->first();
        return Inertia::render('user/singlepage/page',['game' => $game]);
    }
}
