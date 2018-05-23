@extends('layouts.master')

@section('content')

<div class="flex-center position-ref">
    <table border="solid">
        <thead>
        <tr>
            <th>Pavadinimas</th><th>Keisti</th><th>Trinti</th>
        </tr>
        </thead>

        <tbody>
        @foreach($materials as $material)
            <tr>
                <td>
                    {{ $material->title }}
                </td>
                <td>
                    <form action="{{ route('materials.edit', ['id' => $material->id]) }}" method="GET">
                        {{csrf_field()}}
                        <input type="submit" value="Edit">
                    </form>
                </td>
                <td>
                    <form action="{{ route('materials.destroy', ['id' => $material->id]) }}" method="POST">
                        @method('DELETE')
                        {{csrf_field()}}
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


</div>
<br>
<div class="flex-center">
    {{$materials->links()}}
</div>

<div class="flex-center">
   <div class="pagina"> Viso Įrašų: {{$materials->total()}} </div>
</div>

<div class="flex-center">

    <div class="pagina">  Rodomi nuo {{$materials->firstItem()}} iki {{$materials->lastItem()}} </div>

</div>

<div class="flex-center">

    <a href="{{ route('materials.create') }}" class="btn btn-success">Add material</a>

</div>

    @endsection