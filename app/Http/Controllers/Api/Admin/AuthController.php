<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\User;
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
        $this->middleware('auth:api', ['except' => ['login','logout','me','refresh','changePassword','updateProfile']]);
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
            if (! $token = auth()->guard('api')->attempt($credentials))
            {
                return response()->json(['message' => 'Email And Password Not Match To The Data'], 401);
            }
            $auth_user = User::where('email', $request->email)->first();
            $auth_user->update([
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
        /*$auth_user = User::findOrFail(auth()->guard('api')->user()->id);
        $auth_user->update([
            'firebase_token' => null,
        ]);*/
        auth()->guard('api')->logout();
        return response()->json(['message' => 'User Successfully Signed Out']);
    }


    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->createNewToken(auth()->guard('api')->refresh());
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
            'expires_in'   => auth()->guard('api')->factory()->getTTL() * 60 * 24 * 365,
            'user'         => auth()->guard('api')->user()
        ]);
    }



    public function me()
    {
        try {

            $auth_id = auth()->guard('api')->user()->id;
            $user = User::with('employee','employee.department','employee.branch','media')->findOrFail($auth_id);
            return $this->apiResponse($user, 'The Data Returns Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function changePassword(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                // 'auth_id'      => 'required|exists:users,id',
                'old_password' => 'required|string|min:8',
                'new_password' => 'required|string|min:8',
            ]);
            if ($validator->fails()) {
                return $this->apiResponse(null, $validator->errors(), 400);
            }
            $auth_id = auth()->guard('api')->user()->id;;
            $user    = User::findOrFail($auth_id);
            if (Hash::check($request->old_password, $user->password)) {
                $user->update([
                    'password' => bcrypt($request->new_password),
                ]);
                return $this->apiResponse($user, 'The Data Updated Successfully', 200);
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

            $validator = Validator::make($request->all(),
            [
                // 'auth_id' => 'required|exists:users,id',
                'name'    => 'required|string',
                'email'   => 'required|string|email|max:100|unique:users,email,'.auth()->guard('api')->user()->id,
                'mobile'  => 'required|numeric|regex:/^\d{11,}$/|unique:users,mobile,'.auth()->guard('api')->user()->id,
                'file'    => 'nullable'. ($request->hasFile('file') ? '|mimes:jpeg,jpg,png,webp|max:5048' : ''),
            ]);
            if($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $auth_id = auth()->guard('api')->user()->id;;
            $user    = User::findOrFail($auth_id);
            //upload file
            if ($request->hasFile('file')) {
                //remove old file
                if($user->media) {
                    Storage::disk('attachments')->delete('user/' . $user->media->file_name);
                    $user->media->delete();
                }
                $file_size = $request->file->getSize();
                $file_type = $request->file->getMimeType();
                $file_name = time() . '.' . $request->file->getClientOriginalName();
                $request->file->storeAs('user', $file_name, 'attachments');
                $user->media()->create([
                    'file_path' => asset('public/attachments/user/' . $file_name),
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_sort' => 1
                ]);
            }
            //update data
            $user->update([
                'name'   => $request->name ?? $user->name,
                'email'  => $request->email ?? $user->email,
                'mobile' => $request->mobile ?? $user->mobile,
            ]);
            if ($user) {
                return $this->apiResponse($user, 'The Data Updated Successfully', 200);
            }
            return $this->apiResponse(null, 'Something Error Happened Try Again Please', 404);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
