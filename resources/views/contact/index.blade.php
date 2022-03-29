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
    <div class="card">
        <div class="card-body">
            <h4>Send Us an Email</h4>
            <form method="post" action="{{ route('email.contactEmail') }}">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="client_email">Email</label>&nbsp;<small class="text-danger">*</small>
                        <input type="email" class="form-control @error('client_email') {{ 'is-invalid' }}@enderror"
                                id="client_email" name="client_email" placeholder="Ex.  Mt. Balagbag"
                                value="{{ old('client_email') }}" />

                            @error('client_email')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
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
                                    <input type="submit" value="Save" class="btn btn-success float-right px-5">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endsection
