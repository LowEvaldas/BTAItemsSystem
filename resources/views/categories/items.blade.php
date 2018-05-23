@extends('layouts.master')

@section('content')

    <div class="flex-center position-ref">
        @if (!$category->items->isEmpty())
        <table border="solid">
            <thead>
            <tr>
                <th>Pavadinimas</th>
                <th>Kiekis</th>
                <th>Kaina</th>
                <th>Kategorija</th>
                <th>Aprašymas</th>

            </tr>
            </thead>

            <tbody>
            @foreach($category->items as $item)
                <tr>
                    <td>
                        {{ $item->title }}
                    </td>

                    <td>
                        {{ $item->count }}
                    </td>

                    <td>
                        {{ $item->price }}
                    </td>

                    <td>
                        {{ $item->category()->first()->title }}
                    </td>

                    <td>
                        {{ $item->description }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
            Šios kategorijos daiktų nėra.
        @endif

    </div>
    <br>

    <div class="flex-center">
    <a href="{{ route('categories.index') }}" class="btn btn-success">Back to Categories</a>
    </div>

@endsection