<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemsController extends Controller
{

    const LOCAL_STORAGE_FOLDER = 'public/images/';
    private $item;
    private $image;

    public function __construct(Item $item, Image $image)
    {
        $this->item = $item;
        $this->image = $image;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

       $items = Item::latest()->get();
        return view('admin.items.index')->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->item->uuid = Str::uuid();
        $this->item->name = $request->name;
        $this->item->price = $request->price;
        $this->item->description = $request->description;
        $this->item->stock = $request->stock;

        $this->item->save();

        return redirect()->route('items.index')->with('added-item','Item added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
        
        return view('admin.items.show')->with('item',$item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function saveImage(Request $request ,$id){
        $image_name = time().".".$request->image->extension();

        $this->image->image = $image_name;
        $this->image->item_id = $id;
        $this->image->save();

        $request->image->storeAs(self::LOCAL_STORAGE_FOLDER,$image_name);


       return redirect()->back();

    }
}
