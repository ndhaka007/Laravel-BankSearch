@extends('layout')

@section('title')
    Result
    @endsection

@section('body')

    Name: {{$banks->name}}<br>
    IFSC: {{$banks->ifsc}}<br>
    Branch: {{$banks->branch}}<br>
    Address: {{$banks->address}}<br>
    @endsection
