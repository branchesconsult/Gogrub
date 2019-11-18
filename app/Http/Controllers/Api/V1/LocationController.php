<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location\Location;
use App\Repositories\Backend\Location\LocationRepository;
use App\Http\Requests\LocationRequest;


class LocationController extends APIController
{
   protected $repository;

    /**
     * contructor to initialize repository object
     * @param LocationRepository $repository ;
     */
    public function __construct(LocationRepository $repository)
    {
        $this->repository = $repository;
    }
    public function store(LocationRequest $request)
    {
    	  $input = $request->except(['_token']);
        //Create the model using repository create method
        $response=$this->repository->create($input);
        if($response)
        {
        	 return $this->respond([
            'message_title' => "Success",
            'message' => 'Location save successful',
            'status_code' => 200,
            'success' => true,
           
        ]);
        }
        else
        {
        	return $this->respond([
            'message_title' => "Error",
            'message' => 'oops something went wrong in location repo',
            'success' => false,
           
        ]);
        }
        //return with successfull message
    	// dd($request);
    }
}
