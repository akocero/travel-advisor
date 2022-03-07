@extends('layouts.app')


@section("title","Places")

@section('content')
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            
            Please check all inputs and tabs! <br />
            All the fields with ( * ) is required
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="col-12 pt-3 px-4 d-flex justify-content-between align-items-center">
            <h4 class="h4">New Place</h4>
            <a style="float: right" href="{{ route('places.index') }}" class="btn btn-light">
                Place List
                <i class="far fa-arrow-alt-circle-left ml-2 icon-view-all"></i>
            </a>
        </div>
        
        <div class="card-body">
            <form action="{{ route('places.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                        <div class="row">

                            

                            <div class="form-group col-md-4">
                                <label for="name">Name</label>&nbsp;<small class="text-danger">*</small>
                                <input type="text" class="form-control @error('name') {{ 'is-invalid' }}@enderror" id="name" name="name" placeholder="Ex.  Mt. Balagbag" value="{{ old('name') }}">

                                @error('name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="lng">Longtitude</label>&nbsp;<small class="text-danger">*</small>
                                <input type="number" class="form-control @error('lng') {{ 'is-invalid' }}@enderror" id="lng" name="lng" placeholder="Ex. 12.12" value="{{ old('lng') }}">

                                @error('lng')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="lat">Latitude</label>&nbsp;<small class="text-danger">*</small>
                                <input type="number" class="form-control @error('lat') {{ 'is-invalid' }}@enderror" id="lat" name="lat" placeholder="Ex. 14.12" value="{{ old('lat') }}">

                                @error('lat')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-2">
                                <label for="type">Type</label>

                                <select class="custom-select  @error('type') {{ 'is-invalid' }}@enderror"
                                        name="type" id="type" onchange="showOrHideCities()">
                                    <option value="">Choose ...</option>
                                    <option value="attraction" {{ old('type') == 'attraction' ? 'selected' : ''}}>Attraction</option>
                                    <option value="city" {{ old('type') == 'city' ? 'selected' : ''}}>City</option>
                                </select>

                                @error('type')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-4" id="attraction_inputs" style="display: none;">
                                <label for="city_of">City of</label>

                                <select class="custom-select  @error('city_of') {{ 'is-invalid' }}@enderror"
                                        name="city_of">
                                    <option value="">Choose ...</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}"
                                                    {{ old('city_of') == $city->id ? 'selected' : '' }}>
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                </select>

                                @error('city_of')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-2" id="attraction_inputs" style="display: none;">
                                <label for="type_of_attraction">Type of Attraction</label>

                                <select class="custom-select  @error('type_of_attraction') {{ 'is-invalid' }}@enderror"
                                        name="type_of_attraction" id="type_of_attraction">
                                    <option value="">Choose ...</option>
                                    <option value="swimming" {{ old('type_of_attraction') == 'swimming' ? 'selected' : ''}}>Swimming</option>
                                    <option value="hiking" {{ old('type_of_attraction') == 'hiking' ? 'selected' : ''}}>Hiking</option>
                                </select>

                                @error('type_of_attraction')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                        </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" value="Save" class="btn btn-success float-right px-5"> 
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    showOrHideCities();
    function showOrHideCities()  {
        var x = document.getElementById("type").value;
        var city_input = document.querySelectorAll("#attraction_inputs");
        if(x === 'attraction') {
            city_input.forEach(element => {
                element.style.display = 'block';
            });
            
        }else{
            city_input.forEach(element => {
                element.style.display = 'none';
            });
        }
        // document.getElementById("demo").innerHTML = "You selected: " + x;
    }
</script>
@endsection
