@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="mb-2 row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        @if ($ratings->count() == 0)
                                            <h3>
                                                Total Rating: <span class="text-bold">0</span>
                                            </h3>
                                        @else
                                            <h3>
                                                Total Rating: <span
                                                    class="text-bold">{{number_format( $ratings->sum('rating') / $ratings->count(), 2) }}</span>
                                            </h3>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>
                                            Ratings: <span class="text-bold">{{ $ratings->count() }}</span>
                                        </h3>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>
                                            Users: <span class="text-bold">{{ $users->count() }}</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="table-responsive">
                            <table class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">User Email</th>
                                        <th scope="col">Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($ratings as $rating)
                                        <tr>
                                            <td>
                                                {{ $rating->user->email }}
                                            </td>
                                            <td>{{ $rating->rating }}</td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="10">No Rating Found!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
