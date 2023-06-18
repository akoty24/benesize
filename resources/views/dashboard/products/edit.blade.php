<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Edit Product</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" >
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" >{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="min_price">Min Price</label>
            <input type="number" class="form-control" id="min_price" name="min_price" value="{{ $product->min_price }}" >
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" >
        </div>
        <div class="mb-3">
            <label for="increase_ratio" class="form-label">increase ratio</label>
            <input type="number" class="form-control" id="increase_ratio" name="increase_ratio" value="{{ $product->increase_ratio }}" >
        </div>
        <div class="mb-3">
            <label for="repeat_times" class="form-label">repeat times</label>
            <input type="number" class="form-control" id="repeat_times" name="repeat_times" value="{{ $product->repeat_times }}" >
        </div>
        <div class="form-group">
            <label for="sub_category_id">Sub Category</label>
            <select class="form-control" id="sub_category_id" name="sub_category_id" >
                @foreach($sub_categories as $sub_category)
                    <option value="{{ $sub_category->id }}" {{ $sub_category->id == $product->sub_category_id ? 'selected' : '' }}>
                        {{ $sub_category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="is_new">Is New</label>
            <select class="form-control" id="is_new" name="is_new" >
                <option value="1"{{ $product->is_new ? ' selected' : '' }}>Yes</option>
                <option value="0"{{ !$product->is_new ? ' selected' : '' }}>No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="is_on_sale">Is On Sale</label>
            <select class="form-control" id="is_on_sale" name="is_on_sale" >
                <option value="1"{{ $product->is_on_sale ? ' selected' : '' }}>Yes</option>
                <option value="0"{{ !$product->is_on_sale ? ' selected' : '' }}>No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="is_new_arrival">Is New Arrival</label>
            <select class="form-control" id="is_new_arrival" name="is_new_arrival" >
                <option value="1"{{ $product->is_new_arrival ? ' selected' : '' }}>Yes</option>
                <option value="0"{{ !$product->is_new_arrival ? ' selected' : '' }}>No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="is_best_seller">Is Best Seller</label>
            <select class="form-control" id="is_best_seller" name="is_best_seller" >
                <option value="1"{{ $product->is_best_seller ? ' selected' : '' }}>Yes</option>
                <option value="0"{{ !$product->is_best_seller ? ' selected' : '' }}>No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
