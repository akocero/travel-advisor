@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-{{ str_contains(session('status'), 'Updated') ? 'primary' : 'success' }} alert-dismissible fade show"
            role="alert">

            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <section class="showcase">
        <video src="{{ asset('storage/images/main-video.mp4') }}" muted loop autoplay></video>
        <div class="overlay"></div>

        <div class="text container">
            <h2>BulacanTour</h2>
            <h3>Exploring The Bulacan Tourist Spots!</h3>
            <p>Here is your complete travel guide to the off-beaten and famous tourist spots in Bulacan Province!<br>find
                out why it is one
                of the best places to visit and know what it's known for.<br><br>It's more fun in Bulcan Province indeed!
                Without furhter ado, here are the Bulcan tourist attractions you should not miss.</p>
            <a href="#">Explore!</a>
        </div>
    </section>




    <div class="container margin-top-full">
        <div class="card">
            <div class="card-body">
                <form class="set-location" id="form_set_location">
                    <h5>Set Your Current Location</h5>

                    <div class="form-group">
                        <label for="inputPassword2" class="sr-only">Location</label>
                        <input type="text" class="form-control" id="input_current_location" placeholder="Type your location"
                            required>
                    </div>
                    <button type="submit" class="btn btn-custom-success mb-2" id="btn_set_location">Confirm
                        Location</button>
                    <button type="button" class="btn btn-custom-primary mb-2" id="btn_change_location">Change
                        Location</button>
                </form>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-12 mb-3">
                <h2>
                    Province / Gallery
                </h2>
            </div>
            {{-- <div class="row">
           
                <div>{{ $item->name }}</div>
            
        </div> --}}
            @foreach ($places as $item)

                <div class="col-md-6 mb-3">
                    <a href="" aria-disabled="true" id="btn_open_toa" onclick="openModal(event)">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('storage/' . $item->image) }}" alt="Card image cap"
                                style="max-height: 15rem; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $item->name }}
                                </h5>
                                {{-- <p class="card-text">{{$item->details}}.</p> --}}
                                {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="card">
            <div class="card-body">
                <h4>Send Us an Email</h4>
                <form method="post" action="{{ route('email.contactEmail') }}">
                    @csrf
                    <div class="row">
                        {{-- <div class="form-group col-md-6">
                            <label for="client_email">Email</label>&nbsp;<small class="text-danger">*</small>
                            <input type="email" class="form-control @error('client_email') {{ 'is-invalid' }}@enderror"
                                    id="client_email" name="client_email" placeholder="Ex.  Mt. Balagbag"
                                    value="{{ old('client_email') }}" />

                                @error('client_email')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div> --}}
                        <div class="form-group col-md-12">
                            <label for="name">Name</label>&nbsp;<small class="text-danger">*</small>
                            <input type="text" class="form-control @error('name') {{ 'is-invalid' }}@enderror" id="name"
                                    name="name" placeholder="Ex.  Mt. Balagbag" value="{{ old('name') }}" />

                                @error('name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="message">Message</label>
                                <textarea type="text" class="form-control @error('message') {{ 'is-invalid' }}@enderror"
                                        name="message" placeholder="Ex. " value="">{{ old('message') }}</textarea>

                                    @error('message')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" value="Send" class="btn btn-custom-success float-right px-5">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @guest

            @else
                @if (!Auth::user()->rating)
                    <div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Please Rate Us!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="rating-container">
                                        <form action="{{ route('rating.store') }}" method="POST">
                                            @csrf
                                            {{-- <input type="hidden" name="rating" value="0">
                            <button type="submit">1</button> --}}
                                            <div class="div-rating">
                                                <i class="fas fa-star rating-icon" aria-hidden="true"></i>
                                                <input type="submit" value="1" name="rating" class="btn-rating star">
                                            </div>
                                            <div class="div-rating">
                                                <i class="fas fa-star rating-icon" aria-hidden="true"></i>
                                                <input type="submit" value="2" name="rating" class="btn-rating star">
                                            </div>
                                            <div class="div-rating">
                                                <i class="fas fa-star rating-icon" aria-hidden="true"></i>
                                                <input type="submit" value="3" name="rating" class="btn-rating star">
                                            </div>
                                            <div class="div-rating">
                                                <i class="fas fa-star rating-icon" aria-hidden="true"></i>
                                                <input type="submit" value="4" name="rating" class="btn-rating star">
                                            </div>
                                            <div class="div-rating">
                                                <i class="fas fa-star rating-icon" aria-hidden="true"></i>
                                                <input type="submit" value="5" name="rating" class="btn-rating star">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


            @endguest

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Type of Attractions</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                @foreach ($type_of_attractions as $toa)
                                    <div class="col-md-4 mb-4">
                                        <a href="{{ 'toa/' . $toa->id }}">
                                            <div class="toa-card">
                                                <img src="{{ asset('storage/' . $toa->image) }}" alt="">
                                                {{-- {{ $toa->name}} --}}
                                                <h3 class="toa-title">{{ $toa->name }}</h3>
                                            </div>
                                        </a>

                                    </div>
                                @endforeach
                            </div>

                        </div>
                        {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
                    </div>
                </div>
            </div>


        @endsection
        @section('scripts')
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCm7-oZ1_p9snCUz0VP62ZCXZ-fH8WlewY&libraries=places">
            </script>
            <script>
                $(document).ready(function() {
                    $('#ratingModal').modal('show')
                });
                const openModal = (event) => {
                    event.preventDefault()
                    console.log('clicked')
                    if (checkIftheLocationIsSet()) {
                        $('#exampleModal').modal('show')
                    } else {
                        alert('Warning!: Please set your location first')
                    }
                }
                var options = {
                    types: ["(cities)"],
                };
                var btn_open_toa = document.getElementById("btn_open_toa");
                var btn_set_location = document.getElementById("btn_set_location");
                var btn_change_location = document.getElementById("btn_change_location");
                var input_current_location = document.getElementById("input_current_location");
                var autocomplete1 = new google.maps.places.Autocomplete(input_current_location, options);
                const form = document.getElementById('form_set_location');

                form.addEventListener('submit', function(event) {
                    event.preventDefault()
                    localStorage.setItem('current_loc', input_current_location.value);
                    alert('Success!: Location is Set')
                    checkIftheLocationIsSet();
                });


                btn_change_location.addEventListener('click', function() {
                    localStorage.removeItem('current_loc');
                    checkIftheLocationIsSet();
                })


                const checkIftheLocationIsSet = () => {
                    if (localStorage.getItem('current_loc')) {
                        input_current_location.disabled = true;
                        input_current_location.value = localStorage.getItem('current_loc');
                        btn_set_location.style.display = 'none';
                        btn_change_location.style.display = 'unset';
                        return true
                        // btn_set_location.style.display = 'unset';
                    } else {
                        input_current_location.disabled = false;
                        // input_current_location.value = localStorage.getItem('current_loc');
                        btn_set_location.style.display = 'unset';
                        btn_change_location.style.display = 'none';
                        return false
                    }
                }

                checkIftheLocationIsSet();

            </script>
        @endsection
