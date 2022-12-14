@extends('layout')

@section('title')
    New Artist
@endsection

@section('content')
    <a href="{{ route('home') }}"><button class="btn btn-secondary btn-sm">Back</button></a>
    
    <div class="form-wrapper">
        <form method="post" class="form" action="{{ route('artists.store') }}" enctype="multipart/form-data">
            @csrf
            <h3 class="form-heading">List a new artist</h3>

            <div class="form-group @error('first_name') has-error has-feedback @enderror">
                <label>First Name</label>
                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" autofocus>
                @error('first_name')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group @error('last_name') has-error has-feedback @enderror">
                <label>Last Name</label>
                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                @error('last_name')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group @error('stage_name') has-error has-feedback @enderror">
                <label>Stage Name</label>
                <input type="text" class="form-control" name="stage_name" value="{{ old('stage_name') }}">
                @error('stage_name')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group @error('phone_number') has-error has-feedback @enderror">
                <label>Phone Number</label>
                <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}">
                @error('phone_number')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group @error('email') has-error has-feedback @enderror">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                @error('email')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group  @error('address') has-error has-feedback @enderror">
                <label>Address</label>
                <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                @error('address')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" name="image" accept="image/*">
            </div>
            <div class="form-group">
                <label>Genres</label>
                <small>Ctrl+Click to select multiple</small>
                <select name="genres[]" id="" class="form-control" multiple>
                    @foreach ($genres as $genre)
                        <option 
                            value="{{ $genre->name }}"
                            @if ($errors->any() && old('genres')) 
                                @if (in_array($genre->name, old('genres'))) 
                                    selected 
                                @endif 
                            @endif
                        >
                            {{ strtoupper($genre->name) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group  @error('facebook_link') has-error has-feedback @enderror">
                <label>Facebook Link</label>
                <input type="text" class="form-control" name="facebook_link" value="{{ old('facebook_link') }}">
                @error('facebook_link')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group  @error('instagram_link') has-error has-feedback @enderror">
                <label>Instagram Link</label>
                <input type="text" class="form-control" name="instagram_link" value="{{ old('instagram_link') }}">
                @error('instagram_link')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div form-group>
                <label>Available</label>
                <input type="checkbox" name="available" 
                    @if ($errors->any())
                        @if (old('available') && old('available') == 'on') 
                            checked 
                        @endif
                    @endif
                >
            </div>
            <div class="form-group"><input type="submit" class="btn btn-primary btn-lg btn-block" value="Create Artist">
            </div>
        </form>
    </div>
@endsection
