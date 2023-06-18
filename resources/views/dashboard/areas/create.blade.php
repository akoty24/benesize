<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Area</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Create Area</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('areas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="general_title">@lang('translation.General Title')</label>
            <input type="text" class="form-control" id="general_title" name="general_title" required>
        </div>
        <div class="form-group">
            <label for="city_id">@lang('translation.City')</label>
            <select class="form-control" id="city_id" name="city_id" required>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->general_title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="is_active">@lang('translation.Is Active')</label>
            <select class="form-control" id="is_active" name="is_active" required>
                <option value="1">@lang('translation.Active')</option>
                <option value="0">@lang('translation.Inactive')</option>
            </select>
        </div>
        <div class="form-group">
            <label for="sort">@lang('translation.Sort')</label>
            <input type="text" class="form-control" id="sort" name="sort" required>
        </div>

        <button type="submit" class="btn btn-primary">@lang('translation.Add Area')</button>
    </form>

</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>