<?php

namespace App\Http\Controllers\Backend\Image;

use App\Models\Image\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Image\ImageRepository;
use App\Http\Requests\Backend\Image\ManageImageRequest;
use App\Http\Requests\Backend\Image\CreateImageRequest;
use App\Http\Requests\Backend\Image\StoreImageRequest;
use App\Http\Requests\Backend\Image\EditImageRequest;
use App\Http\Requests\Backend\Image\UpdateImageRequest;
use App\Http\Requests\Backend\Image\DeleteImageRequest;

/**
 * ImagesController
 */
class ImagesController extends Controller
{
    /**
     * variable to store the repository object
     * @var ImageRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ImageRepository $repository;
     */
    public function __construct(ImageRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Image\ManageImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManageImageRequest $request)
    {
        return view('backend.images.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateImageRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateImageRequest $request)
    {
        return view('backend.images.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreImageRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImageRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return redirect()->route('admin.images.index')->withFlashSuccess(trans('alerts.backend.images.created'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Image\Image  $image
     * @param  EditImageRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image, EditImageRequest $request)
    {
        return view('backend.images.edit', compact('image'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateImageRequestNamespace  $request
     * @param  App\Models\Image\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $image, $input );
        //return with successfull message
        return redirect()->route('admin.images.index')->withFlashSuccess(trans('alerts.backend.images.updated'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteImageRequestNamespace  $request
     * @param  App\Models\Image\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image, DeleteImageRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($image);
        //returning with successfull message
        return redirect()->route('admin.images.index')->withFlashSuccess(trans('alerts.backend.images.deleted'));
    }
    
}
