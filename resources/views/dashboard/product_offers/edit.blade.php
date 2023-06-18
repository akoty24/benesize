<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product Offer</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Edit Product Offer</h1>
    @if ($errors->any())
        <div class="alert alert-danger" style="margin-right: 22px; margin-left: 22px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('product_offers.update', $productOffer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="product_id" class="form-label">Product</label>
            <select class="form-select" id="product_id" name="product_id" required>
                <option value="">Select a product</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $productOffer->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="discount_type" class="form-label">Discount Type</label>
            <select class="form-select" id="discount_type" name="discount_type" required>
                <option value="">Select a discount type</option>
                <option value="percentage" {{ $productOffer->discount_type == 'percentage' ? 'selected' : '' }}>Percentage</option>
                <option value="fixed" {{ $productOffer->discount_type == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="discount_value" class="form-label">Discount Value</label>
            <input type="text" class="form-control" id="discount_value" name="discount_value" value="{{ $productOffer->discount_value }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="">Select a status</option>
                <option value="0" {{ $productOffer->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="1" {{ $productOffer->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Product Offer</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
