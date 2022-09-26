<?php

namespace App\Http\Controllers;


use App\Models\category;
use App\Models\company;
use App\Models\contacts;
use App\Models\products;
use App\Models\services;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $products = products::all()->where('status',1);
        $services = services::all()->where('status',1);


        $company = company::all()->where('status',1);
        $category = category::all()->where('status',1);

        return view('page.contact',compact('products','services', 'company' , 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
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
            return redirect('/index')->with("success","Thanks, For contact us");
        }
        return back()->with("error","Sorry, please try again");


    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(contacts $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(contacts $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contacts $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(contacts $contact)
    {
        //
    }
}
