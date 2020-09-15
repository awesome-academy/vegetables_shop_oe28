<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\ViewShareController;
use App\Http\Requests\StoreImportBillRequest;
use App\Models\ImportBill;
use App\Models\Product;
use App\Models\ImportBillProduct;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ImportBillController extends ViewShareController
{
    public function index()
    {
        $importBills = ImportBill::all();

        return view('admin.importbills.index', compact('importBills'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();

        return view('admin.importbills.create', compact(['suppliers', 'products']));
    }

    public function store(StoreImportBillRequest $request)
    {
        if (!isset($request->product_id[0]) || !isset($request->weight[0]) || !isset($request->import_price[0])
            || !isset($request->outdate[0])) {

            return redirect()->back()->withInput()->with('error_required', trans('messages.error_required'));
        }
        $importBill = ImportBill::create($request->all());
        $outdates = $request->outdate;

        foreach ($outdates as $key => $outdate) {
            ImportBillProduct::create([
                'import_bill_id' => $importBill->id,
                'product_id' => $request->product_id[$key],
                'weight' => $request->weight[$key],
                'import_price' => $request->import_price[$key],
                'outdate' => $outdate,
            ]);
            $product = Product::findOrFail($request->product_id[$key]);
            $weightAvailable = (float) str_replace(',', '.', $product->weight_available);
            $dateNow = Carbon::now()->toDateTimeString();

            if ($dateNow <= $outdate) {
                $weightAvailable += (float) str_replace(',', '.', $request->weight[$key]);
                Product::where('id', $request->product_id[$key])->update(['weight_available' => $weightAvailable]);
            } elseif ($dateNow > $outdate) {
                $weightAvailable = 0;
                Product::where('id', $request->product_id[$key])->update(['weight_available' => $weightAvailable]);
            }
        }

        return redirect()->route('import-bills.index')->with('success', trans('messages.add_success'));
    }

    public function show($id)
    {
        try {
            $importBill = ImportBill::findOrFail($id);
        } catch (ModelNotFoundException $exception) {

            return back()->withErrors($exception->getMessage())->withInput();
        }

        return view('admin.importbills.show', compact('importBill'));
    }

    public function edit($id)
    {
        try {
            $importBill = ImportBill::findOrFail($id);
        } catch (ModelNotFoundException $exception) {

            return back()->withErrors($exception->getMessage())->withInput();
        }
        $suppliers = Supplier::all();

        return view('admin.importbills.edit', compact(['importBill', 'suppliers']));
    }

    public function update(StoreImportBillRequest $request, $id)
    {
        try {
            $importBill = ImportBill::findOrFail($id);
        } catch (ModelNotFoundException $exception) {

            return back()->withErrors($exception->getMessage())->withInput();
        }
        $importBill->update($request->all());

        return redirect()->route('import-bills.index')->with('success', trans('messages.update_success'));
    }

    public function destroy($id)
    {
        try {
            $importBill = ImportBill::findOrFail($id);
        } catch (ModelNotFoundException $exception) {

            return back()->withErrors($exception->getMessage())->withInput();
        }
        $importBill->delete();

        return redirect()->route('import-bills.index')->with('success', trans('messages.delete_success'));
    }
}
