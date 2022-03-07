@extends('layouts.app')

{{-- @section('title', 'Places') --}}

@section('content')
<div class="card">
    <div class="col-12 pt-3 px-3 d-flex justify-content-between align-items-center">
        <h4 class="h4">Places</h4>
        {{-- <button type="button" class="btn btn-secondary btn-flat" data-toggle="modal" data-target="#exampleModal">
                Create Data
        </button> --}}
        <a href="{{ route('places.create') }}" class="btn btn-custom-success"><i class="far fa-plus-square mr-2"></i></i>New Place</a>
    </div>
    <div class="col-12">
        <hr class="pb-0 mb-0">
    </div>
    
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('places.index') }}" method="get">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="search">Search (Hit enter)</label><a style="float: right" href="{{ route('places.index') }}">View all</a>
                            <input type="text" class="form-control" id="search" name="search" placeholder="Enter Fistname or Lastname..." required value="{{ $search ? $search : '' }}">
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label for="" class="text-dark">Results total: {{ $places->total() }}</label>
            </div>
        </div>
        <div class="table-responsive">   
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th width="10%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($places as $place)
                        <tr>
                            <td>
                                {{ $place->name }}
                            </td>
                            <td>{{ $place->type }}</td>
                            <td>
                                <a class="btn btn-sm btn-dafault" href="{{ route('places.edit', $place->id) }}" data-toggle="tooltip" data-placement="bottom" title="Edit Info.">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a class="btn btn-sm btn-dafault" href="{{ route('places.show', $place->id) }}" data-toggle="tooltip" data-placement="bottom" title="View Info.">
                                    <i class="far fa-folder-open"></i>
                                </a>
                                {{-- <button class="btn btn-sm btn-regular">
                                    <i class="far fa-trash-alt"></i>
                                </button> --}}
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="10">No Places Found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="row mt-3">
            <div class="col-12">
                {{ $places ? $places->links() : ''  }}
            </div>
            
        </div>
        
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            console.log("ready!");
        });
    </script>
@endsection

