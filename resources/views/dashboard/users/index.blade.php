@extends('layouts.master')
@section('title')
    @lang('translation.User List')
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css" />
    <link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
          rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('translation.User')
        @endslot
        @slot('title')
            @lang('translation.User List')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th>@lang('translation.id')</th>
                            <th>@lang('translation.Name')</th>
                            <th>@lang('translation.Phone')</th>
                            <th>@lang('translation.Email')</th>
                            <th>@lang('translation.Address')</th>
                            <th>@lang('translation.Latitude')</th>
                            <th>@lang('translation.Longitude')</th>
                            <th>@lang('translation.Image')</th>
                            <th>@lang('translation.Is Active')</th>
                            <th>@lang('translation.Activation Code')</th>
                            <th>@lang('translation.Is Registered')</th>
                            <th>@lang('translation.Gender')</th>
                            <th>@lang('translation.Date of Birth')</th>
                            <th>@lang('translation.Country')</th>
                            <th>@lang('translation.City')</th>
                            <th>@lang('translation.Area')</th>
                            <th>@lang('translation.Actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->lat }}</td>
                                <td>{{ $user->lang }}</td>
                                <td>{{ $user->image }}</td>
                                <td>{{ $user->is_active }}</td>
                                <td>{{ $user->activation_code }}</td>
                                <td>{{ $user->is_registered }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->date_of_birth }}</td>
                                <td>{{ $user->country_id }}</td>
                                <td>{{ $user->city_id }}</td>
                                <td>{{ $user->area_id }}</td>
                                <td>
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">@lang('translation.View')</a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">@lang('translation.Edit')</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('@lang('translation.Are you sure?')')">@lang('translation.Delete')</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/build/js/pages/datatables.init.js') }}"></script>
@endsection
