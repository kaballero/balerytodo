<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Str;

class ProductImportController extends Controller
{
    public function create()
    {
        return view('products.import');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx',
        ]);

        $the_file = $request->file('file');

        try {
            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $row_range    = range(2, $row_limit);
            $startcount = 1;
            $data = array();
            foreach ($row_range as $row) {
                $data[] = [
					'brand_id'      => $sheet->getCell('A' . $row)->getValue(),
					'country'       => $sheet->getCell('B' . $row)->getValue(),
					'quality'       => $sheet->getCell('C' . $row)->getValue(),
                    'name'          => $sheet->getCell('D' . $row)->getValue(),
                    'slug'          => $sheet->getCell('E' . $row)->getValue(),
                    'category_id'   => $sheet->getCell('F' . $row)->getValue(),
                    'unit_id'       => $sheet->getCell('G' . $row)->getValue(),
                    'code'          => $sheet->getCell('H' . $row)->getValue(),
                    'quantity'      => $sheet->getCell('I' . $row)->getValue(),
                    "quantity_alert" => $sheet->getCell('J' . $row)->getValue(),
                    'buying_price'  => $sheet->getCell('K' . $row)->getValue(),
                    'selling_price' => $sheet->getCell('L' . $row)->getValue(),
					'tax'           => $sheet->getCell('M' . $row)->getValue(),
					'tax_type'      => $sheet->getCell('N' . $row)->getValue(),
                    'notes'         => $sheet->getCell('O' . $row)->getValue(),
					'box'           => $sheet->getCell('P' . $row)->getValue(),
					'registry'      => $sheet->getCell('Q' . $row)->getValue(),
					'site'          => $sheet->getCell('R' . $row)->getValue(),
                ];
                $startcount++;
            }

            foreach ($data as $product) {
                Product::firstOrCreate([
                    "slug" => $product["slug"],
                    "code" => $product["code"],
					"uuid" => Str::uuid(),
					"user_id" => auth()->id(),
                ], $product);
            }
        } catch (Exception $e) {
            throw $e;
            // $error_code = $e->errorInfo[1];
            return redirect()
                ->route('products.index')
                ->with('error', $e->getMessage());
        }

        return redirect()
            ->route('products.index')
            ->with('success', 'Data product has been imported!');
    }
}
