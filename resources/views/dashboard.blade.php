@extends('layouts.induk')
@section('content')

<div class="page-wrapper">
  <div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
      <div class="row align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">Halaman Admin</div>
          <h2 class="page-title">Dashboard</h2>
        </div>
        <!-- Page title actions -->
      </div>
    </div>
  </div>
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-sm-12 col-lg-12">
          <div class="card">
            <div class="progress progress-sm card-progress">
              <div class="progress-bar" style="width: 100%" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                <span class="visually-hidden"></span>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="h3 mb-1" id="greetings">Selamat Pagi</div>
              </div>
              <div class="h1 mb-1" id="clock">01:39:13 WIB</div>
              <div class="d-flex align-items-center">
                <div class="subheader" id="tanggal">20 May 2021</div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-md-6 col-xl-6">
          <div class="card card-sm">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-auto">
                  <span class="bg-blue text-white avatar">
                    <!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <circle cx="12" cy="11" r="3" />
                      <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                    </svg>
                  </span>
                </div>
                <div class="col">
                  <div class="font-weight-medium" style="font-size: 20px">
                    {{$place}}
                  </div>
                  <div class="text-muted">Tempat</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-6">
          <div class="card card-sm">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-auto">
                  <span class="bg-yellow text-white avatar">
                    <!-- Download SVG icon from http://tabler-icons.io/i/report-analytics -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                      <rect x="9" y="3" width="6" height="4" rx="2" />
                      <path d="M9 17v-5" />
                      <path d="M12 17v-1" />
                      <path d="M15 17v-3" />
                    </svg>
                  </span>
                </div>
                <div class="col">
                  <div class="font-weight-medium" style="font-size: 20px">
                    {{$menu}}
                  </div>
                  <div class="text-muted">Menu</div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</div>

<script>
  const bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

  function showTime() {
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59

    if (h >= 4 && h <= 9) {
      document.getElementById("greetings").innerText = "Selamat Pagi"
    } else if (h > 9 && h <= 14) {
      document.getElementById("greetings").innerText = "Selamat Siang"
    } else if (h > 14 && h <= 17) {
      document.getElementById("greetings").innerText = "Selamat Sore"
    } else {

      document.getElementById("greetings").innerText = "Selamat Malam"
    }

    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;

    var time = h + ":" + m + ":" + s + " WIB"
    document.getElementById("clock").innerText = time;
    document.getElementById("tanggal").innerText = `${date.getDate()} ${bulan[date.getMonth()]} ${date.getFullYear()}`;

    setTimeout(showTime, 1000);

  }

  showTime();
</script>
<!-- /.container-fluid -->
@endsection