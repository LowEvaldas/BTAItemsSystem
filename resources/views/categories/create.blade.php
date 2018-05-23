@extends('layouts.master')

@section('content')

    <div class="flex-center position-ref">
        <form action="{{ route('categories.store') }}" method="POST">
            {{ csrf_field()}}

            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}">
            <button type="submit">Kurti</button>
        </form>
    </div>

@endsection