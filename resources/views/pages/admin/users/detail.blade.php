@extends('adminlte::page')
@section('title', 'List User')
@section('content_header')
<h1 class="m-0 text-dark">Device</h1>
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Device Detail</h3>

                <div class="card-tools">

                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ URL('img/arduino.jpg') }}"
                                    alt="User profile picture">
                            </div>
                            <p class="text-muted text-center">Arduino Mega</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>ID</b>
                                    <span class="float-right text-primary">{{$device->id}} </span>
                                </li>
                                <li class="list-group-item">
                                    <b>Host Name</b>
                                    <span class="float-right text-primary">{{$device->host_name}} </span>
                                </li>
                                <li class="list-group-item">
                                    <b>Ip</b>
                                    <span class="float-right text-primary">{{$device->ip}} </span>
                                </li>
                                <li class="list-group-item">
                                    <b>Publickey</b>
                                    <a href="{{route('device.generatePublickeyFromDetail', ['id'=>$device->id] )}}"
                                        class="btn btn-info btn-xm">
                                        Generate Public key
                                    </a> <a href="{{route('device.updatePublickeyFromDetail', ['id'=>$device->id] )}}"
                                        class="btn btn-primary btn-xm">
                                        Update Public key
                                    </a>
                                    <span class="float-right text-primary">{{$device->public_key}} </span>
                                </li>
                                <li class="list-group-item">
                                    <b>Id Destination</b>
                                    <span class="float-right text-primary">{{$device->id_destination}} </span>
                                </li>
                            </ul>
                            <div class="text-center mt-5 mb-6">


                                <a href="{{route('devices.edit', $device)}}" class="btn btn-primary btn-xm">
                                    Edit
                                </a>
                                <a href="{{route('devices.destroy', $device)}}"
                                    onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xm">
                                    Delete
                                </a>


                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <a href="{{route('device.sensor', ['id'=>$device->id] )}}" class="btn btn-success btn-xm">
                            Add Sensor
                        </a>
                        <h5 class="mt-5 text-muted">Sensors</h5>
                        <ul class="list-unstyled">
                            @foreach($sensors as $sensor)
                            <li>
                                <span class="text-secondary"><i class="fa fa-circle"></i> {{$sensor->name}}
                                </span>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    <!-- /.col -->
    @stop
    @push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>

    <script>
        function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('are you sure to delete the data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }

        @if(Session::has('success_message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('success_message') }}");
    @endif
    
    @if(Session::has('error_message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error_message') }}");
    @endif
    </script>
    @endpush