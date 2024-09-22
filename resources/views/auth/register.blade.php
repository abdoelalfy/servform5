<!DOCTYPE html>
<html lang="ar">
<head>
  <title>المستخدم | التسجيل</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="قالب لوحة تحكم شائع مصنوع باستخدام إطار عمل Bootstrap 5">
  <meta name="keywords" content="قالب لوحة تحكم Bootstrap, قالب واجهة مستخدم الإدارة, قالب لوحة تحكم, بانيل خلفي, لوحة تحكم رد فعلية, لوحة تحكم Angular">

  <link rel="icon" href="../assets/images/favicon.svg" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}" >
  <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}" >
  <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}" >
  <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}" >
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link" >
  <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}" >
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@401&display=swap" rel="stylesheet">
<style>
*{
font-family: "Noto Kufi Arabic", sans-serif;
font-optical-sizing: auto;
font-weight: 300;
font-style: normal;
}
</style>
</head>
<body>
    <div class="auth-main v1">
        <div class="bg-overlay bg-white"></div>
        <img style="width:30%;margin-left:200px" src="{{ asset('assets/images/loolgop.png') }}" >

        <div class="auth-wrapper text-center">
            <form method="post" action="{{ route('register') }}" class="auth-form" id="registerForm">
                @csrf
                <style>
                    .card-header {
    background-color: #343a40; /* Dark background color */
    color: #fff; /* White text color */
    text-align: center; /* Center-align text */
    font-weight: 500; /* Medium font weight */
    margin-bottom: 0; /* Remove margin bottom */
    padding: 20px; /* Add padding */
}

.card-header h6 {
    color: #fff; /* White text color for the welcome message */
}

.card-header h5 {
    color: #fff; /* White text color for the prompt */
    margin-top: 10px; /* Add space between the welcome message and the prompt */
}
                </style>
                <div class="card mb-5 mt-3">
                    <div class="card-header bg-dark text-center text-white mb-0 f-w-500">
                        <h6>مرحبا {{ Auth::user()->name }}</h6>
                        <br>
                        <h5>أدخل البيانات الخاصة</h5>
                    </div>
                    <!-- Step 1: Basic Information -->
                    <div class="card-body" id="registerFormBody">
                        <!-- Basic information fields -->
                        <!-- Input fields for identity number, email, password, and password confirmation -->
                        {{-- <div class="form-group mb-3">
                            <input required type="text" class="form-control" name="identity_num" id="floatingInput" placeholder="رقم الهوية">
                        </div> --}}
                        {{-- <div class="form-group mb-3">
                            <input type="email" class="form-control"  required name="email" placeholder="عنوان البريد الإلكتروني">
                        </div> --}}
                        {{-- <div class="form-group mb-3">
                            <input type="password" class="form-control"  required name="password" placeholder="كلمة المرور">
                        </div> --}}

                        {{-- <button type="button" onclick="document.getElementById('registerForm').submit();" class="btn btn-primary">الحفظ</button> --}}
                        {{-- <div class="form-group mb-3">
                            <input type="password" class="form-control"  name="password_confirmation" placeholder="تأكيد كلمة المرور">
                        </div> --}}



                        <!-- Button to proceed to the next step -->
                        {{-- <div class="d-grid mt-4">
                            <input value="التالي" class="btn btn-primary" id="nextStep">
                        </div> --}}

                        <!-- Additional fields -->
                        <!-- Input fields for name, work, study, birth, and place -->
                        <!-- Button to go back or proceed to the next step -->
                        {{-- <div class="form-group mb-3">
                            <input type="text" class="form-control"  name="name" placeholder="الاسم الأول">
                        </div> --}}
                        <div class="form-group mb-3">
                            <input type="text" class="form-control"  name="work" placeholder="العمل">
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control"  name="study" placeholder="الدراسه">
                        </div>
                        <div class="form-group mb-3">
                            <input type="date" class="form-control"  name="birth" placeholder="تاريخ الميلاد">
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control"  required name="place" placeholder="مكان  الاقامة">
                        </div>
                        <div>      
                            <input value="التالي" id="next" class="btn btn-primary">
                        </div>
                    </div>



                    <!-- Step 2: Additional Fields -->
                    {{-- <div class="card-body" id="additionalFields" style="display: none;">
                        <!-- Additional fields -->
                        <!-- Input fields for name, work, study, birth, and place -->
                        <!-- Button to go back or proceed to the next step -->
                        <div class="form-group mb-3">
                            <input type="text" class="form-control"  name="name" placeholder="الاسم الأول">
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control"  name="work" placeholder="العمل">
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control"  name="study" placeholder="الدراسه">
                        </div>
                        <div class="form-group mb-3">
                            <input type="date" class="form-control"  name="birth" placeholder="تاريخ الميلاد">
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control"  required name="place" placeholder="مكان  الاقامة">
                        </div>
                        <div>      
                            <input style="margin-bottom:20px" value="الرجوع"  class="btn btn-secondary " id="goBack1">
                            <input  value="التالي" id="next2" class="btn btn-primary">
                        </div>
                    </div> --}}



                    <!-- Step 3: Additional Questions -->
                    <div class="card-body" id="additionalFields" style="display:none;">
                        <!-- Additional questions -->
                        <!-- Input fields for security questions -->
                        <!-- Button to go back or submit the form -->
                        @php
                        $questions = \App\Models\Question::all();
                        @endphp

@foreach ($questions as $question)
                      <label class="form-group">{{ $question->question }}</label>
                      <input type="hidden" name="question_ids[]" value="{{ $question->id }}">
                      <input type="text" class="form-control" name="answers[]" placeholder="أدخل اجابه السؤال">
                      <br>
@endforeach
                        
                        <!-- Submit button -->
                        <button type="button" onclick="document.getElementById('registerForm').submit();" class="btn btn-primary">الحفظ</button>
                    </div>




                    <!-- Footer -->
                    {{-- <div class="card-footer border-top">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <a href="{{ route('login') }}" class="link-primary">تسجيل الدخول</a>
                            </div>
                            <div>
                                <h6 class="{{ route('login') }}">لديك حساب بالفعل؟</h6>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </form>
            <!-- Additional input fields (initially hidden) -->
        </div>
    </div>
    
    <script>
        document.getElementById('nextStep').addEventListener('click', function () {
            // Hide the register form
            document.getElementById('registerFormBody').style.display = 'none';
            // Show the additional fields
            document.getElementById('additionalFields').style.display = 'block';
            // Hide the register button
            document.getElementById('additionalQuestions').style.display = 'none';
        });
    </script>
    
    <script>
            document.getElementById('goBack1').addEventListener('click', function () {
            // Hide the register form
            document.getElementById('registerFormBody').style.display = 'block';
            // Show the additional fields
            document.getElementById('additionalFields').style.display = 'none';
            // Hide the register button
            // document.getElementById('registerFormFooter').style.display = 'black';
        });
    </script>


<script>
    document.getElementById('goBack2').addEventListener('click', function () {
    // Hide the register form
    document.getElementById('registerFormBody').style.display = 'block';
    // Show the additional fields
    document.getElementById('additionalFields').style.display = 'none';
    // Hide the register button
    document.getElementById('additionalQuestions').style.display = 'none';

    // document.getElementById('registerFormFooter').style.display = 'black';
});
</script>

<script>
    document.getElementById('next').addEventListener('click', function () {
    // Hide the register form
    document.getElementById('registerFormBody').style.display = 'none';
    // Show the additional fields
    document.getElementById('additionalFields').style.display = 'block';
    // Hide the register button
    // document.getElementById('additionalQuestions').style.display = 'block';
    // document.getElementById('registerFormFooter').style.display = 'black';
});
</script>



<script>
    document.getElementById('next2').addEventListener('click', function () {
    // Hide the register form
    document.getElementById('registerFormBody').style.display = 'none';
    // Show the additional fields
    document.getElementById('additionalFields').style.display = 'none';
    // Hide the register button
    document.getElementById('additionalQuestions').style.display = 'block';
});
</script>
  <!-- [ Main Content ] end -->
  <!-- Required Js -->
  <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
  <script src="{{ asset('assets/js/pcoded.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
  <script>layout_change('light');</script>
  <script>layout_sidebar_change('dark');</script>
  <script>layout_header_change('dark');</script>
  <script>change_box_container('false');</script>
  <script>layout_caption_change('true');</script>
  <script>layout_rtl_change('false');</script>
  <script>preset_change("preset-1");</script>
</body>
<!-- [Body] end -->
</html>