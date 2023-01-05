<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Pusher\Pusher;

trait ApiResponses
{
    public $paginateNumber = 10;

    public function apiResponse($data = null, $code = 200)
    {

        if (!in_array($code, $this->successCode())) {
            $array = [
                'status' => in_array($code, $this->successCode()),
                'msg' => $data,
            ];
        } else {
            $array = [
                'status' => in_array($code, $this->successCode()),
                'data' => $data,
            ];
        }

        return response($array, 200);
    }

    public function successCode()
    {
        return [
            200,
            201,
            202,
        ];
    }

    public function createdResponse($data)
    {
        $data = [
            'message' => __('Created Successfully'),
            'data' => $data,
        ];

        return $this->apiResponse($data, 201);
    }

    public function deleteResponse()
    {
        return $this->apiResponse(__('Deleted successfully'), 200);
    }

    public function notFoundResponse()
    {
        return $this->apiResponse(__('Not Found'), 404);
    }

    public function alreadyExistsResponse($record)
    {
        return $this->apiResponse(__('Already Exists', ['attr' => $record]), 404);
    }

    public function unKnowError()
    {
        return $this->apiResponse('Un know error', 422);
    }

    public function userSuspend($msg)
    {

        $array = [
            'value' => false,
            'msg' => $msg,
        ];

        return response($array, 420);
    }

    public function apiValidation($request, $array)
    {

        $validate = Validator::make($request->all(), $array);

        $errors = [];

        if ($validate->fails()) {
            foreach ($validate->getMessageBag()->toArray() as $key => $messages) {
                $errors[$key] = $messages[0];

                return $this->apiResponse(null, $errors[$key], 422);
            }
        }
    }

    /**
     * @param $items
     * @param  null  $page
     * @param  array  $options
     * @return LengthAwarePaginator
     */
    public function CollectionPaginate($items, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        $items = $items->values();

        return new LengthAwarePaginator($items->forPage($page, $this->paginateNumber)->values(), $items->count(),
            $this->paginateNumber, $page, $options);
    }
}
