<?php

namespace App\Http\Controllers;

use App\Models\Convert;
use App\Models\User;
use Illuminate\Http\Request;

class ConvertController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'=> 'required', 
        ]);
        if(Convert::where('user_id',$data['user_id'] )->where('status','pending')->exists())
            return redirect()->back()->with('sucess', 'Your request has already been send');

        Convert::create($data);

        return redirect()->back()->with('sucess', 'Your request has been send');
    }

    public function index()
    {
        $converts = Convert::where('status','pending')->get();
        return view('admin.converts.index',compact('converts'));
    }

    public function accept($id)
    {
        $convert = Convert::findOrFail($id);
        $user = User::findOrFail($convert->user_id);
        if($user->type == 'landlord'){
            $user->type = 'tenant';
        }
        else {
            $user->type = 'landlord';
        }
        $convert->status = 'accept';
        $convert->update();
        $user->update();
        
        return redirect()->back()->with('sucess', 'Account Type Changed Successfully');
    }
}
