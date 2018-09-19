<?php

namespace App\Http\Controllers\Backend\Image;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Image\ImageRepository;
use App\Http\Requests\Backend\Image\ManageImageRequest;

/**
 * Class ImagesTableController.
 */
class ImagesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ImageRepository
     */
    protected $image;

    /**
     * contructor to initialize repository object
     * @param ImageRepository $image;
     */
    public function __construct(ImageRepository $image)
    {
        $this->image = $image;
    }

    /**
     * This method return the data of the model
     * @param ManageImageRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageImageRequest $request)
    {
        return Datatables::of($this->image->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($image) {
                return Carbon::parse($image->created_at)->toDateString();
            })
            ->addColumn('actions', function ($image) {
                return $image->action_buttons;
            })
            ->make(true);
    }
}
