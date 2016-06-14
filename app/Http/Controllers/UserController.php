<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Auth;
use Mail;
use App\contact;
use App\User;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest()){
             $user = DB::table('users')->get();    
        }
        else {
            $user = DB::table('users')
                -> where('email','!=', Auth::user()->email)
                ->get();     
        }
         
        return view('welcome', ['users' => $user]);
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
    public function store(Request $request){

        $rules =  [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'regex:/^[0-9]*$/',
            'content' =>'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        
        if ($validator->fails()){            
            return redirect()->back()->withErrors($validator)->withInput();

        }
        else{   

            $contact = new contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->content = $request->content;  
            $contact->receiver = $request->receiver;        
            $contact->save();
            return view('tada');
            //dd('test');                 
        }
        
    }

    public function send(){
        $data = array(
            'name' => Auth::user()->name,
        );
        Mail::send('emails.test', $data, function ($message) {
           // $message->from("MAIL_USERNAME", 'Test Demo');
            $message->to(Auth::user()->email)->subject('Ta da');
        });
        return view('SendDone');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
