@extends('layouts.master')

@section('content')

<div class="flex-center position-ref">

    @if (!$categories->isEmpty())
    <table border="solid">
        <thead>
        <tr>
            <th>Pavadinimas</th><th>Atkurti</th><th>Atkurti su daiktais</th>
        </tr>
        </thead>

        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>
                    {{ $category->title }}
                </td>

                <td>
                    <form action="{{ route('categories.restore', ['id' => $category->id]) }}" method="POST">
                        {{csrf_field()}}
                        <input type="submit" value="Restore">
                    </form>
                </td>

                <td>
                    <form action="{{ route('categories.restoreall', ['id' => $category->id]) }}" method="POST">
                        {{csrf_field()}}
                        <input type="submit" value="Restore All">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @else
        Ištrintų įrašų nėra.
    @endif
</div>

    @endsection