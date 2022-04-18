@extends('layout.template')
@section('content')
    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
            integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link id="pagestyle" href="{{ asset('template/dist/css/argon-dashboard.css?v=2.0.2') }}" rel="stylesheet" />
    @endpush
    <style>
        .table,
        .td {
            text-align: center
        }

        .modal-title {
            margin-left: auto;
        }

    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- /.content-header -->

        <!-- Main content -->

        <div class="container">
            <a href="/tambahstudent" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary mt-3"><i
                    class="bi bi-person-plus-fill"></i> Tambah</a>
            <form action="/student" method="get">
                <div class="row g-3 align-items-center mt-0 mb-2">
                    <div class="col-5">
                        <input type="search" name="search" class="form-control" id="exampleInputSearch"
                            placeholder="Search">
                        <form action={{ url('/modalfilter') }} method="get" enctype="multipart/form-data">
                            <a href="#" class="btn-sm btn-filter">
                                <select name="modal" id="modal-filter" class="btn btn-sm btn-flat btn-filter mt-3">
                                    <i class="fa fa-filter">
                                        <option value="" hidden>Choose Gender</option>
                                        <option value="" disabled>Choose Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                </select>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </i> </a>
                        </form>

                    </div>
            </form>
            <div class="card">
                <div class="modal-content">

                    <div class="container">

                        <div class="row">
                            <!---@if ($message = Session::get('alert'))
    <div class="alert alert-info" role="alert">
                                                                                                                                                                                                                                                                                                                                            {{ $message }}
    @endif-->
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Motto</th>
                                        <th scope="col">Number_phone</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $index => $s)
                                        <tr>
                                            <th scope="row">{{ $index + $data->firstItem() }}</th>
                                            <td>{{ $s->name }}</td>
                                            <td>{{ $s->email }}</td>
                                            <td>{{ $s->gender }}</td>
                                            <td>{{ $s->address }}</td>
                                            <td>
                                                <img src="{{ asset('photostudent/' . $s->photo) }}" alt=""
                                                    style="width: 50px">
                                            </td>
                                            <td>{{ $s->motto }}</td>
                                            <td>
                                                {{ $s->number_phone }}
                                            </td>
                                            <td>
                                                <a href="{{ route('detailstudent', ['id' => $s->id]) }}"
                                                    class="btn btn-info" }}><i class="bi bi-eye-fill"></i></a>
                                                <a href="/tampildata/{{ $s->id }}" class="btn btn-warning"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                                <a href="#" class="btn btn-danger delete" data-id="{{ $s->id }}"><i
                                                        class="bi bi-trash2-fill"></i></a>
                                            </td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal-live --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">TAMBAH DATA</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form action="/insertdata" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                @error('name')
                                    {{ $message }}
                                @enderror
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                @error('email')
                                    {{ $message }}
                                @enderror
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                @error('gender')
                                    {{ $message }}
                                @enderror
                                <label for="exampleInputPassword1">Gender</label>
                                <select name="gender" id="" class="form-control validate">
                                    <option value="" hidden>Choose Gender</option>
                                    <option value="" disabled>Choose Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                @error('address')
                                    {{ $message }}
                                @enderror
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                @error('photo')
                                    {{ $message }}
                                @enderror
                                <label for="exampleInputEmail1" class="form-label">Masukkan Photo</label>
                                <input type="file" name="photo" class="form-control">
                            </div>
                            <div class="mb-3">
                                @error('motto')
                                    {{ $message }}
                                @enderror
                                <label for="exampleInputEmail1">Motto</label>
                                <input type="text" name="motto" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                @error('number_phone')
                                    {{ $message }}
                                @enderror
                                <label for="exampleInputEmail1">Number_phone</label>
                                <input type="text" name="number_phone" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
                                                                                                                                                                                                                                                                                                                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        crossorigin="anonymous">
                                                                                                                                                                                                                                                                                                                    </script>
                                                                                                                                                                                                                                                                                                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        crossorigin="anonymous">
                                                                                                                                                                                                                                                                                                                    </script>
                                                                                                                                                                                                                                                                                                                    -->

    <script>
        $('.delete').click(function() {
            var studentid = $(this).attr('data-id');
            swal({
                    title: "Yakin?",
                    text: "Kamu akan menghapus data ini selamanya",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/deletedata/" + studentid + ""
                        swal("Data anda berhasil dihapus", {
                            icon: "success",
                        });
                    }
                });
        });
    </script>
    @section('scripts')
        <script>
            @if (Session::has('alert'))
                toastr.success("{{ Session::get('alert') }}");
            @endif
        </script>
        <script type="text/javascript">
            $(document).ready(function() {

                $('.btn-filter').click(function(e) {
                    e.preventDefault();
                    $('#modal-filter').modal();
                })
            })
        </script>
    @endpush
