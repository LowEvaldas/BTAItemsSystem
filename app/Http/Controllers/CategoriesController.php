<?php
namespace App\Http\Controllers;
use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Item;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $categories = Category::paginate(5);
        return view('categories.index', [
            'categories' => $categories,
        ]);
    }

    public function deleted() : View
    {
        $categories = Category::onlyTrashed()->get();

        return view('categories.deleted', [
            'categories' => $categories,
        ]);
    }

    public function restore(int $id)
    {
        Category::onlyTrashed()->find($id)->restore();

        return redirect()->back();
    }

    public function restoreall(int $id)
    {
        Category::onlyTrashed()->find($id)->restore();
        Item::where('category_id', $id)->restore();

        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('categories.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        Category::create([
            'title' => $request->get('title'),
        ]);

        return redirect()->route('categories.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id): View
    {
        $category = Category::find($id);
        return view('categories.edit', [
            'category' => $category
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, int $id): RedirectResponse
    {
        Category::where('id', $id)->update([
            'title' => $request->get('title')
        ]);
        return redirect()->route('categories.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): RedirectResponse
    {
        Category::destroy($id);
        Item::where('category_id', $id)->delete();
        return redirect()->back();
    }

    public function items(int $id)
    {
        $category = Category::find($id);

        return view ('categories.items', [
            'category' => $category,
        ]);
    }

}