<?php

namespace App\Http\Controllers;

use App\Models\maillings;
use Illuminate\Http\Request;

class MaillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $full_name=$request->full_name;
        $email=$request->email;
        $subject=$request->subject;
        $message=$request->message;
        $mail = new maillings();
        $mail->full_name=$full_name;
        $mail->email=$email;
        $mail->subject=$subject;
        $mail->message=$message;

        try {
           
            $mail->save();
        } catch (\Exception $th) {
           return $th->getMessage();

        }
        
       return redirect('/#contact')->with('success','Your message has been sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\maillings  $maillings
     * @return \Illuminate\Http\Response
     */
    public function show(maillings $maillings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\maillings  $maillings
     * @return \Illuminate\Http\Response
     */
    public function edit(maillings $maillings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\maillings  $maillings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, maillings $maillings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\maillings  $maillings
     * @return \Illuminate\Http\Response
     */
    public function destroy(maillings $maillings)
    {
        //
    }
}
