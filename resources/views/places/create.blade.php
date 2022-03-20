@extends('layouts.app')


@section("title","Place")

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
        <hr>
        
        <div class="card-body">
            <form action="{{ route('places.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Place Image</h5>
                                <p>Add your place image to
											personalize your place info.
											This image can also be used as thumbnail to attract your visitor.</p>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="image">Image (Optional)</label>
                                <input type="file" class="form-control-file @error('image') {{ 'is-invalid' }}@enderror" id="image" name="image" placeholder="Type Firstname..." value="{{ old('image') }}">

                                @error('image')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="name">Name</label>&nbsp;<small class="text-danger">*</small>
                                <input type="text" class="form-control @error('name') {{ 'is-invalid' }}@enderror" id="name" name="name" placeholder="Ex.  Mt. Balagbag" value="{{ old('name') }}">

                                @error('name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-2">
                                <label for="lng">Longtitude</label>&nbsp;<small class="text-danger">*</small>
                                <input type="number" class="form-control @error('lng') {{ 'is-invalid' }}@enderror" id="lng" name="lng" placeholder="Ex. 12.12" value="{{ old('lng') }}" step="any">

                                @error('lng')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-2">
                                <label for="lat">Latitude</label>&nbsp;<small class="text-danger">*</small>
                                <input type="number" class="form-control @error('lat') {{ 'is-invalid' }}@enderror" id="lat" name="lat" placeholder="Ex. 14.12" value="{{ old('lat') }}" step="any">

                                @error('lat')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="type">Type</label>

                                <select class="custom-select  @error('type') {{ 'is-invalid' }}@enderror"
                                        name="type" id="type" onchange="showOrHideAttractionInputs()">
                                    <option value="">Choose ...</option>
                                    <option value="attraction" {{ old('type') == 'attraction' ? 'selected' : ''}}>Attraction</option>
                                    <option value="city" {{ old('type') == 'city' ? 'selected' : ''}}>City</option>
                                </select>

                                @error('type')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- <div class="form-group col-md-4" id="attraction_inputs" style="display: none;">
                                <label for="type_of_attraction">Type of Attraction</label>

                                <select class="custom-select  @error('type_of_attraction') {{ 'is-invalid' }}@enderror"
                                        name="type_of_attraction">
                                    <option value="">Choose ...</option>
                                        @foreach ($toas as $toa)
                                            <option value="{{ $toa->id }}"
                                                    {{ old('toa_id') == $toa->id ? 'selected' : '' }}>
                                                {{ $toa->name }}
                                            </option>
                                        @endforeach
                                </select>

                                @error('type_of_attraction')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div> --}}

                            {{-- <div class="form-group col-md-2" id="attraction_inputs" style="display: none;">
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
                            </div> --}}
                            
                            
                            <div class="form-group col-md-8">
                                <label for="details">Description</label>
                                <textarea type="text" class="form-control @error('details') {{ 'is-invalid' }}@enderror" id="rich_text_details" name="details" placeholder="Ex. " value="" >{{ old('details') }}</textarea>

                                @error('details')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-4" id="attraction_inputs" style="display: none;">
                                <label for="city_id">City of</label>

                                <select class="custom-select  @error('city_id') {{ 'is-invalid' }}@enderror"
                                        name="city_id">
                                    <option value="">Choose ...</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}"
                                                    {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                </select>

                                @error('city_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            

                            <div class="col-md-12" id="attraction_inputs" style="display: none;">
                                <label for="">Type of Attractions</label>
                                <div class="row">   
                                    @foreach ($toas as $toa)
                                        <div class="form-check col-md-1 ml-3">
                                            <input class="form-check-input" type="checkbox" value="{{ $toa->id }}" id="defaultCheck1" name="type_of_attractions[]" {{ (is_array(old('type_of_attractions')) && in_array($toa->id, old('type_of_attractions'))) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="defaultCheck1">
                                                {{$toa->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                @error('type_of_attractions')
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
   
    ClassicEditor
        .create( document.querySelector( '#rich_text_details' ) )
        .catch( error => {
            console.error( error );
        } );

    $(document).ready(function() {
        // alert('nyaw');

    });
    showOrHideAttractionInputs();
    function showOrHideAttractionInputs()  {
        var x = document.getElementById("type").value;
        var attraction_input = document.querySelectorAll("#attraction_inputs");
        if(x === 'attraction') {
            attraction_input.forEach(element => {
                element.style.display = 'block';
            });
            
        }else{
            attraction_input.forEach(element => {
                element.style.display = 'none';
            });
        }
        // document.getElementById("demo").innerHTML = "You selected: " + x;
    }
</script>
@endsection
