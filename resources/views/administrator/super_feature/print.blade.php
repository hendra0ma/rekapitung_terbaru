
<!doctype html>
<html lang="en" dir="ltr">
	<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Zanex – Bootstrap  Admin & Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin, dashboard, dashboard ui, admin dashboard template, admin panel dashboard, admin panel html, admin panel html template, admin panel template, admin ui templates, administrative templates, best admin dashboard, best admin templates, bootstrap 4 admin template, bootstrap admin dashboard, bootstrap admin panel, html css admin templates, html5 admin template, premium bootstrap templates, responsive admin template, template admin bootstrap 4, themeforest html">

		<!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/assets/images/brand/favicon.ico" />

		<!-- TITLE -->
		<title>Zanex – Bootstrap  Admin & Dashboard Template</title>

		<!-- BOOTSTRAP CSS -->
		<link href="{{url('/')}}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

		<!-- STYLE CSS -->
		<link href="{{url('/')}}/assets/css/style.css" rel="stylesheet"/>
		<link href="{{url('/')}}/assets/css/dark-style.css" rel="stylesheet"/>
		<link href="{{url('/')}}/assets/css/skin-modes.css" rel="stylesheet" />

		<!-- SIDE-MENU CSS -->
		<link href="{{url('/')}}/assets/css/sidemenu.css" rel="stylesheet" id="sidemenu-theme">

		<!--C3 CHARTS CSS -->
		<link href="{{url('/')}}/assets/plugins/charts-c3/c3-chart.css" rel="stylesheet"/>

		<!-- P-scroll bar css-->
		<link href="{{url('/')}}/assets/plugins/p-scroll/perfect-scrollbar.css" rel="stylesheet" />

		<!--- FONT-ICONS CSS -->
		<link href="{{url('/')}}/assets/css/icons.css" rel="stylesheet"/>

		<!-- SIDEBAR CSS -->
		<link href="{{url('/')}}/assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!-- FILE UPLODE CSS -->
        <link href="{{url('/')}}/assets/plugins/fileuploads/css/fileupload.css" rel="stylesheet" type="text/css"/>

		<!-- SELECT2 CSS -->
		<link href="{{url('/')}}/assets/plugins/select2/select2.min.css" rel="stylesheet"/>

		<!-- INTERNAL Fancy File Upload css -->
		<link href="{{url('/')}}/assets/plugins/fancyuploder/fancy_fileupload.css" rel="stylesheet" />

		<!--BOOTSTRAP-DATERANGEPICKER CSS-->
		<link rel="stylesheet" href="{{url('/')}}/assets/plugins/bootstrap-daterangepicker/daterangepicker.css">

		<!-- TIME PICKER CSS -->
		<link href="{{url('/')}}/assets/plugins/time-picker/jquery.timepicker.css" rel="stylesheet"/>

		<!-- INTERNAL Date Picker css -->
		<link href="{{url('/')}}/assets/plugins/date-picker/date-picker.css" rel="stylesheet" />

		<!-- INTERNAL Sumoselect css-->
		<link rel="stylesheet" href="{{url('/')}}/assets/plugins/sumoselect/sumoselect.css">

		<!-- INTERNAL Jquerytransfer css-->
		<link rel="stylesheet" href="{{url('/')}}/assets/plugins/jQuerytransfer/jquery.transfer.css">
		<link rel="stylesheet" href="{{url('/')}}/assets/plugins/jQuerytransfer/icon_font/icon_font.css">

		<!-- INTERNAL Bootstrap DatePicker css-->
		<link rel="stylesheet" href="{{url('/')}}/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css">

		<!-- MULTI SELECT CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/plugins/multipleselect/multiple-select.css">

		<!--INTERNAL IntlTelInput css-->
		<link rel="stylesheet" href="{{url('/')}}/assets/plugins/intl-tel-input-master/intlTelInput.css">

		<!-- INTERNAL multi css-->
		<link rel="stylesheet" href="{{url('/')}}/assets/plugins/multi/multi.min.css">

		<!-- COLOR SKIN CSS -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{url('/')}}/assets/colors/color1.css" />

	</head>

  <div class="container">
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <h1>
                    ANALISA REALISASI DPT KPU PILKADA {{$kota->name}}
                </h1>
            </div>
          <table class="table table-bordered table-hover">
              <thead class="bg-primary text-white" style="background-color: red">
                  <tr>
                  <tr>
                      <td class="text-white text-center align-middle">Kecamatan</td>
                      <td class="text-white text-center align-middle">Total Dpt KPU</td>
                      <td class="text-white text-center align-middle">Total Pengguna Hak Pilih</td>
                      <td class="text-white text-center align-middle">Selisih</td>
                      <td class="text-white text-center align-middle">GAP</td>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($kecamatan as $item)
                  <?php $pengguna_hak = App\Models\SaksiData::where('district_id',$item['id'])->sum('voice'); ?>
                  <?php $persen = ($item['dpt'] - $pengguna_hak) / $item['dpt'] * 100; ?>
                  <tr>
                      <td>{{$item['name']}}</td>
                      <td>{{$item['dpt']}}</td>
                      <td>{{$pengguna_hak}}</td>
                      <td>{{$item['dpt'] - $pengguna_hak}}</td>
                      <td>@if ($pengguna_hak == 0)
                          0%
                          @else
                          {{ floor($persen) }}%
                          @endif</td>
                  </tr>
                  @endforeach
              </tbody>
          </table>

        </div>
    </div>
  </div>
	<!-- JQUERY JS -->
    <script src="{{url('/')}}/assets/js/jquery.min.js"></script>
    <script>

    setTimeout(function(){

                                  window.print();
                                  window.onafterprint = back;
                                  function back() {
                                    window.close()
                                }

                              },400)
    </script>
    <!-- BOOTSTRAP JS -->
    <script src="{{url('/')}}/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{url('/')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- INPUT MASK JS-->
    <script src="{{url('/')}}/assets/plugins/input-mask/jquery.mask.min.js"></script>

    <!-- SIDE-MENU JS-->
    <script src="{{url('/')}}/assets/plugins/sidemenu/sidemenu.js"></script>

    <!-- SIDEBAR JS -->
    <script src="{{url('/')}}/assets/plugins/sidebar/sidebar.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{url('/')}}/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
    <script src="{{url('/')}}/assets/plugins/p-scroll/pscroll.js"></script>
    <script src="{{url('/')}}/assets/plugins/p-scroll/pscroll-1.js"></script>

    <!-- FILE UPLOADES JS -->
    <script src="{{url('/')}}/assets/plugins/fileuploads/js/fileupload.js"></script>
    <script src="{{url('/')}}/assets/plugins/fileuploads/js/file-upload.js"></script>

    <!-- INTERNAL Bootstrap-Datepicker js-->
    <script src="{{url('/')}}/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- INTERNAL File-Uploads Js-->
    <script src="{{url('/')}}/assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
    <script src="{{url('/')}}/assets/plugins/fancyuploder/jquery.fileupload.js"></script>
    <script src="{{url('/')}}/assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
    <script src="{{url('/')}}/assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
    <script src="{{url('/')}}/assets/plugins/fancyuploder/fancy-uploader.js"></script>

    <!-- SELECT2 JS -->
    <script src="{{url('/')}}/assets/plugins/select2/select2.full.min.js"></script>

    <!-- BOOTSTRAP-DATERANGEPICKER JS -->
    <script src="{{url('/')}}/assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
    <script src="{{url('/')}}/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- INTERNAL Bootstrap-Datepicker js-->
    <script src="{{url('/')}}/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>

    <!-- INTERNAL Sumoselect js-->
    <script src="{{url('/')}}/assets/plugins/sumoselect/jquery.sumoselect.js"></script>

    <!-- TIMEPICKER JS -->
    <script src="{{url('/')}}/assets/plugins/time-picker/jquery.timepicker.js"></script>
    <script src="{{url('/')}}/assets/plugins/time-picker/toggles.min.js"></script>

    <!-- INTERNAL intlTelInput js-->
    <script src="{{url('/')}}/assets/plugins/intl-tel-input-master/intlTelInput.js"></script>
    <script src="{{url('/')}}/assets/plugins/intl-tel-input-master/country-select.js"></script>
    <script src="{{url('/')}}/assets/plugins/intl-tel-input-master/utils.js"></script>

    <!-- INTERNAL jquery transfer js-->
    <script src="{{url('/')}}/assets/plugins/jQuerytransfer/jquery.transfer.js"></script>

    <!-- INTERNAL multi js-->
    <script src="{{url('/')}}/assets/plugins/multi/multi.min.js"></script>

    <!-- DATEPICKER JS -->
    <script src="{{url('/')}}/assets/plugins/date-picker/date-picker.js"></script>
    <script src="{{url('/')}}/assets/plugins/date-picker/jquery-ui.js"></script>
    <script src="{{url('/')}}/assets/plugins/input-mask/jquery.maskedinput.js"></script>

    <!-- MULTI SELECT JS-->
    <script src="{{url('/')}}/assets/plugins/multipleselect/multiple-select.js"></script>
    <script src="{{url('/')}}/assets/plugins/multipleselect/multi-select.js"></script>

    <!-- FORMELEMENTS JS -->
    <script src="{{url('/')}}/assets/js/formelementadvnced.js"></script>
    <script src="{{url('/')}}/assets/js/form-elements.js"></script>

    <!-- CUSTOM JS -->
    <script src="{{url('/')}}/assets/js/custom.js"></script>

</body>
</html>
