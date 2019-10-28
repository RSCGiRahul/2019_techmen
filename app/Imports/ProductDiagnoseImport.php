<?php

namespace App\Imports;

use App\Models\ProductDiagnose;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\Brand;
use App\Models\Diagnose;
use App\Models\Product;
class ProductDiagnoseImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       $brandName = $row[1];
       $productName = $row[2];
       $diagnoseName = $row[3];
       $marketPrice = $row[4];
       $ourPrice  = $row[5];
       $type  = ($row[6] == 'Onsite repair') ? 1 : 2;

       $brands =   Brand::firstOrCreate(
        [
            'name' => $brandName,
        ],
        [
            'name' => $brandName,
            'gadget_id' => 1,
        ],
    );

        $product =   Product::FirstOrCreate(
            ['name' => $productName, 'brand_id' => $brands->id],
            ['name' => $productName, 'brand_id' => $brands->id,'description' => null]
        ); 
       $diagnose =  Diagnose::FirstOrCreate(
            ['name' => $diagnoseName],
            ['name' => $diagnoseName]
        );
        $arr = [
            'product_id' => $product->id,
            'diagnose_id'=>$diagnose->id,
            'diagnose_level_id' => 0,
            'market_price'  => $marketPrice,
            'price' => $ourPrice,
            'description'=> null,
            'repair_type' =>$type,
        ];
    return  ProductDiagnose::FirstOrCreate(
        [
        'product_id' => $product->id,
        'diagnose_id'=>$diagnose->id
        ], $arr );
            return new ProductDiagnose($arr);
        }

      /**
     * @return int
     */
    public function chunkSize(): int
    {
        return 2;
    } 
    

      /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    } 
}
