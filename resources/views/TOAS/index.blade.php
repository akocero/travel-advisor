@extends('layouts.app')

@section('title', 'TOAs')

@section('content')


<div
class="modal fade show"
id="TOA_modal"
tabindex="-1"
role="dialog"
aria-labelledby="exampleModalLabel"
aria-hidden="true">

    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content ">

            <div class="modal-header border-bottom-0 pb-0">
                <h5 class="modal-title" id="exampleModalLabel">New Type of Attraction</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                
                <form action="{{ route('TOAS.store') }}" method="post" id="add_form" enctype="multipart/form-data">
                    <div class="row">
                        @csrf

                        <div class="form-group col-md-12">
                            <label for="image">Image (Optional)</label>
                            <input type="file" class="form-control-file @error('image') {{ 'is-invalid' }}@enderror" id="image" name="image" placeholder="Type Firstname..." value="{{ old('image') }}">

                            @error('image')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label>Name</label>

                            <input
                                type="text"
                                class="form-control @error('name') {{ 'is-invalid' }}@enderror"
                                name="name"
                                id="name"
                                value="{{ old('name') }}"
                                placeholder="Type name..."
                                required>

                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label>Details</label>

                            <input
                                type="text"
                                class="form-control @error('details') {{ 'is-invalid' }}@enderror"
                                name="details"
                                id="details"
                                value="{{ old('details') }}"
                                placeholder="Type Details..."
                                >

                            @error('details')
                                <small class="text-danger">{{ ' The program/activity/project statement is required' }}</small>
                            @enderror
                        </div>

                        <input type="hidden" id="data_id" value="0">

                    </div>
                </form>

                <form action="#" method="post" id="edit_form" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        @method('PATCH')

                        <div class="col-md-12" id="image_inputs">
                            <div class="image-container">
                                <img src="" alt="" class="img-thumbnail" id="edit_image">
                                {{-- <a class="btn-delete-image"><span>&#10005;</span></a> --}}
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="image">Image (Optional)</label>
                            <input type="file" class="form-control-file @error('image') {{ 'is-invalid' }}@enderror" id="image" name="image" placeholder="Type Firstname..." value="{{ old('image') }}">

                            @error('image')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label>Name</label>

                            <input
                                type="text"
                                class="form-control @error('name') {{ 'is-invalid' }}@enderror"
                                name="name"
                                id="edit_name"
                                value="{{ old('name') }}"
                                placeholder="Type name..."
                                required>

                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label>Details</label>

                            <input
                                type="text"
                                class="form-control @error('details') {{ 'is-invalid' }}@enderror"
                                name="details"
                                id="edit_details"
                                value="{{ old('details') }}"
                                placeholder="Type Details..."
                                required>

                            @error('details')
                                <small class="text-danger">{{ ' The program/activity/project statement is required' }}</small>
                            @enderror
                        </div>
                    </div>
                </form>

            </div>

            <div class="modal-footer pt-0 border-top-0">
                <button type="submit" id="save_button" form="add_form" class="btn btn-success">Save</button>
                <button type="submit" id="update_button" form="edit_form" class="btn btn-success">Save Changes</button>
                <button type="button" id="close_button" class="btn btn-secondary" data-dismiss="modal" style="display: none;">Close</button>
            </div>

        </div>
    </div>
</div>
{{-- modal --}}
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{  session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="card">
    <div class="col-12 pt-3 px-3 d-flex justify-content-between align-items-center">
        
        <h4 class="h4">Type of Attraction List</h4>
        <button
            type="button"
            id="open_button"
            class="btn btn-custom-success"
            data-toggle="modal"
            data-target="#TOA_modal">
                <i class="far fa-plus-square mr-2"></i>New TOA
        </button>

    </div>
    <div class="col-12">
        <hr class="pb-0 mb-0">
    </div>
    <div class="card-body">
        
            <div class="row">
                <div class="col-12">

                    <form action="{{ route('TOAS.index') }}" method="get">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="search">Search (Hit enter)</label>
                                <a style="float: right" href="{{ route('TOAS.index') }}">
                                    View all
                                </a>
                                <input type="text" class="form-control" id="search" name="search" placeholder="Enter Family Name or Details..." required value="{{ $search ? $search : '' }}">
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <label for="" class="text-dark">Results total: {{ $TOAS->total() }}</label>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-sm table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>Family Name</th>
                                <th>Details</th>
                                <th width="10%">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($TOAS as $TOA)
                                <tr>
                                    <td>{{ $TOA->name }}</td>
                                    <td>{{ $TOA->details }}</td>
                                    <td>
                                        {{-- <form action="{{ route('TOAS.destroy', $TOA->id) }}" method="post" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-light btn-sm">
                                            <i class="far fa-trash-alt" ></i>
                                        </button>
                                        </form> --}}

                                        <button type="button" onclick="editOrView('edit', {{ $TOA->id}})" class="btn btn-light btn-sm">
                                            <i class="far fa-edit" ></i>
                                        </button>
                                        <button type="button" onclick="editOrView('view',{{ $TOA->id}})" class="btn btn-light btn-sm">
                                            <i class="far fa-folder-open" ></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="10" class="text-center">No TOAS found!</td>
                            </tr>
                            @endforelse
                            {{-- {{dd($errors)}} --}}
                        </tbody>
                    </table>
                    <div class="row mt-3">
                        <div class="col-12">
                            {{ $TOAS ? $TOAS->links() : ''  }}
                        </div>
                        
                    </div>
                </div>
                
            </div>
    </div>
</div>


@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            clearFields();
            const errors = {{ $errors->count() }};
            console.log(errors);
            $(window).on('load', function() {
                if(errors > 0){
                    $('#TOA_modal').modal('show');
                }
            });
            $('#TOA_modal').on('hidden.bs.modal', function (e) {
                clearFields();
            })
            // $(window).keydown(function(event){
            //     if(event.keyCode == 13) {
            //         event.preventDefault();
            //         return false;
            //     }
            // });
        });
        function clearFields() {
            $('#data_id').val(0);
            $('#update_button').hide();
            $('#save_button').show();
            $('#close_button').hide();
            $('#add_form').show();
            $('#edit_form').hide();
        }
        const orgin = window.location.origin;
        function editOrView(action, id) {
            if(action === 'view'){
                $('#update_button').hide();
                $('#save_button').hide();
                $('#close_button').show();
                
            }else{
                $('#update_button').show();
                $('#save_button').hide();
                $('#close_button').hide();
            }
            $('#edit_form').show();
            $('#add_form').hide();
            getData(id);
        }
        function renderDataToDom(data){
            $('#edit_form #edit_name').val(data.name);
            $('#edit_form #edit_details').val(data.details);

            if(data.image){
                $('#edit_form #edit_image').attr('src','storage/' + data.image);
            }else{
                $('#edit_form #image_inputs').html('Image N/A');
            }
            
            console.log($('#edit_form').attr('action','TOAS/' + data.id ));
            $('#TOA_modal').modal('show');
            console.log(data)
        }
        const getData = async (id) => {
            await axios.get(`${orgin}/TOAS/${id}`)
                .then(function(response) {
                    renderDataToDom(response.data);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    </script>
@endsection