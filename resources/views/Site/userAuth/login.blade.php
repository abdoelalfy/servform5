<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->
<head>
  <title>Admin | Login</title>
    <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Flat Able is trending dashboard template made using Bootstrap 5 design framework. Flat Able is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies.">
  <meta name="keywords" content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard">
  <meta name="author" content="phoenixcoded">
  <!-- [Favicon] icon -->
  <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon"> <!-- [Google Font : Public Sans] icon -->
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<!-- [Tabler Icons] https://tablericons.com -->
<link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}" >

<!-- [Feather Icons] https://feathericons.com -->
<link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}" >
<!-- [Font Awesome Icons] https://fontawesome.com/icons -->
<link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}" >
<!-- [Material Icons] https://fonts.google.com/icons -->
<link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}" >
<!-- [Template CSS Files] -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link" >
<link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}" >
@notifyCss
</head>
<!-- [Head] end -->
<!-- [Body] Start -->
<body data-pc-preset="preset-1" data-pc-sidebar-theme="dark" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">

  <!-- [ Pre-loader ] start -->
  {{-- <div class="loader-bg">
    <div class="pc-loader">
      <div class="loader-fill"></div>
    </div>
  </div> --}}
  <!-- [ Pre-loader ] End -->

  <div class="auth-main v1">
    <x-notify::notify />
    <div class="bg-overlay bg-white"></div>
    <div class="auth-wrapper">
      <form method="post" action="{{ route('login.checklogin') }}" class="auth-form">
        @csrf
        <a href="../index.html" class="d-block mt-5"><img src="{{ asset('assets/images/logo-white.svg') }}" alt="img"></a>
        <div class="card mb-5 mt-3">
          <div class="card-header bg-dark">
            <h4 class="text-center text-white f-w-500 mb-0">Login with your email</h4>
          </div>
          <div class="card-body">
            <div class="form-group mb-3">
              <input required type="email" class="form-control" name="email" id="floatingInput" placeholder="Email Address">
            </div>
            <div class="form-group mb-3">
              <input required type="password" class="form-control" name="password" id="floatingInput1" placeholder="Password">
            </div>
            <div class="d-flex mt-1 justify-content-between align-items-center">
              <div class="form-check">
                <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="">
                <label class="form-check-label text-muted" for="customCheckc1">Remember me?</label>
              </div>
            </div>
            <div class="d-grid mt-4">
              <button type="sumit" class="btn btn-primary">Login</button>
            </div>
          </div>
          <div class="card-footer border-top">
            <div class="d-flex justify-content-between align-items-end">
              <div>
                <h6 class="f-w-500 mb-0">Don't have an Account?</h6>
                <a href="register-v1.html" class="link-primary">Create Account</a>
              </div>
              <a href="../index.html"><img src="{{ asset('assets/images/logo-dark-sm.svg') }}" alt="img"></a>
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
  @notifyJs
</body>
<!-- [Body] end -->

</html>