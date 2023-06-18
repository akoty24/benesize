<!-- resources/views/sizes/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Category</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Add New Product</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('products.store') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" >
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" >
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" ></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" >
        </div>

        <div class="mb-3">
            <label for="min_price" class="form-label">Min Price</label>
            <input type="number" class="form-control" id="min_price" name="min_price" >
        </div>

        <div class="mb-3">
            <label for="increase_ratio" class="form-label">increase ratio</label>
            <input type="number" class="form-control" id="increase_ratio" name="increase_ratio" >
        </div>
        <div class="mb-3">
            <label for="repeat_times" class="form-label">repeat times</label>
            <input type="number" class="form-control" id="repeat_times" name="repeat_times" >
        </div>
        <div class="mb-3">
            <label for="repeat_times" class="form-label">Maximum</label>
            <input readonly="" type="number" class="form-control" id="max_price" name="max_price" >
        </div>

        <div class="mb-3">
            <label for="sub_category_id" class="form-label">Sub Category</label>
            <select class="form-select form-control" id="sub_category_id" name="sub_category_id" >
                <option value="">Select Sub Category</option>
                @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="is_new" class="form-label">Is New</label>
            <select class="form-control" id="is_new" name="is_new" >
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="is_on_sale" class="form-label">Is On Sale</label>
            <select class="form-control" id="is_on_sale" name="is_on_sale" >
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="is_new_arrival" class="form-label">Is New Arrival</label>
            <select class="form-control" id="is_new_arrival" name="is_new_arrival" >
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="is_best_seller" class="form-label">Is Best Seller</label>
            <select class="form-control" id="is_best_seller" name="is_best_seller" >
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Get references to the input elements
        var min_price = $('#min_price');
        var increase_ratio = $('#increase_ratio');
        var repeat_times = $('#repeat_times');
        var max_price = $('#max_price');

        // Calculate the result when any of the input values change
        $(min_price).add(increase_ratio).add(repeat_times).on('input', function() {
            // Get the values from inputs A, B, and C
            var valueA = parseFloat($(min_price).val()) || 0;
            var valueB = parseFloat($(increase_ratio).val()) || 0;
            var valueC = parseFloat($(repeat_times).val()) || 0;

            // Perform the calculation
            var result = valueA + (valueB * (valueC + 1));

            // Set the calculated result in input D
            $(max_price).val(result);
        });
    });
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>