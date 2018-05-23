@extends('layouts.master')

@section('content')


    <div class="flex-center position-ref">
    <form action="{{ route('items.update', ['id' => $items->id]) }}" method="POST">
        @method('PUT')
        {{ csrf_field()}}

        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{old('title') ?? $items->title}}">

        <label for="count">Count</label>
        <input type="text" id="count" name="count" value="{{old('count') ?? $items->count}}">

        <label for="price">Price</label>
        <input type="text" id="price" name="price" value="{{old('price') ?? $items->price}}">


        <label for="category_id">Kategorija</label>

        <select id="category_id" name="category_id">

            @foreach($categories as $category)
                <option {{$category->id == $items->category->id ? 'selected' : ''}} name="{{$category->title}}" value="{{$category->id}}">{{$category->title}}</option>
            @endforeach

        </select>

        <label for="description">Description</label>
        <input type="text" id="description" name="description" value="{{ old('description') ?? $items->description }}">
        <br><br>
        <center>
            <button type="submit">Keisti</button>
        </center>

    </form>
</div>

@endsection

