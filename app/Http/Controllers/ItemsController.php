<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ItemRequest;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::paginate(5);
        return view('items.index', [
            'items' => $items,
        ]);
    }

    public function deleted()
    {
        $items = Item::onlyTrashed()->get();

        return view('items.deleted', [
            'items' => $items,
        ]);
    }


    public function restore(int $id)
    {
        Item::onlyTrashed()->find($id)->restore();

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {

        /** @var  Validator $validator */
        $validator = Validator::make($request->all(), [
            //
        ]);

        $validator->after(function($validator){
            $data = $validator->getData();

            $total = $data['count'] * $data['price'];

            if ($total < 100){
                $validator->errors()->add('total','Suma per mažą');
            }
        }
        );

        $validator->validate();

        Item::create([
            'title' => $request->get('title'),
            'count' => $request->get('count'),
            'price' => $request->get('price'),
            'category_id' => $request->get('category_id'),
            'description' => $request->get('description'),
        ]);

        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $item = Item::find($id);

        return view('items.edit', [
            'items' => $item,
            'categories' => Category::all(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, $id)
    {

        /** @var  Validator $validator */
        $validator = Validator::make($request->all(), [
            //
        ]);

        $validator->after(function($validator){
            $data = $validator->getData();

            $total = $data['count'] * $data['price'];

            if ($total < 100){
                $validator->errors()->add('total','Suma per mažą');
            }
        }
        );

        $validator->validate();

        Item::where('id', $id)->update([
            'title' => $request->get('title'),
            'count' => $request->get('count'),
            'price' => $request->get('price'),
            'category_id' => $request->get('category_id'),
            'description' => $request->get('description'),
        ]);
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::destroy($id);
        return redirect()->back();
    }
}
