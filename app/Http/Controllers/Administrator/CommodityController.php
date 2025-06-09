<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\StoreCommodityRequest;
use App\Http\Requests\Administrator\UpdateCommodityRequest;
use App\Http\Requests\ImportExcelRequest;
use App\Models\Commodity;
use App\Services\ImportService;
use Barryvdh\DomPDF\Facade\Pdf;
use Milon\Barcode\Facades\DNS1DFacade;
// use Milon\Barcode\Facades\DNS1D;

class CommodityController extends Controller
{
    private ImportService $importService;

    public function __construct()
    {
        $this->importService = new ImportService(new Commodity());
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commodities = Commodity::select('id', 'name')->get();

        return view('administrator.commodity.index', compact('commodities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommodityRequest $request)
    {
        Commodity::create($request->validated());

        return redirect()->route('administrators.commodities.store')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommodityRequest $request, Commodity $commodity)
    {
        $commodity->update($request->validated());

        return redirect()->route('administrators.commodities.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commodity $commodity)
    {
        $commodity->delete();

        return redirect()->route('administrators.commodities.index')->with('success', 'Data berhasil dihapus!');
    }

    /**
     * Import a listing of the resource.
     */
    public function import(ImportExcelRequest $request)
    {
        $counts = $this->importService->importExcel($request->validated('import'), ['name'], 'name', 0);
        $message = "Total {$counts['imported']} berhasil diimpor, {$counts['ignored']} dihiraukan!";

        return redirect()->route('administrators.commodities.index')->with('success', $message);
    }

    /**
     * Generate and display a barcode for a commodity.
     */
    // public function barcode($id)
    // {
    //     $commodity = Commodity::find($id);

    //     if (!$commodity) {
    //         abort(404);
    //     }

    //     // Pad the ID to 8 digits for consistency
    //     $barcodeData = str_pad($commodity->id, 8, '0', STR_PAD_LEFT);
    //     $barcodeType = 'C128'; // Use C128 for compatibility with DNS1D
    //     $barcode = DNS1DFacade::getBarcodeSVG($barcodeData, $barcodeType, 2, 60, 'black', false);

    //     return view('administrator.commodity.barcode', [
    //         'barcode' => $barcode,
    //         'commodity' => $commodity,
    //     ]);
    // }

    public function barcode($id)
    {
        $commodity = Commodity::find($id);

        if (!$commodity) {
            abort(404);
        }

        $barcodeData = str_pad($commodity->id, 8, '0', STR_PAD_LEFT);
        $barcodeType = 'C128';

        $barcodePng = DNS1DFacade::getBarcodePNG($barcodeData, $barcodeType, 2, 60);
        $barcodeImage = 'data:image/png;base64,' . $barcodePng;

        $pdf = Pdf::loadView('administrator.commodity.barcode_pdf', [
            'commodity' => $commodity,
            'barcodeImage' => $barcodeImage,
        ]);

        return $pdf->stream('barcode_commodity_' . $commodity->id . '.pdf');
    }
}
