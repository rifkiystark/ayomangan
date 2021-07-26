@extends('layouts.induk')
@section('content')

<div class="page-wrapper">
  <div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
      <div class="row align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">Halaman Menu</div>
          <h2 class="page-title">Nama Tempat : {{$place->name}}</h2>
        </div>
        <div class="col text-end">
          <!-- Page pre-title -->
          <a href="{{ url('place') }}" class="btn btn-ghost-warning">Kembali</a>
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
                  <h3 class="card-title">Menu</h3>
                  <div class="card-subtitle">Menus</div>
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
                        <h5 class="modal-title">Tambah Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ url('add-menu') }}" method="post" id="addForm">
                          @csrf
                          <input type="hidden" name="place_id" value="{{$placeId}}">
                          <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" placeholder="" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" name="price" class="form-control" placeholder="" required>
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
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th class="w-1"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($menus as $menu)
                      <tr>
                        <td>{{ $menu->name }}</td>
                        <td class="text-muted">
                          {{ $menu->price }}
                        </td>
                        <td class="text-muted">
                          {{ $menu->description }}
                        </td>
                        <td class="text-muted">
                          @foreach($menu->images as $image)
                          <a href="{{ url('delete-image/'.$placeId.'/'.$image->id) }}"> <img src="{{ asset('image/'.$image->name) }}" style="width: 100px; height: auto;">
                          </a>
                          @endforeach
                          <a href="#" data-bs-toggle="modal" data-bs-target="#modal-image{{ $menu->id }}">Tambah Gambar</a>
                        </td>
                        <td>
                          <a href="#">Lihat</a>
                          <a href="#" data-bs-toggle="modal" data-bs-target="#modal-edit{{ $menu->id }}">Edit</a>
                          |
                          <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#modal-delete{{ $menu->id }}">Hapus</a>
                        </td>
                      </tr>
                      <div class="modal modal-blur fade" id="modal-image{{ $menu->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Modal Image</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ url('add-image') }}" method="post" id="addImage{{ $menu->id }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $menu->id }}">
                                <input type="hidden" name="place_id" value="{{$placeId}}">
                                <input type="hidden" name="type" value="2">

                                <div class="mb-3">
                                  <label class="form-label">Gambar</label>
                                  <input type="file" value="" name="file" class="form-control" placeholder="" required>
                                </div>


                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn me-auto" data-bs-dismiss="modal">Tutup</button>
                              <button type="submit" class="btn btn-primary" form="addImage{{ $menu->id }}">Perbarui</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal modal-blur fade" id="modal-edit{{ $menu->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Menu</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ url('edit-menu') }}" method="post" id="editForm{{ $menu->id }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $menu->id }}">
                                <input type="hidden" name="place_id" value="{{$placeId}}">

                                <div class="mb-3">
                                  <label class="form-label">Nama</label>
                                  <input type="text" value="{{ $menu->name }}" name="name" class="form-control" placeholder="" required>
                                </div>
                                <div class="mb-3">
                                  <label class="form-label">Harga</label>
                                  <input type="number" value="{{ $menu->price }}" name="price" class="form-control" placeholder="" required>
                                </div>
                                <div class="">
                                  <label class="form-label">Deskripsi</label>
                                  <textarea class="form-control" name="description" rows="4" placeholder="" required>{{ $menu->description }}</textarea>
                                </div>

                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn me-auto" data-bs-dismiss="modal">Tutup</button>
                              <button type="submit" class="btn btn-primary" form="editForm{{ $menu->id }}">Perbarui</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal modal-blur fade" id="modal-delete{{ $menu->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                  <div class="col"><a href="{{ url('delete-menu/'.$placeId.'/'.$menu->id) }}" class="btn btn-danger w-100">
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