@extends('layouts.app')
@section('content')
<a href="{{route('posts.create')}}" class="btn btn-success  mb-2"> create</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Posted by</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td> {{ $post->id}} </td>
            <td> {{ $post->title }}</td>
            <td> {{ $post->user? $post->user->name : 'not found'}} </td>
            <td>
                <a href="{{route('posts.show' ,$post->id)}}" class="btn btn-info"> view</a>
                <a href="{{route('posts.edit' ,$post->id)}}" class="btn btn-primary"> Edit</a>
                <form style="display:inline" method="POST" action="{{route('posts.delete' ,$post->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="confirm('are you sure to delete this podt!')"> Delete</button>
                </form>

            </td>
        </tr>

        @endforeach
    </tbody>
</table>

@endsection