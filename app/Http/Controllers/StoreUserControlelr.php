<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Maatwebsite\Excel\Facades\Excel;

class StoreUserControlelr extends Controller
{
 public function storeUser(Request $request){

        $credentials = $request->only('password', 'identity_num');
         if (Auth::attempt($credentials)) {
            $user = User::findOrFail(auth::user()->id);
            if($user->checked == 0) {
            $request->session()->regenerate();
            $user=auth::user();
            toastr()->success('أهلا بك في موقعنا');
            return redirect()->route('register');
            }else{
            toastr()->success('أهلا بك في موقعنا');
            return redirect()->route('final'); 
            }
        }else{
            toastr()->error('البيانات غير صحيحة');
            return redirect()->back();
        }
    }

    public function create()
    {
        return view('auth.register');
    }

    public function final(){
    $user = auth()->user();
    return view('Dashbord.final', compact('user'));
    }

    public function adminusercreate(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
            'identity_num' => ['required','unique:' . User::class],
        ],[
            'name.required' => 'حقل الاسم مطلوب.',
            'password.required' => 'حقل كلمة المرور مطلوب.',
            'identity_num.required' => 'حقل رقم البطاقة مطلوب.',
            'identity_num.unique' => 'حقل رقم البطاقة موجود مسبقا.',
        ]);
        if ($validator->fails()) {
            toastr()->error('هناك أخطاء في البيانات المدخلة. الرجاء التحقق وإعادة المحاولة.');
            return back()->withErrors($validator)->withInput();
        }
        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'identity_num' => $request->identity_num,
            'study' => '-',
            'place' => '-',
            'birth' => '-',
            'work' => '-',
            'checked'=>'0',
        ]);
        toastr()->success('تم تسجيل وحفظ البيانات بنجاح');
        return redirect()->back();
    }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if($user = User::findOrFail(auth::user()->id))
        $validator = Validator::make($request->all(), [
            'place' => ['required', 'string', 'max:255'],
            'work' => ['required', 'string'],
            'study' => ['required' ,'string'],
            'birth' => ['required'],
        ]);
        if ($validator->fails()) {
            toastr()->error('هناك أخطاء في البيانات المدخلة. الرجاء التحقق وإعادة المحاولة.');
            return back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {
            $user = User::findOrFail(auth::user()->id); // Replace $userId with the actual ID of the user you want to update
            // Update the user attributes
            $user->update([
                'study' => $request->study,
                'place' => $request->place,
                'birth' => $request->birth,
                'work' => $request->work,
                'checked'=>'1',
            ]);
           foreach ($request->answers as $index => $answer) {
                $user->answers()->create([
                    'user_id'=>$user->id,
                    'question_id' => $request->question_ids[$index],
                    'answer' => $answer,
                ]);
        }
            DB::commit();
            toastr()->success('تم تسجيل وحفظ البيانات بنجاح');
            Auth::login($user);
            return redirect()->route('final');
            // return redirect(RouteServiceProvider::HOME);
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('حدث خطأ أثناء تسجيل البيانات. الرجاء المحاولة مرة أخرى.');
            return redirect()->back()->withInput();
        }
    }
    public function export(){
        return Excel::download(new UserExport, 'المستخدمين.xlsx');
    }
    
    public function edit(Request $request)
    {
        // Assuming you are passing the question ID via POST request
    $questionIds = $request->input('questionid');
    $questionTexts = $request->input('question');
    // Loop through each question ID and update its corresponding text
    foreach ($questionIds as $index => $questionId) {
        // Retrieve the question by its ID
        $question = Question::find($questionId);
        // Update the question text
        $question->question = $questionTexts[$index];
        $question->save();
    }
        // Optionally, you can return a response
        toastr()->success('تم تعديل السؤال بنجاح');
        return redirect()->back();
    }


    // public function getUserAnswers($userId){
    //     $answers = Answer::where('user_id', $userId)->get();
    //     return redirect()->back()->compact('answers');
    // }


    public function getUserAnswers($userId) {
        $user = User::findOrFail($userId);
        $answers = $user->answers()->pluck('answer')->toArray();
        return response()->json([
            'name' => $user->name,
            'birth' => $user->birth,
            'email' => $user->email,
            'place' => $user->place,
            'identity_num' => $user->identity_num,
            'work' => $user->work,
            'study' => $user->study,
            'answers' => $answers
        ]);
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        toastr()->success('تم حذف المستحدم بنجاح');
        return redirect()->route('thankyou');
    }


    public function deleteQuestion($id){
        $question=Question::where('id',$id)->delete();
        toastr()->success('شكرا لك سيتم التواصل معك قريبا ');
      return redirect()->route('thank');
    }

    public function deleteuser($id){
        $question=User::where('id',$id)->delete();
        toastr()->success('تم حذف المستحدم بنجاح');
        return redirect()->back();
    }
    
    public function thankyou(){
        return view('thankyou');
        Auth::guard('web')->logout();
        session()->invalidate();
    }



}