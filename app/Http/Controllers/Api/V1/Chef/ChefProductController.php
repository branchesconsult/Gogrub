<?php

namespace App\Http\Controllers\Api\V1\Chef;

use App\Http\Requests\Api\Products\AddProductRequest;
use App\Http\Requests\Api\Products\GetProductsRequest;
use App\Http\Requests\Api\Products\UpdateProductRequest;
use App\Models\Image\Image;
use App\Models\Product\Product;
use App\Repositories\Backend\Product\ProductRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Unisharp\FileApi\FileApi;

/**
 * @resource Chef products
 *
 * All Orders related functions
 */
class ChefProductController extends Controller
{
    /**
     * variable to store the repository object
     * @var ProductRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ProductRepository $repository ;
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetProductsRequest $request)
    {
        $products = Product::where('chef_id', \Auth::id())
            ->with(['images', 'chef' => function ($q) {
                $q->with(['ratingReviews' => function ($q1) {

                }]);
            }])->orderByDesc('id')->get();
        return response()->json([
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        $input = $request->except(['_token', 'product_images']);
        //Create the model using repository create method
        $input['chef_id'] = \Auth::id();
        $product = new Product();
        $insertedProductId = $product->create($input)->id;
        if ($request->hasFile('product_images')) {
            $productImages = $this->uploadProducImages($request->file('product_images'));
            foreach ($productImages as $key => $val) {
                Product::find($insertedProductId)->images()->save(new Image($val));
            }
        }
        return response()->json([
            'message_title' => "Success",
            'message' => 'Your product added successfully',
            'status_code' => 200,
            'success' => true,
            'product' => Product::where('id', $insertedProductId)->with('images')->first()
        ]);
    }

    public function uploadProducImages($imagesInput)
    {
        $productsImages = [];
        $productUploadPath = env('LFM_UPLOADS_PRODUCTS');
        // dd($productUploadPath);
        foreach ($imagesInput as $key => $val) {
            $fileApi = new FileApi($productUploadPath);
            $productsImages[$key]['image_url'] = $productUploadPath . $fileApi->save($val);
        }
        return $productsImages;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::with(['images', 'cuisine', 'chef' => function ($q) {
            $q->with(['ratingReviews' => function ($q1) {

            }, 'meta']);
        }])
            //->where('availability_form', '>=', Carbon::now())
            ->where('status', '=', 1)
            ->where('id', $id)->first();
        return response()->json([
            'product' => $products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $input = $request->except(['_token', 'product_images']);
        Product::find($id)->update($input);
        if ($request->hasFile('product_images')) {
            $productImages = $this->uploadProducImages($request->file('product_images'));
            foreach ($productImages as $key => $val) {
                Product::find($id)->images()->save(new Image($val));
            }
        }
        return apiSuccessRes('Product updated successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
        } catch (\Exception $exception) {
            return apiErrorRes(404, $exception->getMessage());
        }
        $product->delete();
        return apiSuccessRes('Product deleted successfully');
    }
}
