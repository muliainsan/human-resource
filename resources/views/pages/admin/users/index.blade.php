@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('user.create') }}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>

                                        <a href="{{ route('user.show', $user) }}" class="btn btn-primary btn-sm">
                                            Detail
                                        </a>
                                        <button type="button" class="btn btn-default dropdown-toggle dot-icon btn-sm"
                                            data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            {{-- <a href="{{ route('user.updatePublickey', ['id' => $user->id]) }}"
                                                class="dropdown-item">
                                                Update Pk
                                            </a> --}}
                                            {{-- <a href="{{ route('user.sensor', ['id' => $user->id]) }}" class="dropdown-item">
                                                Add Sensor
                                            </a> --}}
                                            <div class="dropdown-divider"></div>
                                            <a href="{{ route('user.edit', $user) }}" class="dropdown-item">
                                                Edit
                                            </a>
                                            <a href="{{ route('user.destroy', $user) }}"
                                                onclick="notificationBeforeDelete(event, this)" class="btn dropdown-item">
                                                Delete
                                            </a>
                                            {{-- <li href="{{route('users.destroy', $user)}}"
                                        onclick="notificationBeforeDelete(event, this)" class="btn">
                                        Delete
                                    </li> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- @stop --}}
    @push('js')
        <form action="" id="delete-form" method="post">
            @method('delete')
            @csrf
        </form>
        <script>
            $("#example2").DataTable({
                "responsive": true,
                "lengthChange": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        </script>
        <script>
            function notificationBeforeDelete(event, el) {
                event.preventDefault();
                if (confirm('are you sure to delete the data ? ')) {
                    $("#delete-form").attr('action', $(el).attr('href'));
                    $("#delete-form").submit();
                }
            }


            @if (Session::has('success_message'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.success("{{ session('success_message') }}");
            @endif

            @if (Session::has('error_message'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.error("{{ session('error_message') }}");
            @endif
        </script>
    @endpush
@endsection
