@extends('layout.master')
@section('content')
    <h1>
        This is About Page
        {{auth()->user()->address}}
    </h1>
@endsection
