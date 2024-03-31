<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //page 
    public function page()
    { 
        $search = "%".preg_replace("/[^A-Za-z0-9]/",'',request('search'))."%";
        $data = Category::select('id','name',DB::raw("DATE_FORMAT(created_at,'%M %e %Y') as date"))
        ->when($search,function($query,$search){
            $query->whereRaw("regexp_replace(name,'[^A-Za-z0-9]','') like ?",[$search])->paginate();
        })
        ->latest()->paginate();
        return Inertia::render('admin/category/list',['data'=>$data,'permission' => Auth::user()->can('create',User::class)]);
    }

    // category create page 
    public function createPage()
    {
        return Inertia::render('admin/category/create');
    }

    // create 
    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => "required|string|min:1",
        ]);
        Category::create($data);
        return redirect('admin/category');
    }
    // edit page 
    public function editPage($id)
    {
        $data = Category::select('name','id')->where('id',$id)->first();
        return Inertia::render('admin/category/edit',['category'=>$data]);
    }
    // update 
    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => "required|string|min:1",
        ]);
        Category::where("id",$request->id)->update($data);
        return redirect('admin/category');
    }
    // delelte 
    public function delete($id)
    {
        Category::where('id',$id)->delete();
        return redirect('admin/category');
    }
}
