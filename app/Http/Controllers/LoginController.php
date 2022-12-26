<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;
use Hash;
use Laravel\Socialite\Facades\Socialite; //tambahkan library socialite

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            // 'password' => $data['password'],
            'password' => Hash::make($data['password'])
        ]);

        //
    }

    public function register(Request $request)
    {
        $addplace = $request->get("addplace");
        return view('pages.auth.register')->with("addplace", $addplace);
    }
    public function login(Request $request)
    {
        $addplace = $request->get("addplace");
        return inertia('Auth/Login', ['addplace' => $addplace]);
        // return view('pages.auth.login')->with("addplace", $addplace);
    }

    public function actionlogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $data = User::where('email', $request->get('email'))->get();
            $data = $data[0]->isAdmin;
            if ($request->get("addplace") == "1") {
                return redirect("/add-place");
            } else {
                if ($data == "1") {
                    return redirect("admin");
                } else {
                    return inertia('Auth/Login', ['error' => 'Anda tidak memiliki akses ke halaman admin']);
                }
            }
        }

        return inertia('Auth/Login', ['error' => 'Email atau Password tidak sesuai']);
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function postRegistration(Request $request)
    {
        // if($request->$password1 != $request->$password2){
        //     return redirect("register")->withError('Password harus sama');
        // }
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
        ]);

        $data = $request->all();
        $check = $this->create($data);
        if ($request->get("addplace") == "1") {
            return redirect("/add-place");
        } else {
            return redirect("login")->with('message', 'Berhasil daftar, silahkan login kembali');
        }
    }
    public function mobileactionlogin(Request $request)
    {
        // $request->validate([
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);
        $email = $request->get('email');
        $password = $this->setPasswordAttribute($request->get('password'));

        // $credentials = $request->only('email', 'password');
        // if (Auth::attempt($credentials)) {
        //     return redirect("admin");
        // }

        $credentials = request([$email, $password]);
        // if (!$token = auth('api')->attempt($credentials)) {
        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized' . $password], 401);
        } else {
            $data = User::where('email', $email)->get();
            return response()->json([
                'token' => $token, // Token
                'data' => $data
                // 'expires' => auth('api')->factory()->getTTL() * 60, // Expiration
            ]);
        }

        // return "alll";
    }
    private function setPasswordAttribute($value)
    {
        if (\Hash::needsRehash($value)) {
            $value = \Hash::make($value);
        }
        $this->attributes['password'] = $value;
    }
    public function mobilepostRegistration(Request $request)
    {
        // if($request->$password1 != $request->$password2){
        //     return redirect("register")->withError('Password harus sama');
        // }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
        ]);

        // $passLength = Str::length($request->password);
        // if($passLength < 4){
        //     return response()->json(['error' => 'Password min 4 karakter'], 400);
        // }

        $data = $request->all();
        $check = $this->create($data);
        $data = User::where('email', $request->email)->get();
        $response = [
            'success' => '200',
            'profile' => $data
        ];
        // $response = json(['tempat'=>$tempat,'event'=>$event,'headline'=>$headline]);
        return $response;
    }

    public function setadmin(Request $request)
    {
        $post = User::find($request->id);
        $post->isAdmin = 1;
        $post->update();
        return redirect("admin?type=user");
    }
    public function setnonadmin(Request $request)
    {
        $post = User::find($request->id);
        $post->isAdmin = 0;
        $post->update();
        return redirect("admin?type=user");
    }
    public function setsuperadmin(Request $request)
    {
        $post = User::find($request->id);
        $post->isSuperAdmin = 1;
        $post->update();
        return redirect("admin?type=user");
    }
    public function setnonsuperadmin(Request $request)
    {
        $post = User::find($request->id);
        $post->isSuperAdmin = 0;
        $post->update();
        return redirect("admin?type=user");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(Login $login)
    {
        //
    }
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }


    //tambahkan script di bawah ini 
    public function handleProviderCallback(\Request $request)
    {
        try {
            $user_google    = Socialite::driver('google')->user();
            $user           = User::where('email', $user_google->getEmail())->first();

            //jika user ada maka langsung di redirect ke halaman home
            //jika user tidak ada maka simpan ke database
            //$user_google menyimpan data google account seperti email, foto, dsb

            if ($user != null) {
                \auth()->login($user, true);
                return redirect('/admin');
            } else {
                $create = User::Create([
                    'email'             => $user_google->getEmail(),
                    'name'              => $user_google->getName(),
                    'password'          => 0,
                    'email_verified_at' => now()
                ]);


                auth()->login($create, true);
                return redirect('/admin');
            }
        } catch (\Exception $e) {
            return redirect('/login');
        }
    }
}
