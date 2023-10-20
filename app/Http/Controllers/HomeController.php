<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        $signatures = Menu::take(6)->get();

        return view('landing',compact('signatures'));
    }
    public function showMenuList(Request $request) {
        
        $menus = Menu::paginate(10);

        if($request->query('cat') != ''){
            $menus = Menu::where('category_id',$request->query('cat'))->paginate(10);
        }
        elseif($request->query('name') != ''){
            $menus = Menu::where('name','LIKE','%'.$request->query('name').'%')->paginate(10);
        }
        elseif($request->query('cat') != '' && $request->query('name') != ''){
            $menus = Menu::where('category_id',$request->query('cat'))->where('name','LIKE','%'.$request->query('name').'%')->paginate(10);
        }

        $categories = Category::all();
        return view('menus', compact('categories', 'menus'));
    }
}
