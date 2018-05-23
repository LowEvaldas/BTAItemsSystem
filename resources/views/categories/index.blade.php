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
        @foreach($categories as $category)
            <tr>
                <td>

                    <form action="{{ route('category.items', ['id' => $category->id]) }}" method="GET">
                        {{csrf_field()}}
                        <input type="submit" id="itemt" value="{{$category->title}}">
                    </form>
                </td>
                <td>
                    <form action="{{ route('categories.edit', ['id' => $category->id]) }}" method="GET">
                        {{csrf_field()}}
                        <input type="submit" value="Edit">
                    </form>
                </td>
                <td>
                    <form action="{{ route('categories.destroy', ['id' => $category->id]) }}" method="POST">
                        @method('DELETE')
                        {{csrf_field()}}
                        <input type="submit" onclick="return confirm('Ar tikrai norite ištrinti šią kategorija su visais jos daiktais?');" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


</div>
<br>
<div class="flex-center">
    {{$categories->links()}}

</div>

<div class="flex-center">
   <div class="pagina"> Viso Įrašų: {{$categories->total()}} </div>
</div>

<div class="flex-center">

    <div class="pagina">  Rodomi nuo {{$categories->firstItem()}} iki {{$categories->lastItem()}} </div>

</div>

<div class="flex-center">

    <a href="{{ route('categories.create') }}" class="btn btn-success">Add category</a>

</div>

    @endsection