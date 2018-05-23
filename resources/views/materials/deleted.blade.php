@extends('layouts.master')

@section('content')

<div class="flex-center position-ref">
    @if (!$materials->isEmpty())
    <table border="solid">
        <thead>
        <tr>
            <th>Pavadinimas</th><th>Atkurti</th>
        </tr>
        </thead>

        <tbody>
        @foreach($materials as $material)
            <tr>
                <td>
                    {{ $material->title }}
                </td>

                <td>
                    <form action="{{ route('materials.restore', ['id' => $material->id]) }}" method="POST">
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