@extends('layouts.app')

@section('content')
    {{-- @foreach ($attractions as $a)
        <div>{{ $a->name }}</div>
    @endforeach --}}
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4 font-weight-bold text-uppercase">{{ $type_of_attraction->name }}</h1>
            <p class="lead">{{ $type_of_attraction->details }}</p>
        </div>
    </div>
    <div class="attractions_container row"></div>
@endsection
@section('scripts')
    <script>
        const attractions = {!! $attractions !!};
        const type_id = {!! $id !!};

        const bool = attractions.filter((item) => {
            return item.type_of_attractions.includes(type_id.toString());
        });

        const renderAttractions = (attrs) => {
            const attractions_container = document.querySelector('.attractions_container');
            let output = '';
            attrs.forEach(item => {
                output += ` 
                                                    
                                                        <div class="col-md-4 mb-4"> 
                                                            <a href="/attractions/${item.id}">
                                                                <div class="toa-card">
                                                                    <img src="/storage/${item.image}" alt="">
                                                                    <h3 class="toa-title">${item.name}</h3>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    `
            });
            // console.log(output)
            attractions_container.innerHTML = output;
        }

        renderAttractions(bool);

        // console.log(id)

    </script>
@endsection
