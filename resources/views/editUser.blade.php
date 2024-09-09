@extends('layout.master')
@section('content')
    <h1>
        Edit User
    </h1>

    <div class="contact-form">

        <form action="{{ route('updateUser') }}" method="POST">
            @csrf
            <input type="hidden" name="userid" value="{{ encrypt($user->id) }}">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" value="{{ $user->name }}" required class="form-control" id=""
                    placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="number" name="phone" value="{{ $user->phone }}" class="form-control" id=""
                    placeholder="Phone">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" required class="form-control"
                    id="" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="address" value="{{ $user->address }}" class="form-control" id=""
                    placeholder="Address">
            </div>
            <div class="form-group">
                <label for="">DOB</label>
                <input type="date" name="dob" value="{{ $user->date_of_birth }}" class="form-control" id=""
                    placeholder="DOB">
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select class="form-select" name="status" id="">
                    <option @if ($user->status == 1) Selected @endif  value="1">Active</option>
                    <option @if ($user->status == 0) Selected @endif value="0">InActive</option>
                </select>
            </div>
            <p>

            </p>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
