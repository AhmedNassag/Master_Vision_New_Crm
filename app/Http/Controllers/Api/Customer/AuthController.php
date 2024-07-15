<?php

namespace App\Http\Controllers\Api\Customer;

use App\Models\User;
use App\Models\Customer;
use App\Traits\ImageTrait;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ImageTrait;
    use ApiResponseTrait;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','logout','refresh','changePassword','updateProfile']]);
    }


    public function login(Request $request)
    {
        try {
            
            $validator = Validator::make($request->all(),
            [
                'email'          => 'required|email',
                'password'       => 'required|string|min:6',
                'firebase_token' => 'required|string',

            ]);
            if ($validator->fails())
            {
                return response()->json($validator->errors(), 422);
            }
            $credentials = $request->only("email", "password");
            if (! $token = auth()->guard('customer_api')->attempt($credentials))
            {
                return response()->json(['message' => 'Email And Password Not Match To The Data'], 401);
            }
            $auth_customer = Customer::where('email', $request->email)->first();
            $auth_customer->update([
                'firebase_token' => $request->firebase_token,
            ]);
            return $this->createNewToken($token);
            
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        /*$auth_user = User::findOrFail(auth()->guard('customer_api')->user()->id);
        $auth_user->update([
            'firebase_token' => null,
        ]);*/
        auth()->guard('customer_api')->logout();
        return response()->json(['message' => 'Customer Successfully Signed Out']);
    }


    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->createNewToken(auth()->guard('customer_api')->refresh());
    }



    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json
        ([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->guard('customer_api')->factory()->getTTL() * 60 * 24 * 365,
            'customer'     => auth()->guard('customer_api')->user()
        ]);
    }



    public function changePassword(Request $request)
    {
        try {
            
            $validator = Validator::make($request->all(), [
                'old_password' => 'required|string|min:8',
                'new_password' => 'required|string|min:8',
                // 'auth_id'      => 'required|exists:customers,id',
            ]);
            if ($validator->fails()) {
                return $this->apiResponse(null, $validator->errors(), 400);
            }
            $auth_id   = auth()->guard('customer_api')->user();
            $customer  = Customer::findOrFail($auth_id);
            if (Hash::check($request->old_password, $customer->password)) {
                $customer->update([
                    'password' => $request->new_password,
                ]);
                return $this->apiResponse($customer, 'The Data Updated Successfully', 200);
            } else {
                return $this->apiResponse(null, 'Sorry The Old Password Is Not Correct', 404);
            }

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function updateProfile(Request $request)
    {
        try {

            $customer  = auth()->guard('customer_api')->user();
            $validator = Validator::make($request->all(),
            [
                'email' => 'required|string|email|max:100|unique:customers,email,'.$customer->id,
                'file'  => 'nullable'. ($request->hasFile('file') ? '|mimes:jpeg,jpg,png,webp|max:5048' : ''),
            ]);
            if($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }
            //upload file
            if ($request->hasFile('file')) {
                //remove old file
                if($customer->media) {
                    Storage::disk('attachments')->delete('customer/' . $customer->media->file_name);
                    $customer->media->delete();
                }
                $file_size = $request->file->getSize();
                $file_type = $request->file->getMimeType();
                $file_name = time() . '.' . $request->file->getClientOriginalName();
                $request->file->storeAs('customer', $file_name, 'attachments');
                $customer->media()->create([
                    'file_path' => asset('public/attachments/customer/' . $file_name),
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_sort' => 1
                ]);
            }
            //update data
            $customer->update([
                'email'   => $request->email,
                'mobile'  => $request->mobile,
                'mobile2' => $request->mobile2,
            ]);
            if ($customer) {
                return $this->apiResponse($user, 'The Data Updated Successfully', 200);
            }
            return $this->apiResponse(null, 'Something Error Happened Try Again Please', 404);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
