<!DOCTYPE html>
<html lang="ar">
<head>
  <title>تم التسجيل بنجاح</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="Bootstrap admin template">
  <meta name="author" content="phoenixcoded">
  <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}" >
  <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}" >
  <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}" >
  <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}" >
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link" >
  <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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

<body data-pc-preset="preset-1" data-pc-sidebar-theme="dark" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">

    <div class="auth-main v1">
        <div class="bg-overlay bg-white"></div>


        <img style="width:30%;margin-left:200px" src="{{ asset('assets/images/loolgop.png') }}" >
        <div class="auth-wrapper text-center">
            <form class="auth-form" id="registerForm">
                @csrf
                <div class="card mb-5 mt-3" style="max-width: 500px; margin: 0 auto;">
                    <div class="card-header bg-dark">
                        <h4 class="text-center text-white f-w-500 mb-0"><i style="size: 10px;color:#2ECC71" class="fa-solid fa-check" ><b style="font-size:30px">   تم حفظ بياناتك بنجاح....شكرا لك </b> </i></h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">الاسم:</label>
                                <input type="text" class="form-control" id="name" value="{{ $user->name }}" disabled>
                            </div>
                            {{-- <div class="col-md-6">
                                <label for="email" class="form-label">البريد الإلكتروني:</label>
                                <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
                            </div> --}}

                            <div class="col-md-6">
                                <label for="study" class="form-label">الدراسة:</label>
                                <input type="text" class="form-control" id="study" value="{{ $user->study }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                                <div class="col-md-6">
                                <label for="place" class="form-label">مكان الإقامة:</label>
                                <input type="text" class="form-control" id="place" value="{{ $user->place }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="birth" class="form-label">تاريخ الميلاد:</label>
                                <input type="text" class="form-control" id="birth" value="{{ $user->birth }}" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="identity_num" class="form-label">رقم الهوية:</label>
                                <input type="text" class="form-control" id="identity_num" value="{{ $user->identity_num }}" disabled>
                            </div>
                            <br>
                            <br>
                            @php
                            $questions = \App\Models\Question::all();
                        @endphp
                        @foreach ($questions as $question)
                            <label style="margin-top: 20px;" class="form-group">{{ $question->question }}</label>
                            @php
                                // Retrieve answers for the current question
                                $answers = \App\Models\Answer::where('user_id', $user->id)
                                                              ->where('question_id', $question->id)
                                                              ->get();
                            @endphp
                            @foreach ($answers as $answer)
                                <input type="text" disabled class="form-control" value="{{ $answer->answer }}">
                            @endforeach
                        
                            <br>
                        @endforeach
                        </div>
                    </div>
                        @csrf <!-- CSRF protection -->
<a class="btn btn-success" href="{{ route('logout') }}">الخروج</a>
                </div>
            </form>
        </div>
    </div>

    
    
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
  <script>
   toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "10000", // Set it to 10 seconds (10000 milliseconds)
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};
  </script>
  {{-- @notifyJs --}}
</body>
<!-- [Body] end -->

</html>