@extends('layouts.app')
@section('content')

<div class="card mt-4">
    <h5 class="card-header"> Post details </h5>
    <div class="card-body">
        <h5 class="card-title"><b> Id :{{ $post-> id}}</b></h5>
        <h5 class="card-title"><b> Title :{{ $post-> title}}</b></h5>
        <h5 class="card-title"><b> Des :{{ $post->description}}</b></h5>

    </div>
</div>
@endsection