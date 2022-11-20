@extends('layouts.app')
@section('content')

<form method="post" action="{{route('posts.store')}}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input name="title" type="text" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Desctiption</label>
        <textarea name="description" class="form-control"></textarea>

    </div>
    <div class="mb-3">
        <label class="form-label">User</label>
        <select name="user_id" class="form-control">
            @foreach($users as $user)
            <option value="{{$user->id}}"> {{$user->name}} </option>
            @endforeach
        </select>

    </div>

    <button type="submit" class="btn btn-success">Create Post</button>
</form>

@endsection