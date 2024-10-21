@extends('layouts.app')
@section("content")
<table>
    <thead>
        <tr>
            <th>#</th>
            <th class="search-field">Üzemanyag</th>
        </tr>
    </thead>
    <tbody>
        @foreach($entities as $entity)
            <tr>
                <td id={{$entity->id}}>{{$entity->id}}</td>
                <td>{{$entity->name}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection