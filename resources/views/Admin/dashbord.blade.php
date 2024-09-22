<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Dashbord</title>
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
    <!-- [Page specific CSS] start -->
    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/buttons.bootstrap5.min.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <!-- [Page specific CSS] end -->
    <!-- [Google Font : Public Sans] icon -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

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
    <link rel="stylesheet" href="{{ asset('aassets/css/style-preset.css') }}" >
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Google Fonts: Open Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <!-- DataTables CSS -->
    <!-- Toastr CSS -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">   
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
  <style>
    @media print{
        #print_Button {
            display: none;
        }
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <img style="width: 14%;
    height: 40%" src="{{ asset('assets/images/kyc-removebg-preview.png') }}" >

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <a class="nav-link active" style="font-size: 17px" aria-current="page">الرئيسية</a>
              </li>

              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user('admins')->name }}
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{ route('logoutAdmin') }}">تسجيل الخروج</a></li>
                  </ul>
              </li>
          </ul>
      </div>
  </div>
</nav>



 {{-- inset user module --}}
 <div id="exampleMod" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="text-center" id="exampleModalLiveLabel"><b>أدخل بيانات العميل</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form style="direction: rtl" method="post" action="{{route('adminusercreate')}}" class="form form-control">
          @csrf
                <div class="card-body">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-text">الاسم</span>
                      <input type="text" name="name" class="form-control" placeholder="أسم العميل">
                    </div>
                  </div>
                  <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-text">الرقم</span>
                        <input type="text" name="identity_num" class="form-control" placeholder="رقم الهوية">
                      </div>
                    </div>
                  <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-text">كلمة السر</span>
                        <input type="password" name="password" class="form-control" placeholder="كلمة السر">
                      </div>
                    </div>
                </div>
          <div class="modal-footer">
        <button type="button" style="background-color:crimson" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
        <input type="submit" style="background-color:#1abc9c" value="حفظ" class="btn btn-success">
      </div>
  </form>
    </div>
  </div>
</div>


<div id="exampleModalLive" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
  <div id="updatetForm" class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="text-center" id="exampleModalLiveLabel"><b class=" text-center">أدخل  بيانات الأسئلة</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="{{ route('questions') }}" id="insertForm" class="form form-control">
          @csrf
                <div class="card-body">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-text">أدخل السؤال</span>
                      <input type="text" name="question" class="form-control" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                  </div>
                </div>
          <div class="modal-footer">
        <button type="button" style="background-color:crimson" class="btn btn-danger" data-bs-dismiss="modal">أغلاق</button>
        <input type="submit" style="background-color:#1abc9c" value="الحفظ" class="btn btn-success">
      </div>
  </form>
    </div>
  </div>
</div>

<div id="exampleModalLiv" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      
      <div class="modal-header">
        <h5 class="text-center" id="exampleModalLiveLabel"><b class=" text-center">تعديل بيانات الأسئلة</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="{{ route('questions.edit') }}" class="form form-control">
          @csrf
                <div class="card-body">
                  @foreach ($questions as $question )
                  <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text">تعديل السؤال</span><br>
                        <input type="hidden" name="questionid[]" value="{{ $question->id }}">
                        <input type="text" name="question[]" value="{{ $question->question }}" class="form-control"><br>
                    </div>
                </div>
                  @endforeach
                  <div class="form-group">
                  </div>
                </div>
          <div class="modal-footer">
        <button type="button" style="background-color:crimson" class="btn btn-danger" data-bs-dismiss="modal">أغلاق</button>
        <input type="submit" style="background-color:#1abc9c" value="تعديل" class="btn btn-success">
      </div>
  </form>
    </div>
  </div>
</div>



<div id="exampleModalLi" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLivLabel" aria-hidden="true"> 
  <div id="updatetdForm" class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="text-center" id="exampleModalLivLabel"><b style="text-align:center">معلومات المستخدم</b></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form  method="POST" class="form form-control">
          @csrf
          <input type="hidden" id="up_id">
                <div  class="card-body">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-text">الاسم</span>
                      <input disabled type="text" id="up_name" name="up_name" class="form-control" >
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-text">رقم الهوية</span>
                      <input  disabled type="text" id="up_identity_num" name="up_identity_num" class="form-control" >
                    </div>
                    <br>

                    <div class="input-group">
                      <span class="input-group-text">العمل</span>
                      <input disabled type="text" id="up_work" name="up_work" class="form-control" >
                    </div>
                    <div class="input-group">
                      <span class="input-group-text">الدراسة</span>
                      <input disabled type="text" id="up_study" name="up_study" class="form-control" >
                    </div>
                    <br>


                    <div class="input-group">
                      <span class="input-group-text">تاريخ الولادة</span>
                      <input disabled type="text" id="up_birth" name="up_birth" class="form-control" >
                    </div>
                    <br>

                    <div class="input-group">
                      <span class="input-group-text">مكان الاقامة</span>
                      <input disabled type="text" id="up_place" name="up_place" class="form-control" >
                    </div>
                    <br>
                      <div class="input-group" id="up_answers_wrapper">
                      </div>
                    <br>
                    {{-- <div class="input-group">
                      <input disabled name="up_email" id="up_email" type="email" class="form-control">
                      <span class="input-group-text">@email.com</span>
                    </div> --}}
                  </div>
                </div>     
          <div class="modal-footer">
            <a href="#" style="background-color:#F1C40F" id="print_Button" class="btn btn-warning" onclick="printPage()">طباعة</a>

      </div>
  </form>
    </div>
  </div>
</div>

 <div class="col-sm-12">
    <div class="card">
      <div class="container">
              <div class="card-header">
          <button type="button" class="btn btn-danger" style="background-color:crimson" data-bs-toggle="modal" data-bs-target="#exampleMod"><h5>أضافة مستخدم</h5></button>

        <button type="button" class="btn btn-primary" style="background-color:#1abc9c" data-bs-toggle="modal" data-bs-target="#exampleModalLive"><h5>أضافه الأسئله</h5></button>
        <button type="button" class="btn btn-warning" style="background-color:#F1C40F" data-bs-toggle="modal" data-bs-target="#exampleModalLiv"><h5>قائمة الاسئلة</h5></button>

          <button type="button" class="btn btn-dark excal" style="background-color:grey">
          <a href="{{ route('user.export') }}" style="color: inherit; text-decoration: none;">
              <h5>تنزيل ملف أكسل</h5>
          </a>
      </button>
      </div> 
      </div>
   <div class="container">
    <div id="trst" class="card-body">
        <h3 class=" text-center">معلومات المستخدمين</h3>
        <div class="table-data dt-responsive table-responsive text-center">
          <table id="cbtn-selectors" class="table-striped text-center table-bordered nowrap col-sm-12 cbtn-selectors">
            <thead>
                 <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    {{-- <th>الايميل</th> --}}
                    <th>مكان الاقامه</th>
                    <th>الدراسه</th>
                    {{-- <th>تاريخ الميلاد</th> --}}
                    <th>العمل</th> 
                    <th>رقم الهوية</th>
                    <th>تاريخ التسجيل</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
              <?php
                    $i=1;
                    ?>
                  @foreach ($users as $user )
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $user->name }}</td>
                    {{-- <td>{{ $user->email }}</td> --}}
                    <td>{{ $user->place }}</td>
                    <td>{{ $user->study }}</td>
                    {{-- <td>{{ $user->birth }}</td> --}}
                    <td>{{ $user->work }}</td>
                    <td>{{ $user->identity_num }}</td>
                    <td>{{ $user->created_at->DiffForHumans() }}</td>
                    <td>
                      <a data-bs-toggle="modal" data-bs-target="#exampleModalLi" data-id={{$user->id }}  data-email={{$user->email }} data-birth={{$user->birth }} data-name={{ $user->name }}  data-place={{ $user->place }}
                        data-work={{ $user->work }} data-identity_num={{ $user->identity_num }} data-study={{$user->study }}  class="btn btn-primary  updatet_user_Form">عرض</a>
                        <a style="color: white" href="{{ route('delete.user', $user->id) }}" class="btn btn-danger delete_user">الحذف</a>
                   </td>
                    @endforeach
                  </tr>
            </tbody>
        </table>
        </div>
      </div>
<hr>
      <canvas id="myChart" style="width:100%;max-width:800px;margin-left: 350px;"></canvas>
      <script>
        <?php $use = \App\Models\User::where('checked', '1')->count(); ?>
        <?php $usee = \App\Models\User::where('checked', '0')->count(); ?>
        var xValues = ["المستخدمين الذين لم يجاوبوا علي الاسئلة", "المستخدمين الذين جاوبوا علي الاسئلة"];
        var yValues = [{{ $usee }}, {{ $use }}];
        var barColors = [
          "#b91d47",
          "#00aba9",
        ];
      
        new Chart("myChart", {
          type: "pie",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues
            }]
          },
          options: {
            title: {
              display: true,
              text: "نسبة أجوبة المستخدمين"
            }
          }
        });
      </script>

<hr>
      <div id="trst" class="card-body">
        <h3 class=" text-center">قائمة الاسئلة</h3>
        <div class="table-data dt-responsive table-responsive text-center">
          <table id="cbtn-selectors" class="table-striped text-center table-bordered nowrap col-sm-12 cbtn-selectors">
            <thead>
              <tr>
                  <th>اسم السؤال</th>
                  <th>تاريخ الاضافة</th>
                  <th>العمليات</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($questions as $question)
              <tr>
                  <td>{{ $question->question }}</td>
                  <td>{{ $question->created_at->diffForHumans() }}</td>
              
                  <td>
                    <button type="button" class="btn btn-warning" style="background-color:#F1C40F" data-bs-toggle="modal" data-bs-target="#exampleModalLiv"><h6>التعديل</h6></button>
                    <a href="{{ route('delete.question', $question->id) }}" class="btn btn-danger delete_user">الحذف</a>
                  </td>
              </tr>
              @endforeach
          </tbody>
        </table>
        </div>
      </div>
    <hr>


    <div id="trst" class="card-body">
      <h3 class=" text-center">أجابات المستخدمين</h3>
      <div class="table-data dt-responsive table-responsive text-center">
        <table id="cbtn-selectors" class="table-striped text-center table-bordered nowrap col-sm-12 cbtn-selectors">
          <thead>
               <tr>
                  <th>#</th>
                  <th>الاسم الاول</th>
                  <th>رقم البطاقة</th>
                  @foreach ($questions as $question )
                       <th>{{ $question->question }}</th>
                  @endforeach
                  <th>تاريخ الاجابة</th>
                  {{-- <th>الاجابات</th> --}}
              </tr>
          </thead>
          <tbody>
    <?php $i = 1; ?>
    @foreach ($users as $user)
    <tr>
        <td>{{ $i++ }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->identity_num }}</td>
        <?php
        $answers = App\Models\Answer::where('user_id', $user->id)->get();
        $questions=App\Models\Question::all()->count();
        ?>
        @if($answers->isEmpty())
        @for($i=0;$i<$questions;$i++)
        <td>{{ "not answered" }}</td>
        @endfor
        @else
        @foreach ($answers as $answer)
        <td>{{ $answer->answer }}</td>
        @endforeach
        @endif
        <td>{{ $user->created_at->diffForHumans() }}</td>
    </tr>
    @endforeach
</tbody>
      </table>
      </div>
    </div>
    </div>
     </div>
    </div>
</div>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/buttons.colVis.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/buttons.print.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/pdfmake.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/jszip.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/vfs_fonts.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/buttons.bootstrap5.min.js') }}"></script>
  {{-- <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script> --}}
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- jQuery -->
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        <script>
          var appLocale = '{{ app()->getLocale() }}';
      </script>
        {{-- {!! Toastr::message() !!} --}}
  <script>
$(document).ready(function() {
    var table = $('.cbtn-selectors').DataTable(
    //   {
    //     processing: true,
    //     serverSide: true,
    //     order: [0, 'desc'], // Corrected placement and syntax of order
    //     columns: [
    //         { data: 'id', name: 'id' },
    //         { data: 'name', name: 'name' },
    //         { data: 'email', name: 'email' },
    //         { data: 'last_name', name: 'last_name' },
    //         { data: 'created_at', name: 'created_at' },   
    //     ]
    // }
    );});
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
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};
</script>


<script>
  function printPage() {
    // Create a style element for print-specific CSS
    var style = document.createElement('style');
    style.type = 'text/css';
    style.innerHTML = '@media print { body > *:not(#updatetdForm) { display: none; } }';

    // Append the style element to the document head
    document.head.appendChild(style);

    // Print the page
    window.print();
    // Remove the style element after printing
    document.head.removeChild(style);
  }
</script>

<script>
  $(document).on('click','.updatet_user_Form', function() {
    let userId = $(this).data('id');

    // AJAX request to fetch user's answers
    $.ajax({
      url: '/user/' + userId + '/answers',
      method: 'GET',
      success: function(response) {
        // Assuming response is an object containing user information and answers
        let answers = response.answers;

        let answersHtml = '';

        // Iterate over answers and create HTML for each
        for (let i = 0; i < answers.length; i++) {
            answersHtml += '<div class="input-group answer-line">';
            answersHtml += '  <span class="input-group-text">اجابة السؤال</span>'; // Assuming this is a static label
            answersHtml += '  <div class="form-control" id="up_answers">' + answers[i] + '</div>';
            answersHtml += '</div>';
        }

        // Display answers in the #up_answers_wrapper element
        $('#up_answers_wrapper').html(answersHtml);

        // Set user data to modal inputs
        $('#up_name').val(response.name);
        $('#up_birth').val(response.birth);
        $('#up_email').val(response.email);
        $('#up_place').val(response.place);
        $('#up_identity_num').val(response.identity_num);
        $('#up_work').val(response.work);
        $('#up_study').val(response.study);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  });
</script>
</body>
</html>

