<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Listing;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $t_tenants = User::where('type' , '=', 'tenant')->count();
        $t_landlords = User::where('type' , '=', 'landlord')->count();
        $tenants = User::where('type' , '=', 'tenant')->paginate(5);
        $landlords = User::where('type' , '=', 'landlord')->paginate(5);
        $listings = Listing::all();
        $t_listings = Listing::count();
        $blogs = DB::table('blogs')->select('*')->paginate(5);
        $t_blogs = Blog::count();
    
        return view('dashboard', compact('tenants', 'landlords', 'listings', 'blogs', 't_tenants', 't_landlords', 't_listings','t_blogs'));
    }

    public function listings()
    {
        $t_listings = Listing::count();
        $listings= DB::table('listings')->select('*')->paginate(10);
        return view('admin.listings',compact('listings', 't_listings'));
    }

    public function messages()
    {
        $t_messages = Message::count();
        $messages = DB::table('messages')->select('*')->paginate(10);
        return view('admin.message', compact('t_messages', 'messages'));
    }
}
