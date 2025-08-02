<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactsRequest;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ContactFormController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        
        // セッションからデータを取得
        $formData = $request->session()->get('form_data', []);
        
        // データを取得したらセッションから削除
        if (!empty($formData)) {
            $request->session()->forget('form_data');
        }
        
        // $formDataがnullの場合は空配列に設定
        if (is_null($formData)) {
            $formData = [];
        }
        
        return view('contactform.contact', compact('categories', 'formData'));
    }

    public function back(Request $request)
    {
        // セッションにデータを保存
        $request->session()->put('form_data', $request->all());
        
        // indexメソッドにリダイレクトしてセッションからデータを取得
        return redirect('/contactform');
    }

    public function check(ContactsRequest $request)
    {
        $categories = Category::all();
        $category = $categories->find($request->category_id);
        $contact = [
            'category_id' => $request->category_id,
            'category_name' => $category->content,
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,   
            'gender' => $request->gender,
            'email' => $request->email,
            'tell' => $request->tell,
            'address' => $request->address,
            'building' => $request->building,
            'detail' => $request->detail,
        ];
        
        return view('contactform.confirm', compact('contact'));
    }
    
    public function add(ContactsRequest $request)
    {

        Contact::create([
            'category_id' => $request->category_id,
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'tell' => $request->tell,
            'address' => $request->address,
            'building' => $request->building,
            'detail' => $request->detail,
        ]);
        
        return redirect('/contactform/thanks');

    }

    public function thanks()
    {
        return view('contactform.thanks');
    }
}
