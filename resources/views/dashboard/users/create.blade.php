<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Create User</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">@lang('translation.Name')</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="phone">@lang('translation.Phone')</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="email">@lang('translation.Email')</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">@lang('translation.Password')</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="address">@lang('translation.Address')</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="lat">@lang('translation.Latitude')</label>
            <input type="text" class="form-control" id="lat" name="lat" required>
        </div>
        <div class="form-group">
            <label for="lang">@lang('translation.Longitude')</label>
            <input type="text" class="form-control" id="lang" name="lang" required>
        </div>
        <div class="form-group">
            <label for="image">@lang('translation.Image')</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="is_active">@lang('translation.Is Active')</label>
            <select class="form-control" id="is_active" name="is_active" required>
                <option value="1">@lang('translation.Active')</option>
                <option value="0">@lang('translation.Inactive')</option>
            </select>
        </div>
        <div class="form-group">
            <label for="activation_code">@lang('translation.Activation Code')</label>
            <input type="text" class="form-control" id="activation_code" name="activation_code" required>
        </div>
        <div class="form-group">
            <label for="is_registered">@lang('translation.Is Registered')</label>
            <select class="form-control" id="is_registered" name="is_registered" required>
                <option value="1">@lang('translation.Yes')</option>
                <option value="0">@lang('translation.No')</option>
            </select>
        </div>
        <div class="form-group">
            <label for="gender">@lang('translation.Gender')</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="male">@lang('translation.Male')</option>
                <option value="female">@lang('translation.Female')</option>
            </select>
        </div>
        <div class="form-group">
            <label for="date_of_birth">@lang('translation.Date of Birth')</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
        </div>
        <div class="form-group">
            <label for="country_id">@lang('translation.Country')</label>
            <select class="form-control" id="country_id" name="country_id" required>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->general_title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="city_id">@lang('translation.City')</label>
            <select class="form-control" id="city_id" name="city_id" required>
                <option value="" disabled selected>@lang('translation.Select City')</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->general_title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="area_id">@lang('translation.Area')</label>
            <select class="form-control" id="area_id" name="area_id" required>
                <option value="" disabled selected>@lang('translation.Select Area')</option>
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->general_title }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">@lang('translation.Add User')</button>
    </form>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        // Get the initial selected country value
        var selectedCountry = $('#country_id').val();

        // Populate the cities based on the selected country
        populateCities(selectedCountry);

        // Handle the change event of the country select option
        $('#country_id').change(function () {
            var selectedCountry = $(this).val();

            // Repopulate the cities based on the selected country
            populateCities(selectedCountry);

            // Reset the area select option
            $('#area_id').html('<option value="" disabled selected>@lang('translation.Select Area')</option>');
        });

        // Handle the change event of the city select option
        $('#city_id').change(function () {
            var selectedCity = $(this).val();

            // Repopulate the areas based on the selected city
            populateAreas(selectedCity);
        });

        // Function to populate the cities based on the selected country
        function populateCities(countryId) {
            $.ajax({
                url: '{{ route('get-cities') }}',
                type: 'GET',
                data: {
                    country_id: countryId
                },
                success: function (response) {
                    var cities = response.cities;
                    var options = '';

                    // Generate the city select options
                    for (var i = 0; i < cities.length; i++) {
                        options += '<option value="' + cities[i].id + '">' + cities[i].general_title + '</option>';
                    }

                    // Update the city select options
                    $('#city_id').html('<option value="" disabled selected>@lang('translation.Select City')</option>' + options);
                }
            });
        }

        // Function to populate the areas based on the selected city
        function populateAreas(cityId) {
            $.ajax({
                url: '{{ route('get-areas') }}',
                type: 'GET',
                data: {
                    city_id: cityId
                },
                success: function (response) {
                    var areas = response.areas;
                    var options = '';

                    // Generate the area select options
                    for (var i = 0; i < areas.length; i++) {
                        options += '<option value="' + areas[i].id + '">' + areas[i].general_title + '</option>';
                    }

                    // Update the area select options
                    $('#area_id').html('<option value="" disabled selected>@lang('translation.Select Area')</option>' + options);
                }
            });
        }
    });
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>