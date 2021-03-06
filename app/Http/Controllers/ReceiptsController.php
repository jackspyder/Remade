<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReceiptsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receipts = Receipt::orderBy('id')->withTrashed()->get();
        $items = Item::all();

        return view('receipts.index', compact('receipts', 'items'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::where('status', 'For Sale')->get();

        return view('receipts.create', compact('items'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(request(), [

        ]);
        $rules = [
            'id'       => 'unique:receipts|min:0',
            'payment'  => 'required',
            'discount' => 'between:0,9999.99|nullable',
        ];

        $this->validate($request, $rules);

        $receipt = new Receipt;

        if (trim($request['id']) != "") {
            $receipt->id = trim($request['id']);
        }

        $receipt->warranty = $request['warranty'];
        $receipt->payment = $request['payment'];
        $receipt->discount = $request['discount'];
        $receipt->served_by = \Auth::user()->username;

        $receipt->save();

        foreach ($request['list'] as $item) {
            //mark the listed items as sold.
            $sold = Item::findOrFail($item);
            $sold->status = 'Sold';
            $sold->save();

            //attach the items to the receipt.
            $receipt->items()->attach($item);
        }

        return redirect('/receipts');
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
        $receipt = Receipt::withTrashed()->findOrFail($id);

        return view('receipts.show', compact('receipt'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receipt = Receipt::findOrFail($id);

        return view('receipts.edit', compact('receipt'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function search(Request $request)
    {
        $toMatch = [];

        foreach ($request->all() as $key => $value) {
            if ( ! empty(trim($value)) && $key != '_token') {
                $toMatch[$key] = trim($value);
            }
        }

        $receipts = Receipt::where($toMatch)->withTrashed()->get();
        $items = Item::all();

        return view('receipts.index', compact('receipts', 'items'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $receipt = Receipt::findOrFail($id);

        foreach ($receipt->items as $item) {
            $item->status = "For Refurbishment";
            $item->save();
        }
        $receipt->delete();

        return redirect('/receipts');


    }


    public function restore($id)
    {
        $receipt = Receipt::withTrashed()->findOrFail($id);
        $receipt->restore();

        foreach ($receipt->items as $item) {
            $item->status = "Sold";
            $item->save();
        }

        return redirect('/receipts');
    }
}
