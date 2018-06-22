<?php

namespace App\Http\Controllers\Api;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return response()->json([
            'message' => 'Supplier deleted.'
        ]);
    }
    
    /**
     * Restore the specified resource from storage.
     *
     * @param int $supplierId
     * @return \Illuminate\Http\Response
     */
    public function restore($supplierId)
    {
        Supplier::whereId($supplierId)->withTrashed()->restore();

        return response()->json([
            'message' => 'Supplier restored.'
        ]);
    }
}
