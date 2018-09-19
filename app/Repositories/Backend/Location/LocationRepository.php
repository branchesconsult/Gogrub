<?php

namespace App\Repositories\Backend\Location;

use DB;
use Carbon\Carbon;
use App\Models\Location\Location;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LocationRepository.
 */
class LocationRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Location::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.locations.table').'.id',
                config('module.locations.table').'.created_at',
                config('module.locations.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        $location = self::MODEL;
        $location = new $location();
        if ($location->save($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.locations.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Location $location
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Location $location, array $input)
    {
    	if ($location->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.locations.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Location $location
     * @throws GeneralException
     * @return bool
     */
    public function delete(Location $location)
    {
        if ($location->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.locations.delete_error'));
    }
}
