<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Coupon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Create Coupon</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('coupons.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="code">Code</label>
            <input type="text" class="form-control" id="code" name="code" required>
        </div>
        <div class="form-group">
            <label for="is_active">Is Active</label>
            <select class="form-control" id="is_active" name="is_active" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="discount">Discount</label>
            <input type="text" class="form-control" id="discount" name="discount" required>
        </div>
        <div class="form-group">
            <label for="type_discount">Type Discount</label>
            <select class="form-control" id="type_discount" name="type_discount" required>
                <option value="percentage">Percentage</option>
                <option value="fixed">Fixed Amount</option>
            </select>
        </div>
        <div class="form-group">
            <label for="min_price">Minimum Price</label>
            <input type="text" class="form-control" id="min_price" name="min_price" required>
        </div>
        <div class="form-group">
            <label for="limit">Limit</label>
            <input type="text" class="form-control" id="limit" name="limit" required>
        </div>
        <div class="form-group">
            <label for="limit_user">Limit per User</label>
            <input type="text" class="form-control" id="limit_user" name="limit_user" required>
        </div>
        <div class="form-group">
            <label for="use">Use</label>
            <input type="text" class="form-control" id="use" name="use" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Coupon</button>
    </form>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
