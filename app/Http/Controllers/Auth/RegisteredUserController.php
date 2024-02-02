<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterStoreRequest;
use App\Models\Restaurant;
use App\Models\Typology;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {

        $typologies = Typology::all();

        return view('auth.register', compact('typologies'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $image_path = null;

        if (isset($data['restaurant_photo'])) {
            $image_path = Storage::put("restaurants_img", $data["restaurant_photo"]);
            // Sovrascrivo il record "photo" con il nuovo path generato che poi verrà salvato sul db
            $data['restaurant_photo'] = $image_path;
        }


        $user = User::create([
            'name' => $data['name'],
            'surname' =>  $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $restaurant = Restaurant::create([
            'name' => $data['restaurant_name'],
            'address' =>  $data['address'],
            'p_iva' =>  $data['p_iva'],
            'photo' =>  $image_path,
            'telephone' =>  $data['telephone'],
            'user_id' => $user->id
        ]);


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
