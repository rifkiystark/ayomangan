<!DOCTYPE html>
<!--
  * Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
  * @version 1.0.0-beta3
  * @link https://tabler.io
  * Copyright 2018-2021 The Tabler Authors
  * Copyright 2018-2021 codecalm.net Paweł Kuna
  * Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>
    AyoMangan
  </title>
  <!-- CSS files -->
  <link href="{{ asset ('quixlab/plugins/clockpicker/dist/jquery-clockpicker.min.css') }}" rel="stylesheet">
  <link href="{{ asset ('quixlab/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="{{ asset('tabler/dist/css/tabler.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('tabler/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('tabler/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('tabler/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('tabler/dist/css/demo.min.css') }}" rel="stylesheet" />
  <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
  <style>
    .page-body {
      margin-top: 0.5rem;
      margin-bottom: 0.5rem;
    }

    hr {
      margin: 8px 0 !important;
    }

    .float-right {
      float: right;
    }

    #map {
      height: 400px;
    }

    #description {
      font-family: Roboto;
      font-size: 15px;
      font-weight: 300;
    }

    #infowindow-content .title {
      font-weight: bold;
    }

    #infowindow-content {
      display: none;
    }

    #map #infowindow-content {
      display: inline;
    }

    .pac-card {
      margin: 10px 10px 0 0;
      border-radius: 2px 0 0 2px;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      outline: none;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      background-color: #fff;
      font-family: Roboto;
    }

    #pac-container {
      padding-bottom: 12px;
      margin-right: 12px;
    }

    .pac-controls {
      display: inline-block;
      padding: 5px 11px;
    }

    .pac-controls label {
      font-family: Roboto;
      font-size: 13px;
      font-weight: 300;
    }

    #pac-input {
      background-color: #fff;
      font-family: Roboto;
      font-size: 15px;
      font-weight: 300;
      margin-left: 12px;
      padding: 0 11px 0 13px;
      text-overflow: ellipsis;
      width: 400px;
      border: none;
      margin: 16px;
      padding: 6px;
      border-radius: 4px;
    }

    #pac-input:focus {
      border-color: #4d90fe;
    }

    .dataTables_filter {
      margin-bottom: 16px;
    }

    .dt-buttons {
      float: left;
      margin-bottom: 8px;
    }

    td {
      white-space: nowrap;
    }
  </style>
</head>

<body class="antialiased">
  <div class="wrapper">
    <header class="navbar navbar-expand-md navbar-light d-print-none">
      <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="
        navbar-brand navbar-brand-autodark
        d-none-navbar-horizontal
        pe-0 pe-md-3
        ">
          <a href="{{ url('/') }}">
            <img src="{{ asset('tabler/static/logo.svg') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image" />
          </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
          <div class="nav-item d-flex me-3 dropdown">
            
          </div>
          <div class="nav-item dropdown">
            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
              <span class="avatar avatar-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <circle cx="12" cy="7" r="4" />
                  <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>
              </span>
              <div class="d-none d-xl-block ps-2">
                <div>{{Auth::user()->name}}</div>
                <div class="mt-1 small text-muted">{{Auth::user()->level}}</div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <a href="{{ url('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="navbar-expand-md">
      <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
          <div class="container-xl">
            <ul class="navbar-nav">
              <li class="nav-item @if($active == 'dashboard') active @endif">
                <a class="nav-link" href="{{ url('/') }}/dashboard">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <circle cx="12" cy="13" r="2" />
                      <line x1="13.45" y1="11.55" x2="15.5" y2="9.5" />
                      <path d="M6.4 20a9 9 0 1 1 11.2 0z" />
                    </svg>
                  </span>
                  <span class="nav-link-title"> Dashboard </span>
                </a>
              </li>
              <li class="nav-item @if($active == 'place') active @endif">
                <a class="nav-link" href="{{ url('/') }}/place">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="18" y1="6" x2="18" y2="6.01" /><path d="M18 13l-3.5 -5a4 4 0 1 1 7 0l-3.5 5" /><polyline points="10.5 4.75 9 4 3 7 3 20 9 17 15 20 21 17 21 15" /><line x1="9" y1="4" x2="9" y2="17" /><line x1="15" y1="15" x2="15" y2="20" /></svg>
                  </span>
                  <span class="nav-link-title"> Tempat </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    @yield('content')
  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#dataTablePegawai").DataTable({
          dom: "Bfrtip",
          "ordering": false,
          buttons: [{
            extend: "excel",
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
            },
            title: 'Data Pegawai'
          }],
        }),
        $(
          ".buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel"
        ).addClass("btn btn-primary mr-1");


      const url = window.location.search;
      console.log(url);
      $(".dt-buttons").append("<a target='_blank' class='dt-button btn btn-primary mr-1' tabindex='0' aria-controls='dataTable' href='{{ url('/') }}/pegawai/print" + url + "'><span>PDF</span></a>");
    });
  </script>

  @if (isset($printWaktu) && $printWaktu != null)
  <script>
    $(document).ready(function() {
      $(".file-export").DataTable({
          dom: "Bfrtip",
          "ordering": false,
          buttons: [{
            extend: "excel",

            title: 'Presensi_{{$printUPT}}_{{$printWaktu}}'
          }],
        }),
        $(
          ".buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel"
        ).addClass("btn btn-primary mr-1");


      const url = window.location.search;
      console.log(url);
      $(".dt-buttons").append("<a target='_blank' class='dt-button btn btn-primary mr-1' tabindex='0' aria-controls='dataTable' href='{{ url('/') }}/presensi/print" + url + "'><span>PDF</span></a>");
    });
  </script>
  @endif

  <script>
    $(document).ready(function() {
      $(".default-dt").DataTable({
          dom: "Bfrtip",
          "ordering": false,
          buttons: [{
            extend: "excel",

            title: 'Presensi'
          }],
        }),
        $(
          ".buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel"
        ).addClass("btn btn-primary mr-1");
    });
  </script>

  @include('sweetalert::alert')

  <script src="{{ asset('tabler/dist/js/tabler.min.js') }}"></script>
  <script src="{{ asset ('quixlab/plugins/moment/moment.js') }}"></script>
  <script src="{{ asset ('quixlab/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
  <script src="{{ asset ('quixlab/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset ('quixlab/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset ('quixlab/js/plugins-init/form-pickers-init.js') }}"></script>

</body>

</html>