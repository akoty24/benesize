@extends('layouts.master')

@section('title')
    @lang('translation.Products List')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('translation.Products')
        @endslot
        @slot('title')
            @lang('translation.Products List')
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
                            <th scope="col">@lang('translation.Name')</th>
                            <th scope="col">@lang('translation.Image')</th>
                            <th scope="col">@lang('translation.Description')</th>
                            <th scope="col">@lang('translation.Min Price')</th>
                            <th scope="col">@lang('translation.Price')</th>
                            <th scope="col">@lang('translation.Increase Ratio')</th>
                            <th scope="col">@lang('translation.Repeat Times')</th>
                            <th scope="col">@lang('translation.Sub Category ID')</th>
                            <th scope="col">@lang('translation.Is New')</th>
                            <th scope="col">@lang('translation.Is On Sale')</th>
                            <th scope="col">@lang('translation.Is New Arrival')</th>
                            <th scope="col">@lang('translation.Is Best Seller')</th>
                            <th scope="col">@lang('translation.Action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    @if($product->getFirstMediaUrl('images'))
                                        <img src="{{ $product->getFirstMediaUrl('images') }}" width="100px">
                                    @else
                                    no image
                                    @endif
                                </td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->min_price }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->increase_ratio }}</td>
                                <td>{{ $product->repeat_times }}</td>
                                <td>{{ $product->sub_category_id }}</td>
                                <td>{{ $product->is_new ? 'Yes' : 'No' }}</td>
                                <td>{{ $product->is_on_sale ? 'Yes' : 'No' }}</td>
                                <td>{{ $product->is_new_arrival ? 'Yes' : 'No' }}</td>
                                <td>{{ $product->is_best_seller ? 'Yes' : 'No' }}</td>
                                <td>
                                    <div class="row" style="margin: 0 0 0 0;">
                                        <!-- Edit Button -->
                                        <div class="col" style="flex: 0 0 0%">
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-success">@lang('translation.Edit')</a>
                                        </div>
                                        <!-- Delete Button -->
                                        <div class="col">
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline">
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
