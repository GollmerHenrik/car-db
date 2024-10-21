@extends('layouts.app')
@section("content")
    <h1>Edit</h1>
    <h2>{{$entity->name}}</h2>
    <h2>{{$entity->id}}</h2>
    <form action="{{route("makers.update")}}" method="post">
        @csrf
        <label for="name">Új név</label>
        <input type="text" name="name" id="name">
        <input type="submit">
    </form>
@endsection
