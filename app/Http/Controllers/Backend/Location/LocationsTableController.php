<?php

namespace App\Http\Controllers\Backend\Location;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Location\LocationRepository;
use App\Http\Requests\Backend\Location\ManageLocationRequest;

/**
 * Class LocationsTableController.
 */
class LocationsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var LocationRepository
     */
    protected $location;

    /**
     * contructor to initialize repository object
     * @param LocationRepository $location;
     */
    public function __construct(LocationRepository $location)
    {
        $this->location = $location;
    }

    /**
     * This method return the data of the model
     * @param ManageLocationRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageLocationRequest $request)
    {
        return Datatables::of($this->location->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($location) {
                return Carbon::parse($location->created_at)->toDateString();
            })
            ->addColumn('actions', function ($location) {
                return $location->action_buttons;
            })
            ->make(true);
    }
}
