@extends('layout.template')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link id="pagestyle" href="{{ asset('template/dist/css/argon-dashboard.css?v=2.0.2') }}" rel="stylesheet" />


    <body>
        <div class="container">
            <h2 class="text-center mt-3">EDIT DATA</h2>
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/updatedata/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->email }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1">Gender</label>
                                    <select name="gender" id="" class="form-control validate" required>
                                        <option selected hidden>{{ $data->gender }}</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" name="address" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->address }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1">Photo</label>
                                    <input type="file" name="photo" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1">Motto</label>
                                    <input type="text" name="motto" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->motto }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1">Number_phone</label>
                                    <input type="text" name="number_phone" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->number_phone }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

</html>
