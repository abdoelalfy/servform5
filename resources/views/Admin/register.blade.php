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
</head>
<body>
    <div class="auth-main v1">
        <div class="bg-overlay bg-white"></div>
        <div class="auth-wrapper">
            <form method="post" action="{{ route('register.checkregister') }}" class="auth-form" id="registerForm">
                @csrf
                <div class="card mb-5 mt-3">
                    <div class="card-header bg-dark">
                        <h4 class="text-center text-white mb-0 f-w-500">سجّل الدخول  للادمين</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="name" placeholder="الاسم">
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" class="form-control" required name="email"
                                placeholder="عنوان البريد الإلكتروني">
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" required name="password"
                                placeholder="كلمة المرور">
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="تأكيد كلمة المرور">
                        </div>
                   <div >
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary">تسجيل الدخول</button>
                      </div>
                    </div>
                    <div class="card-footer border-top" id="registerFormFooter">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <a href="{{ route('admin.login') }}" class="link-primary">تسجيل الدخول</a>
                            </div>
                            <div>
                                <h6 >لديك حساب بالفعل؟</h6>
                            </div>
                        </div>
                    </div>
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
</body>
<!-- [Body] end -->

</html>