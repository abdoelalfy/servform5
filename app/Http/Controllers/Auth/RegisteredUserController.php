<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'identity_num' => ['required'],
        ], [
            'name.required' => 'حقل الاسم مطلوب.',
            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.email' => 'يرجى إدخال بريد إلكتروني صالح.',
            'password.required' => 'حقل كلمة المرور مطلوب.',
            'password.confirmed' => 'تأكيد كلمة المرور غير مطابق.',
            'identity_num.required' => 'حقل رقم البطاقة مطلوب.',
        ]);
        if ($validator->fails()) {
            toastr()->error('هناك أخطاء في البيانات المدخلة. الرجاء التحقق وإعادة المحاولة.');
            return back()->withErrors($validator)->withInput();
        }
        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'identity_num' => $request->identity_num,
                'study' => $request->study,
                'place' => $request->place,
                'birth' => $request->birth,
                'work' => $request->work,
            ]);
            $questions = Question::create([
                'user_id' => $user->id,
                'q1answer' => $request->q1answer,
                'q2answer' => $request->q2answer,
                'q3answer' => $request->q3answer,
            ]);
            event(new Registered($user));
            Auth::login($user);
            toastr()->success('تم تسجيل وحفظ البيانات بنجاح');
            DB::commit();
            return redirect(RouteServiceProvider::HOME);
        }catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('حدث خطأ أثناء تسجيل البيانات. الرجاء المحاولة مرة أخرى.');
            return redirect()->back()->withInput();
        }
    }
}