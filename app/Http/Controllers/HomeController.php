<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator; 
use App\User;
use App\contact;
use Auth;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = DB::table('users')->get();
        //dd(users);
        return view('home', ['users' => $users]);
    }
    public function edit(){
        return view('edit');
    }
    public function update(Request $request){
        $rules =  [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'min:6'
        ];
        $validator = Validator::make($request->all(),$rules);
        //dd($validator); 
        if ($validator->fails()){
            //dd('xxx');
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else{            
            Auth::user()->name = $request['name'];
            Auth::user()->email = $request['email'];
            if ($request['password'] != ""){
                Auth::user()->password = bcrypt($request['password']);
            }   
            Auth::user()->save();
            //($request->all());
            return view('done');
        }

    }
    /**
     * [test description]
     * @return [type] [description]
     */
    public function test(){
        $contacts = DB::table('contacts')
                    ->where('receiver',Auth::user()->email)
                    ->get();
        return view('test', ['contacts' => $contacts]);
    }
    /**
     * [store description]
     * @param  Request $request [description]
     * @return [type]           [description]
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
            return view('done');               
        }
        
    }

}
