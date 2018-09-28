<?php

namespace App\Http\Controllers\Backend\Device;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Device\DeviceRepository;
use App\Http\Requests\Backend\Device\ManageDeviceRequest;

/**
 * Class DevicesTableController.
 */
class DevicesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var DeviceRepository
     */
    protected $device;

    /**
     * contructor to initialize repository object
     * @param DeviceRepository $device;
     */
    public function __construct(DeviceRepository $device)
    {
        $this->device = $device;
    }

    /**
     * This method return the data of the model
     * @param ManageDeviceRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageDeviceRequest $request)
    {
        return Datatables::of($this->device->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($device) {
                return Carbon::parse($device->created_at)->toDateString();
            })
            ->addColumn('actions', function ($device) {
                return $device->action_buttons;
            })
            ->make(true);
    }
}
