<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Carbon\Carbon;

class ContactListController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        
        // リセットフラグが設定されている場合は検索結果をクリア
        if ($request->session()->has('reset')) {
            $request->session()->forget('reset');
            return view('contactlist.contactlist', compact('categories'));
        }
        
        return view('contactlist.contactlist', compact('categories')); 
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        
        $query = Contact::query();
        
        // メールアドレスで検索
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
        
        // 性別で検索
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }
        
        // 商品の種類（カテゴリ）で検索
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        
        // 登録日で検索
        if ($request->filled('created_at')) {
            $date = Carbon::parse($request->created_at)->format('Y-m-d');
            $query->whereDate('created_at', $date);
        }
        
        $contacts = $query->get();
        
        return view('contactlist.contactlist', compact('categories', 'contacts'));
    }

    public function reset(Request $request)
    {
        // セッションから検索条件をクリア
        $request->session()->forget(['email', 'gender', 'category_id', 'created_at']);
        
        // リダイレクト
        return redirect('/contactlist');
    }
}
