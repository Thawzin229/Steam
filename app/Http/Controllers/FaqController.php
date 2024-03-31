<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    //page 
    public function page()
    {
        $faq = Faq::select('faqs.*',DB::raw("DATE_FORMAT(created_at,'%M %e , %Y') as date"))->latest()->paginate()->withQueryString();
        
        return Inertia::render('admin/faq/page',['faqs' => $faq,'permission' => Auth::user()->can('create',User::class)]);
    }

    // user page 
        public function userPage()
    {
        $faq = Faq::select('faqs.*',DB::raw("DATE_FORMAT(created_at,'%M %e , %Y') as date"))->latest()->paginate()->withQueryString();
        
        return Inertia::render('user/faq/page',['faqs' => $faq]);
    }


    // createPage
    public function createPage()
    {
        return Inertia::render('admin/faq/create');
    }

    // create 
    public function create(Request $request)
    {
        $validaiton_text = [
            'question.required' => "Question is needed",
            'answer.required' => "Answer is needed",
            'question.max' => "Question can't be greater than 400",
        ];
        $data = $request->validate([
            'question' => 'required|string|max:400',
            'answer' => 'required|string|max:1000'
        ],$validaiton_text);

        Faq::create($data);
        return redirect('admin/faqs');
    }

    // edit 
    public function edit($id)
    {
        $faq = Faq::where('id',$id)->first();
        return Inertia::render('admin/faq/edit',['faq' => $faq]);
    }

    // update 
    public function update(Request $request)
    {
        $validaiton_text = [
            'question.required' => "Question is needed",
            'answer.required' => "Answer is needed",
            'question.max' => "Question can't be greater than 400",
        ];

        $data = $request->validate([
            'question' => 'required|string|max:400',
            'answer' => 'required|string|max:1000'
        ],$validaiton_text);

        if(Faq::find($request->id)){
            Faq::where('id',$request->id)->update($data);
        }else{
            return back()->withErrors(['status' => "no data to update"]);
        }
        return redirect('admin/faqs');
    }

    // delete 
    public function delete($id)
    {
        if(Faq::find($id)){
            Faq::where('id',$id)->delete();
            return redirect('admin/faqs');
        }
        return back()->withErrors(['status' => 'no data to delete']);
    }
}
