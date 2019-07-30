@extends('layout')

@section('title')
    Search
    @endsection

@section('body')

    <form method = "POST" action="/search">
        @csrf
        <select name="bank">

            @foreach($banknames as $bankname)
            <option value="{{$bankname->name}}">{{$bankname->name}}</option>
            @endforeach

        </select>
        <br>
        <input type="text" name="ifsc" placeholder="enter 11 digit ifsc code"><br>
        or<br>

        <input type="text" name="branch" placeholder="branch"><br>
        <input type="submit">
    </form>

@endsection

