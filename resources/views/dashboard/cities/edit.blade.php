
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit City</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Edit City</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cities.update', $city->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="general_title">@lang('translation.General Title')</label>
            <input type="text" class="form-control" id="general_title" name="general_title" value="{{ $city->general_title }}" required>
        </div>
        <div class="form-group">
            <label for="country_id">@lang('translation.Country')</label>
            <select class="form-control" id="country_id" name="country_id" required>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" {{ $city->country_id == $country->id ? 'selected' : '' }}>{{ $country->general_title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="is_active">@lang('translation.Is Active')</label>
            <select class="form-control" id="is_active" name="is_active" required>
                <option value="1" {{ $city->is_active == 1 ? 'selected' : '' }}>@lang('translation.Active')</option>
                <option value="0" {{ $city->is_active == 0 ? 'selected' : '' }}>@lang('translation.Inactive')</option>
            </select>
        </div>
        <div class="form-group">
            <label for="sort">@lang('translation.Sort')</label>
            <input type="text" class="form-control" id="sort" name="sort" value="{{ $city->sort }}" required>
        </div>

        <button type="submit" class="btn btn-primary">@lang('translation.Update City')</button>
    </form>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>