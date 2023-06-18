@extends('layouts.master')
@section('title')
    @lang('translation.Categories List')
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
            @lang('translation.Categories')
                @endslot
                @slot('title')
                    @lang('translation.Categories List')
                        @endslot
                        @endcomponent

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th scope="col" style="width: 60px">@lang('translation.id')</th>
                                                <th scope="col">@lang('translation.name')</th>
                                                <th scope="col">@lang('translation.Action')</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td>{{ $category->id }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>
                                                        <div class="row" style="margin: 0 0 0 0;">
                                                            <!-- Edit Button -->
                                                            <div class="col" style="flex: 0 0 0%">
                                                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-success">@lang('translation.Edit')</a>
                                                            </div>
                                                            <!-- Delete Button -->
                                                            <div class="col">
                                                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger">@lang('translation.Delete')</button>
                                                                </form>
                                                            </div>
                                                        </div>
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
