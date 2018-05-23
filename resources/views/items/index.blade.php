@extends('layouts.master')

@section('content')

<div class="flex-center position-ref">
    <table border="solid">
        <thead>
        <tr>
            <th>Pavadinimas</th>
            <th>Kiekis</th>
            <th>Kaina</th>
            <th>Kategorija</th>
            <th>Aprašymas</th>
            <th>Keisti</th>
            <th>Trinti</th>
        </tr>
        </thead>

        <tbody>
        @foreach($items as $item)
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

                <td>
                    <form action="{{ route('items.edit', ['id' => $item->id]) }}" method="GET">
                        {{csrf_field()}}
                        <input type="submit" value="Edit">
                    </form>
                </td>

                <td>
                    <form action="{{ route('items.destroy', ['id' => $item->id]) }}" method="POST">
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
    {{$items->links()}}

</div>

<div class="flex-center">
   <div class="pagina"> Viso Įrašų: {{$items->total()}} </div>
</div>

<div class="flex-center">

    <div class="pagina">  Rodomi nuo {{$items->firstItem()}} iki {{$items->lastItem()}} </div>

</div>

<div class="flex-center">

    <a href="{{ route('items.create') }}" class="btn btn-success">Add item</a>

</div>

    @endsection