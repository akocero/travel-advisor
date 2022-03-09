@extends('layouts.app')

@section("title","Place")

@section('content')
    @if (session('status'))
        <div class="alert alert-{{ str_contains(session('status'), 'Updated') ? 'primary' : 'success' }} alert-dismissible fade show" role="alert">

            {{  session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="col-12 pt-3 px-4 d-flex justify-content-between align-items-center">
            <h4 class="h4">{{Str::ucfirst($place->name)}}</h4>
            <a style="float: right" href="{{ route('places.index') }}" class="btn btn-light">
                Places
                <i class="far fa-arrow-alt-circle-left ml-2 icon-view-all"></i>
            </a>
        </div>
        <hr>

        <div class="card-body">
            <form action="#" method="POST" id="place_form">
                
                    {{-- Personal info tab  --}}
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Place Image</h4>
                            <p>Add your place image to personalize your place info. This image can also be used as thumbnail to attract your visitor</p>
                        </div>
                        @if ($place->image)
                            <div class="col-md-4">
                                <div class="image-container">
                                    <img src="{{ asset('storage/' . $place->image) }}" alt="" class="img-thumbnail">
                                    {{-- <a class="btn-delete-image"><span>&#10005;</span></a> --}}
                                </div>
                            </div>
                        @else
                            <div class="col-md-4">
                                <h5>Image N/A!</h5>
                            </div>
                        @endif
                    </div>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="first_name">Name</label>&nbsp;<small class="text-danger">*</small>
                            <input type="text" class="form-control @error('first_name') {{ 'is-invalid' }}@enderror" id="first_name" name="first_name" placeholder="Type Firstname..." value="{{ $place->name  }}" disabled>

                            @error('first_name')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="lat">Latitude</label>&nbsp;<small class="text-danger">*</small>
                            <input type="number" class="form-control @error('lat') {{ 'is-invalid' }}@enderror" id="lat" name="lat" placeholder="Type Lastname..." value="{{ $place->lat  }}" disabled>

                            @error('lat')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="lng">Longtitude</label>&nbsp;<small class="text-danger">*</small>
                            <input type="number" class="form-control @error('lng') {{ 'is-invalid' }}@enderror" id="lng" name="lng" placeholder="Type Lastname..." value="{{ $place->lng  }}" disabled>

                            @error('lng')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="type">Type</label>

                            <select class="custom-select  @error('type') {{ 'is-invalid' }}@enderror"
                                    name="type" id="type" disabled>
                                <option value="">Choose ...</option>
                                <option value="attraction" {{ $place->type == 'attraction' ? 'selected' : ''}}>Attraction</option>
                                <option value="city" {{ $place->type == 'city' ? 'selected' : ''}}>City</option>
                            </select>

                            @error('type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="type_of_attraction">Type of Attraction</label>

                            <select class="custom-select  @error('type_of_attraction') {{ 'is-invalid' }}@enderror"
                                    name="type_of_attraction" id="type_of_attraction" disabled>
                                <option value="">Choose ...</option>
                                <option value="swimming" {{ $place->type_of_attraction == 'swimming' ? 'selected' : ''}}>Swimming</option>
                                <option value="hiking" {{ $place->type_of_attraction == 'hiking' ? 'selected' : ''}}>Hiking</option>
                            </select>

                            @error('type_of_attraction')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-3" id="attraction_inputs">
                            <label for="city_of">City of</label>

                            <select class="custom-select  @error('city_of') {{ 'is-invalid' }}@enderror"
                                    name="city_of" disabled>
                                <option value="">Choose ...</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                                {{ $place->city_of == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                            </select>

                            @error('city_of')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    {{-- End Personal info tab  --}}

            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
