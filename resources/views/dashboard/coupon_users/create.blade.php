<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Coupon User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Create Coupon User</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('coupon_users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="coupon_id">@lang('translation.Coupon')</label>
            <select class="form-control" id="coupon_id" name="coupon_id" required>
                <option value="" disabled selected>@lang('translation.Select Coupon')</option>
                @foreach ($coupons as $coupon)
                    <option value="{{ $coupon->id }}">{{ $coupon->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="user_id">@lang('translation.User')</label>
            <select class="form-control" id="user_id" name="user_id" required>
                <option value="" disabled selected>@lang('translation.Select User')</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">@lang('translation.Add Coupon User')</button>
    </form>

</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>