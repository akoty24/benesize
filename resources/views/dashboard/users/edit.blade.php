@extends('layouts.master')
@section('title')
    @lang('translation.Edit User')
@endsection
@section('content')
    <div class="container">
        <h2>@lang('translation.Edit User')</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">@lang('translation.Name')</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="phone">@lang('translation.Phone')</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
            </div>
            <div class="form-group">
                <label for="email">@lang('translation.Email')</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="address">@lang('translation.Address')</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" required>
            </div>
            <div class="form-group">
                <label for="lat">@lang('translation.Latitude')</label>
                <input type="text" class="form-control" id="lat" name="lat" value="{{ $user->lat }}" required>
            </div>
            <div class="form-group">
                <label for="lang">@lang('translation.Longitude')</label>
                <input type="text" class="form-control" id="lang" name="lang" value="{{ $user->lang }}" required>
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
                <input type="text" class="form-control" id="activation_code" name="activation_code" value="{{ $user->activation_code }}" required>
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
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $user->date_of_birth }}" required>
            </div>
            <div class="form-group">
                <label for="country_id">@lang('translation.Country')</label>
                <select class="form-control" id="country_id" name="country_id" required>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $country->id == $user->country_id ? 'selected' : '' }}>
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="city_id">@lang('translation.City')</label>
                <select class="form-control" id="city_id" name="city_id" required>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ $city->id == $user->city_id ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="area_id">@lang('translation.Area')</label>
                <select class="form-control" id="area_id" name="area_id" required>
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}" {{ $area->id == $user->area_id ? 'selected' : '' }}>
                            {{ $area->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">@lang('translation.Update User')</button>
        </form>
    </div>
@endsection
