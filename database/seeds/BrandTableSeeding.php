<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;
// use BrandHelperTable;
// use Database\seeds\BrandHelperTable;
class BrandTableSeeding extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $allBrands =  $this->allBrand();
       foreach($allBrands as $key => $value){     
        //    dump('hii');
        $brandProduct = explode(',',$this->getBrandProduct($value));
        array_walk($brandProduct, function(&$bpvalue, $key){
           
            $bpvalue =  trim($bpvalue);
        });
        // dd(explode(',',$this->getBrandProduct($value)));
          $brands =   Brand::firstOrCreate(
                [
                    'name' => $value,
                ],
                [
                    'name' => $value,
                    'gadget_id' => 1,
                ],
            );
            if($brands->wasRecentlyCreated){
                foreach($brandProduct as $product){
                    $brands->products()->create(
                        [
                            'name' =>  $product,
                            'description' => NULL,

                        ]
                    );
                }
              
            }
            
       }
    }

    private function allBrand()
    {
    	return [
    		'Apple','Asus','Coolpad','Xiomi','Huawei'
    	];
    }


    public  function getBrandProduct($brand){
        $allData =  $this->brandProduct();
        return $allData[$brand];
      }
    public  function brandProduct(){
      return [
          'Apple' =>'
              iphone 5,
              iphone 5c,
              Iphone 6,
              Iphone 6 plus,
              Iphone 7,
              Iphone 8,
              Iphone x,
              Iphone 5s,
              Iphone SE,
              Iphone 6s,
              Iphone 6s plus,
              Iphone 7 plus,
              Iphone 8 Plus',
      'Asus' => 
             '
                  Zenphone 2, 
                  Zenphone 3,
                  zenphone  5,
                  Zenphone 2 laser,
                  Zenphone 4,
                  Zenphone max pro M1,
                  COOLPAD,
                  Cool 1,
                  Note 3,
                  Note 5,
                  Mega 2.5D,
                  Model Name,
                  Note 3 lite,
                  Note 5 lite
              ',
              'Coolpad' => '
                  Note 5,
                  Note 3 lite,
                  Note 5 lite '
              ,
              'Xiomi' => '
                      Mi A1,
                      Redmi 3s,
                      Redmi 4,
                      Redmi 5,
                      Redmi 6,
                      Redmi 6 pro,
                      Poco f1,
                      Mi Max 2,
                      Mi Mix 2,
                      Redmi note 4,
                      Redmi note 5 pro,
                      Redmi note 7 ,
                      Redmi note 7 pro,
                      Mi y2,
                      Mi A2,
                      Redmi 3s prime,
                      Redmi 4A,
                      Redmi 5A,
                      Redmi 6A,
                      Mi 4i,
                      Mi Max,
                      Mi mix,
                      Redmi note 3,
                      Redmi note 5,
                      Redmi note 6 pro,
                      Redmi note 7s,
                      Mi y1',
                  'Huawei' => 
                      'P20 Lite,
                      Honor 7A,
                      Honor 7S,
                      Honor 8,
                      Honor 8X '
          ];	
      }
}
