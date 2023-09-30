<?php /** @noinspection ALL */

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['login', 'register']);
    }

    public function register(Request $request)
    {
        if (Auth::check()) {
            return \Illuminate\Support\Facades\Redirect::to('/');
        }
        return view('auth.register');
    }


    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request)
    {
        if (Auth::check()) {
            return \Illuminate\Support\Facades\Redirect::to('/');
        }
        $apiUrl = '/api/login';
        return view('auth.login', compact('apiUrl'));
    }

    public function logout(): RedirectResponse
    {
//        $request->user()->currentAccessToken()->delete();
        Auth::user()->tokens()->delete();
//        if (!Auth::check()) {
//            Redirect::to('welcome');
//        }
//        Auth::logout();
        return Redirect::to('/');
    }
}
