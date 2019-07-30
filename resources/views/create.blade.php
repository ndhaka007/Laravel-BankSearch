@extends('layout')

@section('title')
    create
@endsection

@section('body')
    <h1>Add Bank</h1>
    <form method="POST" action="/">
        {{ csrf_field() }}
        <div>
            <input type="text" name="bank" placeholder="Bank">
        </div>
        <div>
            <input type="text" name="branch" placeholder="Branch">
        </div>
        <div>
            <input type="text" name="ifsc" placeholder="IFSC Code"></input>
        </div>
        <div>
            <input type="text" name="address" placeholder="Address"></input>
        </div>
        <button type="submit" name="submit" >Submit</button>
    </form>

    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif

@endsection
