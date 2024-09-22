<!DOCTYPE html>
<html lang="ar">
<head>
  <title>Admin | تسجيل الدخول </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="تسجيل الدخول">
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
    <div class="auth-wrapper">
      <form method="post" action="{{ route('login.checklogin') }}" class="auth-form">
        @csrf
        <div class="card mb-5 mt-3">
          <div class="card-header bg-dark">
            <h4 class="text-center text-white f-w-500 mb-0">تسجيل الدخول للادمن </h4>
          </div>
          <div class="card-body">
            <div class="form-group mb-3">
              <input required type="email" class="form-control" name="email" id="floatingInput" placeholder="اسم المستخدم / البريد الإلكتروني">
            </div>
            <div class="form-group mb-3">
              <input required type="password" class="form-control" name="password" id="floatingInput1" placeholder="كلمة المرور">
            </div>
            <div class="d-flex mt-1 justify-content-between align-items-center">
            </div>
            <div class="d-grid mt-4">
              <button type="submit" class="btn btn-primary">تسجيل الدخول</button>
            </div>
          </div>
          <div class="card-footer border-top">
                <div class="d-flex justify-content-between align-items-center">
                    {{-- <div>
                        <a href="{{ route('admin.register') }}" class="link-primary">إنشاء حساب</a>
                    </div>
                    <div>
                        <h6 class="f-w-500 mb-0">ليس لديك حساب؟</h6>
                    </div> --}}
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
  <script src="{{ asset('assets/js/pcoded.js')}}"></script>
  <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
  <script>layout_change('light');</script>
  <script>layout_sidebar_change('dark');</script>
  <script>layout_header_change('dark');</script>
  <script>change_box_container('false');</script>
  <script>layout_caption_change('true');</script>
  <script>layout_rtl_change('false');</script>
  <script>preset_change("preset-1");</script>
  {{-- @notifyJs --}}
</body>
<!-- [Body] end -->
</html>