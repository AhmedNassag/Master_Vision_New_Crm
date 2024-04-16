<?php

namespace App\Http\Controllers\Api\Customer;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiResponseTrait;

class NotificationController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
    //     $this->middleware(['auth:api', 'auth:customer']);
    }



    public function allNotifications(Request $request)
    {
        $data = [];
        $validator = Validator::make($request->all(),
        [
            // 'auth_id' => 'required|exists:customers,id',
        ]);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }
        $auth_id       = auth()->guard('customer_api')->user()->id;
        $customer      = Customer::findOrFail($auth_id);
        $notifications = $customer->notifications()->get();

        foreach ($notifications as $notification)
        {
            $notify['id']              = $notification->id ?? '';
            $notify['type']            = $notification->type ?? '';
            $notify['notifiable_type'] = $notification->notifiable_type ?? '';
            $notify['notifiable_id']   = $notification->notifiable_id ?? '';
            $notify['data']            = $notification->data[0] ?? '';
            $notify['read_at']         = $notification->read_at ?? '';
            $notify['created_at']      = $notification->created_at ?? '';
            $notify['updated_at']      = $notification->updated_at ?? '';
            $data[] = $notify;
        }

        if ($customer && $notifications) {
            return $this->apiResponse($data, 'The Data Returns Successfully', 200);
        }
        return $this->apiResponse(null, 'This No Data found', 404);
    }



    public function readNotifications(Request $request)
    {
        $data = [];
        $validator = Validator::make($request->all(),
        [
            // 'auth_id' => 'required|exists:customers,id',
        ]);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }
        $auth_id       = auth()->guard('customer_api')->user()->id;
        $customer      = Customer::findOrFail($auth_id);
        $notifications = $customer->readNotifications()->get();

        foreach ($notifications as $notification)
        {
            $notify['id']              = $notification->id ?? '';
            $notify['type']            = $notification->type ?? '';
            $notify['notifiable_type'] = $notification->notifiable_type ?? '';
            $notify['notifiable_id']   = $notification->notifiable_id ?? '';
            $notify['data']            = $notification->data[0] ?? '';
            $notify['read_at']         = $notification->read_at ?? '';
            $notify['created_at']      = $notification->created_at ?? '';
            $notify['updated_at']      = $notification->updated_at ?? '';
            $data[] = $notify;
        }

        if ($customer && $notifications) {
            return $this->apiResponse($data, 'The Data Returns Successfully', 200);
        }
        return $this->apiResponse(null, 'This No Data found', 404);
    }



    public function unreadNotifications(Request $request)
    {
        $data = [];
        $validator = Validator::make($request->all(),
        [
            // 'auth_id' => 'required|exists:customers,id',
        ]);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }
        $auth_id       = auth()->guard('customer_api')->user()->id;
        $customer      = Customer::findOrFail($auth_id);
        $notifications = $customer->unreadNotifications()->get();

        foreach ($notifications as $notification)
        {
            $notify['id']              = $notification->id ?? '';
            $notify['type']            = $notification->type ?? '';
            $notify['notifiable_type'] = $notification->notifiable_type ?? '';
            $notify['notifiable_id']   = $notification->notifiable_id ?? '';
            $notify['data']            = $notification->data[0] ?? '';
            $notify['read_at']         = $notification->read_at ?? '';
            $notify['created_at']      = $notification->created_at ?? '';
            $notify['updated_at']      = $notification->updated_at ?? '';
            $data[] = $notify;
        }

        if ($customer && $notifications) {
            return $this->apiResponse($data, 'The Data Returns Successfully', 200);
        }
        return $this->apiResponse(null, 'This No Data found', 404);
    }



    public function markAsReadNotifications(Request $request)
    {
        $data = [];
        $validator = Validator::make($request->all(),
        [
            // 'auth_id' => 'required|exists:customers,id',
            'id'      => 'required|exists:notifications,id',
        ]);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }
        $auth_id      = auth()->guard('customer_api')->user()->id;
        $customer     = Customer::findOrFail($auth_id);
        $notification = $customer->unreadNotifications()->findOrFail($request->id);
        if (!$notification) {
            return $this->apiResponse(null, 'There Is No Data found', 404);
        }
        $notification->update(['read_at' => now()]);
        $notify['id']              = $notification->id ?? '';
        $notify['type']            = $notification->type ?? '';
        $notify['notifiable_type'] = $notification->notifiable_type ?? '';
        $notify['notifiable_id']   = $notification->notifiable_id ?? '';
        $notify['data']            = $notification->data[0] ?? '';
        $notify['read_at']         = $notification->read_at ?? '';
        $notify['created_at']      = $notification->created_at ?? '';
        $notify['updated_at']      = $notification->updated_at ?? '';
        $data[] = $notify;
        return $this->apiResponse($data, 'The Data Returns Successfully', 200);
        /*
        $data = [];
        $validator = Validator::make($request->all(),
        [
            'auth_id' => 'required|exists:customers,id',
            'id'      => 'required|exists:notifications,id',
        ]);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }
        $auth_id      = $request->auth_id;
        $customer     = Customer::findOrFail($auth_id);
        $notification = $customer->unreadNotifications()->find($id);

        foreach ($notifications as $notification)
        {
            $notify['id']              = $notification->id ?? '';
            $notify['type']            = $notification->type ?? '';
            $notify['notifiable_type'] = $notification->notifiable_type ?? '';
            $notify['notifiable_id']   = $notification->notifiable_id ?? '';
            $notify['data']            = $notification->data[0] ?? '';
            $notify['read_at']         = $notification->read_at ?? '';
            $notify['created_at']      = $notification->created_at ?? '';
            $notify['updated_at']      = $notification->updated_at ?? '';
            $data[] = $notify;
        }

        if ($customer && $notifications) {
            return $this->apiResponse($data, 'The Data Returns Successfully', 200);
        }
        return $this->apiResponse(null, 'This No Data found', 404);
        */
    }

}
