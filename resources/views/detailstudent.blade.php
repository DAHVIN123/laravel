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
        .modal-content {
            margin-top: 5%;
            padding-bottom: 20%
        }

        .table1,
        .td {
            text-align: center;
            margin: auto;
        }

    </style>
    <div class="content-wrapper">

        <!-- Main content -->
        <div class="container">
            <div class="">
                <div class="modal-content">

                    <div class="container">
                        <div class="card-body">
                            <table class="table1">
                                <tr>
                                    <td>{{ $id->name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $id->gender }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $id->address }}</td>
                                </tr>
                                <tr>
                                    <td><img src="{{ asset('photostudent/' . $id->photo) }}" alt="" style="width :120px">
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ $id->motto }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
