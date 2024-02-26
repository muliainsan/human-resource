@extends('layouts.template')

@section('content')
    {{-- <form action="{{ route('devices.update', $device) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputHostName">Host Name</label>
                            <input type="text" class="form-control @error('host_name') is-invalid @enderror"
                                id="exampleInputHostName" placeholder="Host Name" name="host_name"
                                value="{{ $device->host_name ?? old('host_name') }}">
                            @error('host_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputip">IP Address</label>
                            <input type="text" class="form-control @error('ip') is-invalid @enderror" id="exampleInputip"
                                placeholder="IP Address" name="ip" value="{{ $device->ip ?? old('ip') }}">
                            @error('ip')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPk">Public Key (base64)</label>
                            <input type="text" class="form-control @error('pk') is-invalid @enderror" id="exampleInputip"
                                placeholder="Public Key" name="pk" value="{{ $device->public_key ?? old('pk') }}"
                                readonly>
                            @error('pk')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPk">Id Destination</label>
                            <input type="text" class="form-control @error('pk') is-invalid @enderror" id="exampleInputip"
                                placeholder="Public Key" name="pk"
                                value="{{ $device->id_destination ?? old('id_destination') }}" readonly>
                            @error('pk')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('devices.index') }}" class="btn btn-default">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form> --}}


    <form action="{{ route('user.update', $user) }}" method="post">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                placeholder="Your name" value="{{ $user->name ?? old('name') }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- <div class="form-group">
            <label for="exampleInputHostName">Host Name</label>
            <input type="text" class="form-control @error('host_name') is-invalid @enderror" id="exampleInputHostName"
                placeholder="Host Name" name="host_name" value="{{ $device->host_name ?? old('host_name') }}">
            @error('host_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div> --}}

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                placeholder="name@example.com" value="{{ $user->email ?? old('email') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="role">Role </label>
            <select id="role" name="role" class="form-control @error('role') is-invalid @enderror">

                @foreach ($roles as $role)
                    <option value="{{ $role->name }}" @if ($role->name === $user->getRoleNames()) selected="selected" @endif>
                        {{ $role->name }}</option>


                    {{-- <option value={{ $role }}>Volvo</option> --}}
                @endforeach

            </select>
        </div>


        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Register">
        </div>
    </form>
@endsection
