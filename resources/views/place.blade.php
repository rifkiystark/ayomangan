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
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <h3 class="card-title">Tempat</h3>
                  <div class="card-subtitle">Places</div>
                </div>
                <div class="col-md-6 col-sm-12 text-end">
                  <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-simple">
                    Tambah
                  </a>

                </div>
                <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Tambah Tempat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ url('add-place') }}" method="post" id="addForm">
                          @csrf
                          <div class="mb-3">
                            <label class="form-label">Nama Tempat</label>
                            <input type="text" name="name" class="form-control" placeholder="" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Pemilik</label>
                            <input type="text" name="owner" class="form-control" placeholder="" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Telepon</label>
                            <input type="number" name="phone" class="form-control" placeholder="" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="address" rows="4" placeholder="" required></textarea>
                          </div>
                          <div class="">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="description" rows="4" placeholder="" required></textarea>
                          </div>

                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" form="addForm">Simpan</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="table-responsive">
                  <table class="table table-vcenter card-table table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Pemilik</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
                        <th class="w-1"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($places as $place)
                      <tr>
                        <td>{{ $place->name }}</td>
                        <td class="text-muted">
                          {{ $place->owner }}
                        </td>
                        <td class="text-muted">{{ $place->phone }}</td>
                        <td class="text-muted">
                          {{ $place->address }}
                        </td>
                        <td class="text-muted">
                          {{ $place->description }}
                        </td>
                        <td>
                          <a href="#">Lihat</a>
                          <a href="#" data-bs-toggle="modal" data-bs-target="#modal-edit{{ $place->id }}">Edit</a>
                          |
                          <a href="#" class="text-danger"  data-bs-toggle="modal" data-bs-target="#modal-delete{{ $place->id }}">Hapus</a>
                        </td>
                      </tr>
                      <div class="modal modal-blur fade" id="modal-edit{{ $place->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Tempat</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ url('edit-place') }}" method="post" id="editForm">
                                @csrf
                                <input type="hidden" name="id" value="{{ $place->id }}">
                                <div class="mb-3">
                                  <label class="form-label">Nama Tempat</label>
                                  <input type="text" value="{{ $place->name }}" name="name" class="form-control" placeholder="" required>
                                </div>
                                <div class="mb-3">
                                  <label class="form-label">Pemilik</label>
                                  <input type="text" value="{{ $place->owner }}" name="owner" class="form-control" placeholder="" required>
                                </div>
                                <div class="mb-3">
                                  <label class="form-label">Telepon</label>
                                  <input type="number" value="{{ $place->phone }}" name="phone" class="form-control" placeholder="" required>
                                </div>
                                <div class="mb-3">
                                  <label class="form-label">Alamat</label>
                                  <textarea class="form-control" name="address" rows="4" placeholder="" required>{{ $place->address }}</textarea>
                                </div>
                                <div class="">
                                  <label class="form-label">Deskripsi</label>
                                  <textarea class="form-control" name="description" rows="4" placeholder="" required>{{ $place->description }}</textarea>
                                </div>

                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn me-auto" data-bs-dismiss="modal">Tutup</button>
                              <button type="submit" class="btn btn-primary" form="editForm">Perbarui</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal modal-blur fade" id="modal-delete{{ $place->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="modal-status bg-danger"></div>
                            <div class="modal-body text-center py-4">
                              <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 9v2m0 4v.01" />
                                <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                              </svg>
                              <h3>Hapus Data</h3>
                              <div class="text-muted">Anda yakin ingin menghapus data ?</div>
                            </div>
                            <div class="modal-footer">
                              <div class="w-100">
                                <div class="row">
                                  <div class="col"><a href="#" class="btn btn-white w-100" data-bs-dismiss="modal">
                                      Batal
                                    </a></div>
                                  <div class="col"><a href="{{ url('delete-place/'.$place->id) }}" class="btn btn-danger w-100">
                                      Hapus
                                    </a></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>



</div>


<!-- /.container-fluid -->
@endsection