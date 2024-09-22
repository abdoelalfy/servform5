<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'question' => 'string|required',
        ]);
        Question::create([
            'question'=>$request->question,
        ]);
        toastr()->success('تم تسجيل السؤال بنجاح');
        return redirect()->back();
    }
}