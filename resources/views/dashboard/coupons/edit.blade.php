<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Coupon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Edit Coupon</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('coupons.update', $coupon->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $coupon->name }}" required>
        </div>
        <div class="form-group">
            <label for="code">Code</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ $coupon->code }}" required>
        </div>
        <div class="form-group">
            <label for="is_active">Is Active</label>
            <select class="form-control" id="is_active" name="is_active" required>
                <option value="1" {{ $coupon->is_active == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $coupon->is_active == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="discount">Discount</label>
            <input type="text" class="form-control" id="discount" name="discount" value="{{ $coupon->discount }}" required>
        </div>
        <div class="form-group">
            <label for="type_discount">Type Discount</label>
            <select class="form-control" id="type_discount" name="type_discount" required>
                <option value="percentage" {{ $coupon->type_discount == 'percentage' ? 'selected' : '' }}>Percentage</option>
                <option value="fixed" {{ $coupon->type_discount == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
            </select>
        </div>
        <div class="form-group">
            <label for="min_price">Minimum Price</label>
            <input type="text" class="form-control" id="min_price" name="min_price" value="{{ $coupon->min_price }}" required>
        </div>
        <div class="form-group">
            <label for="limit">Limit</label>
            <input type="text" class="form-control" id="limit" name="limit" value="{{ $coupon->limit }}" required>
        </div>
        <div class="form-group">
            <label for="limit_user">Limit per User</label>
            <input type="text" class="form-control" id="limit_user" name="limit_user" value="{{ $coupon->limit_user }}" required>
        </div>
        <div class="form-group">
            <label for="use">Use</label>
            <input type="text" class="form-control" id="use" name="use" value="{{ $coupon->use }}" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $coupon->end_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Coupon</button>
    </form>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
