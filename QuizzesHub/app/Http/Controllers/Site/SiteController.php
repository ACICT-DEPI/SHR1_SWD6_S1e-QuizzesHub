<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\User;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $top_users = [];
        if(isset(Auth::user()->university->id) && isset(Auth::user()->faculty->id)) {
            $university_id = Auth::user()->university->id;
            $faculty_id = Auth::user()->faculty->id;
            $top_users = User::where('university_id', $university_id)
                            ->where('faculty_id', $faculty_id)
                            ->where('score','>',0)
                            ->take(3)
                            ->orderBy('score', 'desc')
                            ->get();
        } else {
            $top_users = User::where('score','>',0)->take(3)->orderBy('score', 'desc')->get();
        }

        return view('site.index', compact('top_users'));
    }

    public function about()
    {
        return view('site.pages.about');
    }

    public function contact()
    {
        return view('site.pages.contact');
    }

    public function ReadMore()
    {
        return view('site.pages.ReadMore');
    }
}
