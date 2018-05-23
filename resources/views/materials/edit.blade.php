@extends('layouts.master')

@section('content')


    <div class="flex-center position-ref">
    <form action="{{ route('materials.update', ['id' => $material->id]) }}" method="POST">
        @method('PUT')
        {{ csrf_field()}}

        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{old('title') ?? $material->title }}">
        <button type="submit">Keisti</button>
    </form>
</div>

@endsection