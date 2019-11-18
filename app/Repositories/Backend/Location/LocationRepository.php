<?php

namespace App\Repositories\Backend\Location;

use App\Models\Access\User\User;
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
            ->where('locationable_id', request()->get('chef_id'))
            ->select([
                'id',
                'building_name',
                'address',
                'created_at',
                'updated_at',
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
        // dd($input);
        $location = self::MODEL;
        $location = new $location();
        switch ($input['user_role'])
         {
            case in_array($input['user_role'], Location::USER_ROLES) == true:
                User::find($input['locationable_id'])->locations()->save(new Location($input));
                return true;
                break;
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
