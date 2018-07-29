<?php

namespace PrintCompany\AdminBundle\Controller;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use App\Priority;
use App\Product;
use App\ProductAuthor;
use App\ProductCategory;
use App\ProductCostUnit;
use App\ProductLanguage;
use App\ProductMeasurementUnit;
use App\ProductPublisher;
use App\ProductSize;
use App\ProductStatus;
use App\ProductTranslator;
use App\ProductVolumeType;
use App\ProductWeightUnit;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if($request->input('search')){
            $product=Product::orWhere('title', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $product=Product::paginate(Session::get('limitPagination'));
        }
        return view('admin::product.show',compact('product'));
    }
    public function create(Request $request)
    {
        $productCategory= new ProductCategory();
        $productCategory=$productCategory->IsEnable()->get();
        $productStatuses= new ProductStatus();
        $productStatuses=$productStatuses->IsEnable()->get();
        $productAuthors= new ProductAuthor();
        $productAuthors=$productAuthors->IsEnable()->get();
        $productTranslators= new ProductTranslator();
        $productTranslators=$productTranslators->IsEnable()->get();
        $productSize= new ProductSize();
        $productSize=$productSize->IsEnable()->get();
        $productVolumeTypes= new ProductVolumeType();
        $productVolumeTypes=$productVolumeTypes->IsEnable()->get();
        $productPublishers= new ProductPublisher();
        $productPublishers=$productPublishers->IsEnable()->get();
        $productLanguages= new ProductLanguage();
        $productLanguages=$productLanguages->IsEnable()->get();
        $productMeasurementUnits= new ProductMeasurementUnit();
        $productMeasurementUnits=$productMeasurementUnits->IsEnable()->get();
        $productWeightUnits= new ProductWeightUnit();
        $productWeightUnits=$productWeightUnits->IsEnable()->get();
        $productCostUnits= new ProductCostUnit();
        $productCostUnits=$productCostUnits->IsEnable()->get();
        return view('admin::product.create',[
            'product_categories'=>$productCategory,
            'product_statuses'=>$productStatuses,
            'product_authors'=>$productAuthors,
            'product_translators'=>$productTranslators,
            'product_sizes'=>$productSize,
            'product_volume_types'=>$productVolumeTypes,
            'product_publishers'=>$productPublishers,
            'product_languages'=>$productLanguages,
            'product_measurement_units'=>$productMeasurementUnits,
            'product_weight_units'=>$productWeightUnits,
            'product_cost_units'=>$productCostUnits,
            ]);
    }
    public function store(Request $request)
    {
        try {
            $this->validate($request,[
                'picture' => 'required|mimes:jpg,jpeg,png,bmp,tiff |max:4096',
                'title'=>'required|min:5',
                'product_categories'=>'required',
                'product_statuses'=>'required',
                'product_translators'=>'required',
                'product_sizes'=>'required',
                'product_volume_types'=>'required',
                'product_publishers'=>'required',
                'short_description'=>'required',
                'product_languages'=>'required',
                'pages_num'=>'required',
                'release_date'=>'required',
                'print_round'=>'required',
                'ISBN'=>'required',
                'dimension_length'=>'required',
                'dimension_width'=>'required',
                'dimension_height'=>'required',
                'product_measurement_units'=>'required',
                'weight'=>'required',
                'product_weight_units'=>'required',
                'price'=>'required',
                'product_cost_units'=>'required',
                'product_authors'=>'required',
                'body'=>'required|min:10']);
            $file = $request->file('picture');
            $product=new Product();
            $product->title=$request->input('title');
            $product->body=$request->input('body');
            $product->product_categories=$request->input('product_categories');
            $product->product_statuses=$request->input('product_statuses');
            $product->product_authors=$request->input('product_authors');
            $product->product_translators=$request->input('product_translators');
            $product->product_sizes=$request->input('product_sizes');
            $product->product_volume_types=$request->input('product_volume_types');
            $product->product_publishers=$request->input('product_publishers');
            $product->product_languages=$request->input('product_languages');
            $product->pages_num=$request->input('pages_num');
            $product->release_date=Helper::getDateFromShamsiDate($request->input('release_date'));
            $product->print_round=$request->input('print_round');
            $product->ISBN=$request->input('ISBN');
            $product->dimension_length=$request->input('dimension_length');
            $product->dimension_width=$request->input('dimension_width');
            $product->dimension_height=$request->input('dimension_height');
            $product->product_measurement_units=$request->input('product_measurement_units');
            $product->weight=$request->input('weight');
            $product->product_weight_units=$request->input('product_weight_units');
            $product->price=$request->input('price');
            $product->short_description=$request->input('short_description');
            $product->product_cost_units=$request->input('product_cost_units');
            $product->product_user_insert=Auth::user()->getAuthIdentifier();
            $product->picture= $this->uploadAttachment($file);
            $product->save();
            return  redirect()->back()->with('success', Constants::TEXT_FOR_CREATE_DATA);
        } catch (\Illuminate\Database\QueryException $ex) {
            $errorCode = $ex->errorInfo[1];
            if($errorCode == '1062'){
                return redirect()->back()
                    ->with('error',Constants::TEXT_FOR_DUPLICATE_DATA );
            }
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR.$ex->getMessage() );
        }
    }

    public function edit(Product $id)
    {
        $productCategory= new ProductCategory();
        $productCategory=$productCategory->IsEnable()->get();
        $productStatuses= new ProductStatus();
        $productStatuses=$productStatuses->IsEnable()->get();
        $productAuthors= new ProductAuthor();
        $productAuthors=$productAuthors->IsEnable()->get();
        $productTranslators= new ProductTranslator();
        $productTranslators=$productTranslators->IsEnable()->get();
        $productSize= new ProductSize();
        $productSize=$productSize->IsEnable()->get();
        $productVolumeTypes= new ProductVolumeType();
        $productVolumeTypes=$productVolumeTypes->IsEnable()->get();
        $productPublishers= new ProductPublisher();
        $productPublishers=$productPublishers->IsEnable()->get();
        $productLanguages= new ProductLanguage();
        $productLanguages=$productLanguages->IsEnable()->get();
        $productMeasurementUnits= new ProductMeasurementUnit();
        $productMeasurementUnits=$productMeasurementUnits->IsEnable()->get();
        $productWeightUnits= new ProductWeightUnit();
        $productWeightUnits=$productWeightUnits->IsEnable()->get();
        $productCostUnits= new ProductCostUnit();
        $productCostUnits=$productCostUnits->IsEnable()->get();
        return view('admin::product.create',[
            'product_data'=>$id,
            'product_categories'=>$productCategory,
            'product_statuses'=>$productStatuses,
            'product_authors'=>$productAuthors,
            'product_translators'=>$productTranslators,
            'product_sizes'=>$productSize,
            'product_volume_types'=>$productVolumeTypes,
            'product_publishers'=>$productPublishers,
            'product_languages'=>$productLanguages,
            'product_measurement_units'=>$productMeasurementUnits,
            'product_weight_units'=>$productWeightUnits,
            'product_cost_units'=>$productCostUnits,
        ]);

    }
    public function update(Request $request, Product $id)
    {
        try {
            $this->validate($request,[
                'picture' => 'mimes:jpg,jpeg,png,bmp,tiff |max:4096',
                'title'=>'required|min:5',
                'product_categories'=>'required',
                'product_statuses'=>'required',
                'product_translators'=>'required',
                'product_sizes'=>'required',
                'product_volume_types'=>'required',
                'product_publishers'=>'required',
                'product_languages'=>'required',
                'pages_num'=>'required',
                'release_date'=>'required',
                'print_round'=>'required',
                'ISBN'=>'required',
                'short_description'=>'required',
                'dimension_length'=>'required',
                'dimension_width'=>'required',
                'dimension_height'=>'required',
                'product_measurement_units'=>'required',
                'weight'=>'required',
                'product_weight_units'=>'required',
                'price'=>'required',
                'product_cost_units'=>'required',
                'product_authors'=>'required',
                'body'=>'required|min:10']);
            $file = $request->file('picture');
            $id->title=$request->input('title');
            $id->body=$request->input('body');
            $id->product_categories=$request->input('product_categories');
            $id->product_statuses=$request->input('product_statuses');
            $id->product_authors=$request->input('product_authors');
            $id->product_translators=$request->input('product_translators');
            $id->product_sizes=$request->input('product_sizes');
            $id->product_volume_types=$request->input('product_volume_types');
            $id->product_publishers=$request->input('product_publishers');
            $id->product_languages=$request->input('product_languages');
            $id->pages_num=$request->input('pages_num');
            $id->release_date=Helper::getDateFromShamsiDate($request->input('release_date'));
            $id->print_round=$request->input('print_round');
            $id->ISBN=$request->input('ISBN');
            $id->dimension_length=$request->input('dimension_length');
            $id->dimension_width=$request->input('dimension_width');
            $id->dimension_height=$request->input('dimension_height');
            $id->short_description=$request->input('short_description');
            $id->product_measurement_units=$request->input('product_measurement_units');
            $id->weight=$request->input('weight');
            $id->product_weight_units=$request->input('product_weight_units');
            $id->price=$request->input('price');
            $id->product_cost_units=$request->input('product_cost_units');
            $id->product_user_insert=Auth::user()->getAuthIdentifier();
            $id->picture= $this->uploadAttachment($file,$id->picture);
            $id->save();
            return  redirect()->back()->with('success', Constants::TEXT_FOR_CREATE_DATA);
        } catch (\Illuminate\Database\QueryException $ex) {
            $errorCode = $ex->errorInfo[1];
            if($errorCode == '1062'){
                return redirect()->back()
                    ->with('error',Constants::TEXT_FOR_DUPLICATE_DATA );
            }
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR.$ex->getMessage() );
        }
    }

    private function uploadAttachment($file, $oldFile = '')
    {

        if (!$file || !$file instanceof UploadedFile) {
            return $oldFile;
        }
        if ($oldFile) {
            @unlink(public_path().'/images/products/'  . $oldFile);
        }
        $fileName = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();

        if (strpos($file->getMimeType(), 'image') !== false) {
            $fileName .= '.jpg';
            Helper::convertImageToJPG($file, public_path().'/images/products/'  . $fileName, 100);
        } else {
            $file->move(public_path().'/images/products/', $fileName);
        }
        return $fileName;
    }
    public function destroy($id)
    {
        try {
            $message="";
            $priority=Product::find($id);
            if($priority->isDelete==1){
                $priority->isDelete=0;
                $message=Constants::TEXT_FOR_ACTIVE;
            }
            else{
                $priority->isDelete=1;
                $message=Constants::TEXT_FOR_DEACTIVE;
            }

            $priority->save();
            return redirect()->route('show_product')->with('success', $message);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }
}
