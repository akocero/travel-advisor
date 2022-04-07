@extends('layouts.app')

@section('content')
    {{-- @foreach ($attractions as $a)
        <div>{{ $a->name }}</div>
    @endforeach --}}
    <div class="container">
        <div class="row">
            <div class="col-md-7 mb-4">

                <img src="{{ asset('storage/' . $place->image) }}" alt="" width="100%">
                {{-- <div class="container text-center">
                    <h1 class="display-4"> {{ $place->name }}</h1>
                </div> --}}
            </div>
            <div class="col-md-5">
                <h2>{{ $place->name }}</h2>
                <p> {!! $place->details !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-img-top" id="googleMap"></div>
                    <div class="card-body">
                        <div id="output">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-12">
                <h2>Reviews</h2>
            </div>
            <div class="col-12">
                @guest

                @else
                    <form action="{{ route('reviews.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="place_id" value="{{ $place->id }}">
                        <div class="form-group">

                            <input type="text" class="form-control @error('body') {{ 'is-invalid' }}@enderror" id="body"
                                    name="body" placeholder="Ex.  Mt. Balagbag" value="{{ old('body') }}">

                                @error('body')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Comment</button>


                        </form>
                    @endguest
                </div>
                <div class="col-12">
                    <hr>
                </div>
                <div class="col-12">
                    @foreach ($place->reviews as $item)
                        <h5><strong class="text-primary">{{ $item->user->name }}</strong><small
                                class="text-secondary">&nbsp;{{ $item->created_at }}</small></h5>
                        {{-- <p> </p> --}}
                        <p> {{ $item->body }}</p>
                    @endforeach
                </div>

            </div>
        </div>
    @endsection
@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCm7-oZ1_p9snCUz0VP62ZCXZ-fH8WlewY&libraries=places">
    </script>
    <script>
        const lat = {!! $place->lat !!};
        const lng = {!! $place->lng !!};
        const destination = `${lat}, ${lng}`;
        const place = {!! $place !!};

        // console.log(destination);
        //javascript.js
        //set map options
        var myLatLng = {
            lat: 38.346,
            lng: -0.4907
        };
        var mapOptions = {
            center: myLatLng,
            zoom: 7,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        };



        //create map
        var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

        //create a DirectionsService object to use the route method and get a result for our request
        var directionsService = new google.maps.DirectionsService();

        //create a DirectionsRenderer object which we will use to display the route
        var directionsDisplay = new google.maps.DirectionsRenderer();

        //bind the DirectionsRenderer to the map
        directionsDisplay.setMap(map);

        //define calcRoute function
        function calcRoute() {
            //create request
            var request = {
                origin: localStorage.getItem('current_loc'),
                destination: destination,
                travelMode: google.maps.TravelMode["DRIVING"], //WALKING, BYCYCLING, TRANSIT
                unitSystem: google.maps.UnitSystem.IMPERIAL,
            };

            //pass the request to the route method
            directionsService.route(request, function(result, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    //Get distance and time
                    const output = document.querySelector("#output");
                    // output.innerHTML =
                    //     "<div class='alert-info'>From: " +
                    //     localStorage.getItem('current_loc') +
                    //     ".<br />To: " +
                    //     destination_name +
                    //     ".<br /> Driving distance <i class='fas fa-road'></i> : " +
                    //     result.routes[0].legs[0].distance.text +
                    //     ".<br />Duration <i class='fas fa-hourglass-start'></i> : " +
                    //     result.routes[0].legs[0].duration.text +
                    //     ".</div>";

                    output.innerHTML =
                        `
                                                                                                                                                                                                                                                        <p>From: ${localStorage.getItem('current_loc')}</p>
                                                                                                                                                                                                                                                        <p>To: ${place.name}</p>
                                                                                                                                                                                                                                                        <p>Driving distance: ${result.routes[0].legs[0].distance.text}</p>
                                                                                                                                                                                                                                                        <p>Duration: ${result.routes[0].legs[0].duration.text}</p>
                                                                                                                                                                                                                                                    `
                    console.log(result);
                    //display route
                    directionsDisplay.setDirections(result);
                } else {
                    //delete route from map
                    directionsDisplay.setDirections({
                        routes: []
                    });
                    //center map in London
                    map.setCenter(myLatLng);

                    //show error message
                    output.innerHTML =
                        "<div class='alert-danger'><i class='fas fa-exclamation-triangle'></i> Could not retrieve driving distance.</div>";
                }
            });
        }

        if (localStorage.getItem('current_loc') && destination) {
            calcRoute();
        }

        //create autocomplete objects for all inputs
        // var options = {
        //     types: ["(cities)"],
        // };

        // var input1 = document.getElementById("from");
        // var autocomplete1 = new google.maps.places.Autocomplete(input1);

        // var input2 = document.getElementById("to");
        // var autocomplete2 = new google.maps.places.Autocomplete(input2);

    </script>
@endsection
