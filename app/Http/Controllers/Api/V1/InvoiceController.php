<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Filters\V1\InvoiceFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\InvoiceResource;
use App\Http\Resources\V1\InvoiceCollection;
use App\Http\Requests\V1\StoreInvoiceRequest;
use App\Http\Requests\V1\UpdateInvoiceRequest;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
		$filter = new InvoiceFilter();
		$queryItmes = $filter->transform($request); // [column, operator, value]
		if (count($queryItmes) == 0) {
			return new InvoiceCollection(Invoice::all());
		} else {
			$invoice= Invoice::where($queryItmes)->paginate();
			return new InvoiceCollection($invoice->appends($request->query()));
		}
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
		return new InvoiceResource($invoice);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
