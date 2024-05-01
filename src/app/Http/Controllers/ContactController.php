<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Date;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('contact', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contacts = $request->all();
        $category = Category::find($request->category_id);
        return view('confirm', compact('contacts', 'category'));
    }

    public function store(ContactRequest $request)
    {
        // 修正ボタンが押されたときの挙動
        if($request->has('back')){
            return redirect('/')->withInput();
        }

        // 送信ボタンが押されたときの挙動
        $request['tell'] = $request->tel_1 . $request->tel_2 . $request->tel_3;
        Contact::create(
            $request->only([
                'category_id',
                'first_name',
                'last_name',
                'gender',
                'email',
                'tell',
                'address',
                'building',
                'detail',
            ]));
        return view('thanks');
    }
}
