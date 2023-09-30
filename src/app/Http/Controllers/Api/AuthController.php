<?php /** @noinspection ALL */

namespace App\Http\Controllers\Api;

use App\BIBAsys\Bases\Controller\API\MyController;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends MyController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['login', 'register']);
//        $this->middleware('auth:sanctum');
    }

    public function register(Request $request): \Illuminate\Http\JsonResponse|RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            session()->flash('danger', implode(' | ', array_map(fn($item) => $item[0], $validator->errors()->getMessages())));
            return Redirect::to(route('register'));
//            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        session()->flash('success', 'User registered successfully.');
        return Redirect::to(route('main'));
//        $success['name'] = $user->name;
//        return $this->sendResponse($success, 'User register successfully.');
    }


    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request): JsonResponse|RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;

            session()->flash('success', 'User login successfully.');
            return Redirect::to(route('main'));
//            return $this->sendResponse($success, 'User login successfully.');
        }

        session()->flash('danger', 'Invalid credentials.');
        return Redirect::to(route('login'));

//        return $this->sendError('Unauthorised.', ['error' => 'Invalid credentials']);
    }

    public function logout(Request $request): JsonResponse|RedirectResponse
    {
        Auth::user()->tokens()->delete();
        Auth::guard('web')->logout();
//        return $this->sendResponse([], 'User logout successfully.');

        return Redirect::to('/');
    }
}
