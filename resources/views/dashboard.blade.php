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
                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <circle cx="12" cy="7" r="4" />
                      <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    </svg>
                  </span>
                </div>
                <div class="col">
                  <div class="font-weight-medium" style="font-size: 20px">
                    123
                  </div>
                  <div class="text-muted">Pengguna</div>
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
                    <!-- Download SVG icon from http://tabler-icons.io/i/users -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <circle cx="9" cy="7" r="4" />
                      <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                      <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                      <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                    </svg>
                  </span>
                </div>
                <div class="col">
                  <div class="font-weight-medium" style="font-size: 20px">
                    123
                  </div>
                  <div class="text-muted">Pegawai</div>
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