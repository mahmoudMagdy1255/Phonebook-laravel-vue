<?php

namespace App\Http\Controllers;

use App\Phonebook;
use App\Http\Requests\PhonebookRequest;
use Illuminate\Http\Request;

class PhonebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function getData()
    {
        return Phonebook::orderBy('name' , 'ASC')->where('user_id' , auth()->user()->id )->get();
    }

    public function getC_user()
    {
        return auth()->user() ?? '';
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
    public function store(PhonebookRequest $request)
    {
        $phonebook = new Phonebook();

        $phonebook->user_id = auth()->user()->id;
        $phonebook->name = $request->name;
        $phonebook->phone = $request->phone;
        $phonebook->email = $request->email;

        $phonebook->save();

        return $phonebook;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function show(Phonebook $phonebook)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Phonebook $phonebook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function update(PhonebookRequest $request, Phonebook $phonebook)
    {
       $phonebook->name = $request->name;
       $phonebook->phone = $request->phone;
       $phonebook->email = $request->email;

       $phonebook->save(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phonebook $phonebook)
    {
        Phonebook::whereId($phonebook->id)->delete();
    }
}
