<?php

namespace App\Http\Controllers\Backend\Orderstatus;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Orderstatus\OrderstatusRepository;
use App\Http\Requests\Backend\Orderstatus\ManageOrderstatusRequest;

/**
 * Class OrderstatusesTableController.
 */
class OrderstatusesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var OrderstatusRepository
     */
    protected $orderstatus;

    /**
     * contructor to initialize repository object
     * @param OrderstatusRepository $orderstatus;
     */
    public function __construct(OrderstatusRepository $orderstatus)
    {
        $this->orderstatus = $orderstatus;
    }

    /**
     * This method return the data of the model
     * @param ManageOrderstatusRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageOrderstatusRequest $request)
    {
        return Datatables::of($this->orderstatus->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($orderstatus) {
                return Carbon::parse($orderstatus->created_at)->toDateString();
            })
            ->addColumn('actions', function ($orderstatus) {
                return $orderstatus->action_buttons;
            })
            ->make(true);
    }
}
