<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactsRequest;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class ContactFormController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('contactform.contact', compact('categories'));
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
        return redirect('/contact/thanks');
    }

    public function thanks()
    {
        return view('contactform.thanks');
    }
}
