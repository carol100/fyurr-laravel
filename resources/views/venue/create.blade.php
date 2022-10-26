@extends('/layout')
@section('title')
    Fyurr | New Venue
@endsection

@section('content')
    <div class="form-wrapper">
        <form class="form" action="{{ route('venues.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <a href="{{ route('venues.index') }}"><button class="btn btn-secondary btn-sm">Back</button></a>

            <h3 class="form-heading">List new Venue</h3>

            <div class="form-group @error('name') has-error has-feedback @enderror">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>
                @error('name')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-3 col-form-label">Description</label>
                <textarea name="description" class="form-control" id="description">
                        {{ old('description') }}
                    </textarea>
            </div>

            <div class="form-group @error('location') has-error has-feedback @enderror">
                <label for="location" class="col-sm-3 col-form-label">Location</label>
                <input type="text" class="form-control" name="location" value="{{ old('location') }}">
                @error('location')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group @error('address') has-error has-feedback @enderror">
                <label for="address" class="col-sm-3 col-form-label">Address</label>
                <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                @error('address')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group @error('contact_person_name') has-error has-feedback @enderror">
                <label for="contact_person_name" class="col-sm-3 col-form-label">Contact Person</label>
                <input type="text" class="form-control" name="contact_person_name"
                    value="{{ old('contact_person_name') }}">
                @error('contact_person_name')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group @error('phone_number') has-error has-feedback @enderror">
                <label for="phone_number" class="col-sm-3 col-form-label">Phone Number </label>
                <input type="tel" class="form-control" name="phone_number" maxlength="12" placeholder='xxx-xxx-xxxx'
                    value="{{ old('phone_number') }}">
                @error('phone_number')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group @error('email') has-error has-feedback @enderror">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
                @error('email')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group @error('image') has-error has-feedback @enderror">
                <label for="image" class="col-sm-3 col-form-label">Image</label>
                <input type="file" class="form-control custom-file-input" name="image" id="image">
                @error('image')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group @error('facebook_link') has-error has-feedback @enderror">
                <label for="facebook_link" class="col-sm-3 col-form-label">Facebook Link </label>
                <input type="text" class="form-control" name="facebook_link" value="{{ old('facebook_link') }}">
                @error('facebook_link')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group @error('instagram_link') has-error has-feedback @enderror">
                <label for="instagram_link" class="col-sm-3 col-form-label">Instagram Link </label>
                <input type="text" class="form-control" name="instagram_link" value="{{ old('instagram_link') }}">
                @error('instagram_link')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div form-group>
                <label>Available</label>
                {{-- <input type="checkbox" name="available"> --}}
                <input type="checkbox" name="available" class="switch-input" value="1"
                    {{ old('available') ? 'checked="checked"' : '' }} />
            </div>


            //General error messages block
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Create Venue</button>
            </div>
        </form>
    </div>
@endsection
