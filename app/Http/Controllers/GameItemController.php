<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\GameItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\ImgUpload;

class GameItemController extends Controller
{
    //page 
    public function page($id)
    {
        $game_id = $id;
        $item_id = request("item_id");
        $search = "%".preg_replace("/[^A-Za-z0-9]/",'',request('search'))."%";
        if($item_id !== null){
            $single_item = GameItem::query()->where("id",$item_id)->first();
        }else{
            $single_item = 'no';
        }
        $items = GameItem::query()
        ->when($search,function($query,$search){
            $query->whereRaw("regexp_replace(name,'[^A-Za-z0-9]','') like ?",[$search])->paginate()->withQueryString();
        })
        ->where("game_id",$game_id)->paginate()->withQueryString();
        return Inertia::render("admin/items/page",['game_id'=> $game_id,'items'=>$items,'single_item' => $single_item]);
    }

    //add 
    public function add(Request $request)
    {
        $upload = new ImgUpload();
        $folder = 'item_images';
        $data = $request->validate([
            'name'=> 'required',
            'game_id'=> 'required',
            'price'=> 'required',
            'image'=> 'required|file|image|max:2000',
        ]);
        $data['image'] = $upload->uploadImage($request,$folder);
        GameItem::create($data);
        return redirect()->back();
    }

    // upadte 
    public function update(Request $request)
    {
        $upload = new ImgUpload();
        $folder = 'item_images';
        $data = $request->validate([
            'name'=> 'required',
            'price'=> 'required',
        ]);
        $data['image'] = $upload->uploadImage($request,$folder);
        GameItem::where("id",$request->id)->update($data);
        return redirect()->back();
    }
    // delete 
    public function delete($id,$game_id)
    {
        $img = GameItem::where('id',$id)->first()->image;
        if($img !== null)
        {
            Storage::delete('item_images/'.$img);
        }
        GameItem::where('id',$id)->delete();
        return redirect('admin/games/items/'.$game_id);
    }
}
