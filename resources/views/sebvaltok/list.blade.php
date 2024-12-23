@extends('layouts.app')
@section("content")
<table>
    <thead>
        <tr>
            <th>#</th>
            <th class="search-field">Sebváltók</th>
        </tr>
    </thead>
    <form action="{{route("sebvaltok/store")}}" method="post">
        @csrf
        @method('POST')
        <label for="name">Új sebváltó</label><br>
        <input type="text" name="name" id="name"><br>
        <button type="submit">Létrehozás</button>
    </form>
    <tbody>
        @foreach($entities as $entity)
            <tr>
                <td id={{$entity->id}}>{{$entity->id}}</td>
                <td>{{$entity->name}}</td>
                <td>
                    <form action="{{ route('sebvaltok/edit', $entity->id) }}" method="POST">
                        @csrf
                        <button type="submit"><img src="edit.png" alt="" height="20px"></button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('sebvaltok/destroy', $entity->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><img src="delete.png" alt="" height="20px"></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div id="paginator">
    {{$entities->links()}}
</div>
@endsection