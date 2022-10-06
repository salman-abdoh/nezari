<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\category;
use App\Models\company;
use App\Models\contacts;
use App\Models\services;
use App\Models\products;
use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = products::all()->where('status',1);
        $services = services::all()->where('status',1);


        $company = company::all()->where('status',1);
        $category = category::all()->where('status',1);



        return view('page.index',  compact('products','services', 'company' , 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'title' => 'required',
            'message' => 'required',
        ], [
            'name.required' => 'Pleace,Enter your name',
            'phone.required' => 'Pleace,Enter your Phone Number.',
            'email.required' => 'Pleace,Enter your Email .',
            'email.email' => 'Pleace,Enter correct Email.',
            'title.required' => 'Pleace,Enter  Subject',
            'message.required' => 'pleace,Enter  Message',

        ]);

        $u=new contacts;
        $u->name=$request->name;
        $u->email=$request->email;
        $u->phone=$request->phone;
        $u->title=$request->title;
        $u->message=$request->message;


        if($u->save()){

            return redirect('/index')->with("success",__("Thanks, For contact us"));
        }
        return back()->with("error",__("Sorry, please try again"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {




    }
    public function showproduct($id)
    {
        $products = products::all()->where('status',1);
        $services = services::all()->where('status',1);

        $company = company::all()->where('status',1);
        $category = category::all()->where('status',1);




        return view('page.show', ['data' =>products::with(['category','company'])
            ->find($id)] ,  compact('products','services', 'company' , 'category'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(about $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, about $about)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(about $about)
    {
        //
    }
}
