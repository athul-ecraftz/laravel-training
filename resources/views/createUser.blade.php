@extends('layout.master')
@section('content')
    <h1>
        Create User
    </h1>

    <div class="contact-form">

        <form action="{{ route('saveUser') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " id="" placeholder="Enter Name">
                @error('name')
                    <span class="alert-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="text" name="phone" class="form-control" id="" placeholder="Phone">
                @error('phone')
                <span class="alert-danger">
                    {{ $message }}
                </span>
            @enderror
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" id="" placeholder="Email">
                @error('email')
                <span class="alert-danger">
                    {{ $message }}
                </span>
            @enderror
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control" id="" placeholder="Address">
                @error('address')
                <span class="alert-danger">
                    {{ $message }}
                </span>
            @enderror
            </div>
            <div class="form-group">
                <label for="">DOB</label>
                <input type="date" name="dob" class="form-control" id="" placeholder="DOB">
                @error('dob')
                <span class="alert-danger">
                    {{ $message }}
                </span>
            @enderror
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select class="form-select" name="status" id="">
                    <option value="1">Active</option>
                    <option value="0">InActive</option>
                </select>
            </div>
            <p>

            </p>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
