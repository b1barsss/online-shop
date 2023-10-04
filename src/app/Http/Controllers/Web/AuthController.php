<?php /** @noinspection ALL */

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Sources\Main\User\User;
use Illuminate\Support\Facades\Request;
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['login', 'register']);
    }

    public function register(Request $request)
    {
        if (User::isLoggedIn()) {
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
        if (User::isLoggedIn()) {
            return \Illuminate\Support\Facades\Redirect::to('/');
        }
        $apiUrl = '/api/login';
        return view('auth.login', compact('apiUrl'));
    }

    public function logout(): RedirectResponse
    {
        User::user()->tokens()->delete();

        return Redirect::to('/');
    }
}
