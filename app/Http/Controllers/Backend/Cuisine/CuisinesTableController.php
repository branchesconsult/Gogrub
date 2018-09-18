<?php

namespace App\Http\Controllers\Backend\Cuisine;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Cuisine\CuisineRepository;
use App\Http\Requests\Backend\Cuisine\ManageCuisineRequest;

/**
 * Class CuisinesTableController.
 */
class CuisinesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var CuisineRepository
     */
    protected $cuisine;

    /**
     * contructor to initialize repository object
     * @param CuisineRepository $cuisine;
     */
    public function __construct(CuisineRepository $cuisine)
    {
        $this->cuisine = $cuisine;
    }

    /**
     * This method return the data of the model
     * @param ManageCuisineRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageCuisineRequest $request)
    {
        return Datatables::of($this->cuisine->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($cuisine) {
                return Carbon::parse($cuisine->created_at)->toDateString();
            })
            ->addColumn('actions', function ($cuisine) {
                return $cuisine->action_buttons;
            })
            ->make(true);
    }
}
