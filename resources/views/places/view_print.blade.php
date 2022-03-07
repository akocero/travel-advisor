@extends('layouts.main')


@section("title","Resident Details")

@section('content')
    <div class="card">
        <div class="col-12 pt-3 px-3">
            <h4 class="h4">Welcome !</h4>
            <hr class="pb-0 mb-0">
        </div>
            
        <div class="card-body">
            <div class="table-responsive">   
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($residents as $resident)
                            <tr>
                                <td>
                                    {{ $resident->last_name }}, {{ $resident->first_name }}  {{ $resident->middle_name }}  {{ $resident->suffix }}
                                </td>
                                <td>{{ $resident->email }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No Resident Found!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
