@extends('layout')
@section('title')
    Edit Venue
@endsection

@section('content')
    <div class="form-wrapper">
        <form class="form" action="{{ route('venues.update', ['venue' => $venue->id]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h3 class="form-heading">List new Venue</h3>

            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" value="{{ $venue->name }}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                    <textarea name="description" class="form-control" id="description">
                        {{ $venue->description }}
                    </textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="location" class="col-sm-3 col-form-label">Location</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="location" value="{{ $venue->location }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="address" value="{{ $venue->address }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="contact_person_name" class="col-sm-3 col-form-label">Contact Person</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="contact_person_name"
                        value="{{ $venue->contact_person_name }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="phone_number" class="col-sm-3 col-form-label">Phone Number </label>
                <div class="col-sm-9">
                    <input type="tel" class="form-control" name="phone_number" maxlength="12" placeholder='xxx-xxx-xxxx'
                        value="{{ $venue->phone_number }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="email" id="email" value="{{ $venue->email }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-sm-3 col-form-label">Image</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control custom-file-input" name="image" id="image">
                    <p>Current image: <a href="{{ $venue->image }}" target="_blank">Open</a></p>
                </div>
            </div>
            <div class="form-group row">
                <label for="facebook_link" class="col-sm-3 col-form-label">Facebook Link </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="facebook_link" value="{{ $venue->facebook_link }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="instagram_link" class="col-sm-3 col-form-label">Instagram Link </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="instagram_link" value="{{ $venue->instagram_link }}">
                </div>
            </div>
            <div form-group>
                <label>Available</label>
                {{-- <input type="checkbox" name="available"> --}}
                <input type="checkbox" name="available" class="switch-input" value="1"
                    {{ $venue->available ? 'checked="checked"' : '' }} />
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group row">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Update Venue</button>
            </div>
        </form>
    </div>
@endsection
