<?php
namespace App\Http\Controllers\site\home;
use App\Http\Controllers\Controller;
use App\Model\User;
class HomeController extends Controller
{
    public function index()
    {
        // $items = User::where('user_type_id', 1)->where('status',1)->latest()->get();
        // return view('site.home.index', compact('items'));
    }
}
