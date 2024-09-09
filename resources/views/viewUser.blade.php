@extends('layout.master')
@section('content')
    <h1>
        View User
    </h1>


    <div class="card">
        <div class="card-body">
            <ul>
                <li> Name : {{ $user->name }}</li>
                <li> Phone : {{ $user->phone }}</li>
                <li> Email : {{ $user->email }}</li>
            </ul>
            <ul>
                <li>
                    Education : {{ $user->userDetails->education }}
                </li>
                <li>
                    Country : {{ $user->userDetails->country }}
                </li>
                <li>
                    State : {{ $user->userDetails->state }}
                </li>
            </ul>

            {{-- <ul>
                    <li> Name : {{ $userDetails->user->name }}</li>
                    <li> Phone : {{ $userDetails->user->phone }}</li>
                    <li> Email : {{ $userDetails->user->email }}</li>
                </ul>
                <ul>
                    <li>
                        Education : {{ $userDetails->education }}
                    </li>
                    <li>
                        Country : {{ $userDetails->country }}
                    </li>
                    <li>
                        State : {{ $userDetails->state }}
                    </li>
                </ul> --}}

            <div class="card">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Sl No
                            </th>
                            <th>
                                Book
                            </th>
                            <th>
                                Volume
                            </th>
                            <th>
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->books as $book)
                            <tr>
                                <td>
                                    {{$book->books_id}}
                                </td>
                                <td>
                                    {{$book->book}}
                                </td>
                                <td>
                                    {{$book->volume}}
                                </td>
                                <td>
                                    {{$book->status}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>


        </div>
    </div>
@endsection
