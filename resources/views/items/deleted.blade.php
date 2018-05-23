@extends('layouts.master')

@section('content')

<div class="flex-center position-ref">

    @if (!$items->isEmpty())
    <table border="solid">
        <thead>
        <tr>
            <th>Pavadinimas</th><th>Atkurti</th>
        </tr>
        </thead>

        <tbody>
        @foreach($items as $item)
            <tr>
                <td>
                    {{ $item->title }}
                </td>

                <td>
                    <form action="{{ route('items.restore', ['id' => $item->id]) }}" method="POST">
                        {{csrf_field()}}
                        <input type="submit" value="Restore">
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