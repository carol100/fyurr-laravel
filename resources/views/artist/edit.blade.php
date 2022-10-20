@extends('layout')

@section('title')
    Edit Artist
@endsection

@section('content')
    <div class="form-wrapper">
        <form method="post" class="form" action="{{ route('artists.update', $artist->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <h3 class="form-heading">Edit artist {{ "$artist->first_name $artist->last_name" }}</h3>

            <div class="form-group @error('first_name') has-error has-feedback @enderror">
                <label>First Name</label>
                <input type="text" class="form-control" name="first_name"
                    @if ($errors->any()) value="{{ old('first_name') }}" @else value="{{ $artist->first_name }}" @endif
                    autofocus
                >
                @error('first_name')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group @error('last_name') has-error has-feedback @enderror">
                <label>Last Name</label>
                <input type="text" class="form-control" name="last_name"
                    @if ($errors->any()) value="{{ old('last_name') }}" @else value="{{ $artist->last_name }}" @endif>
                @error('last_name')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group @error('stage_name') has-error has-feedback @enderror">
                <label>Stage Name</label>
                <input type="text" class="form-control" name="stage_name"
                    @if ($errors->any()) value="{{ old('stage_name') }}" @else value="{{ $artist->stage_name }}" @endif>
                @error('stage_name')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group @error('phone_number') has-error has-feedback @enderror">
                <label>Phone Number</label>
                <input type="text" class="form-control" name="phone_number"
                    @if ($errors->any()) value="{{ old('phone_number') }}" @else value="{{ $artist->phone_number }}" @endif>
                @error('phone_number')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group @error('email') has-error has-feedback @enderror">
                <label>Email</label>
                <input type="email" class="form-control" name="email"
                    @if ($errors->any()) value="{{ old('email') }}" @else value="{{ $artist->email }}" @endif>
                @error('email')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group  @error('address') has-error has-feedback @enderror">
                <label>Address</label>
                <input type="text" class="form-control" name="address"
                    @if ($errors->any()) value="{{ old('address') }}" @else value="{{ $artist->address }}" @endif>
                @error('address')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Image</label>
                <a href="{{ asset('storage/' . $artist->image) }}" target="_blank">Current image</a>
                <input type="file" class="form-control" name="image" accept="image/*">
            </div>

            <div class="form-group">
                <label>Genres</label>
                <small>Ctrl+Click to select multiple</small>
                <select name="genres[]" id="" class="form-control" multiple>
                    @foreach ($genres as $genre)
                        <option 
                            value="{{ $genre->name }}"
                            @if ($errors->any()) 
                                @if (in_array($genre->name, old('genres'))) 
                                    selected 
                                @endif 
                            @else
                                @if (in_array($genre->name, $artist->genres)) 
                                    selected
                                @endif 
                            @endif
                        >
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group  @error('facebook_link') has-error has-feedback @enderror">
                <label>Facebook Link</label>
                <input type="text" class="form-control" name="facebook_link"
                    @if ($errors->any()) value="{{ old('facebook_link') }}" @else value="{{ $artist->facebook_link }}" @endif>
                @error('facebook_link')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group  @error('instagram_link') has-error has-feedback @enderror">
                <label>Instagram Link</label>
                <input type="text" class="form-control" name="instagram_link"
                    @if ($errors->any()) value="{{ old('instagram_link') }}" @else value="{{ $artist->instagram_link }}" @endif>
                @error('instagram_link')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>

            <div form-group>
                <label>Available</label>
                <input type="checkbox" name="available"
                    @if ($errors->any()) 
                        @if (old('available') == 'on') 
                            checked 
                        @endif 
                    @else
                        @if ($artist->available) 
                            checked 
                        @endif 
                    @endif>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Edit Artist">
            </div>
        </form>
    </div>
@endsection
