<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rental_Details;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Vehicle;
use DateTime;
use Illuminate\Support\Facades\DB;
use Session;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{

  public $user = [];

  public function register()
  {

    return view('user.register');
  }

  public function storeUser(Request $request)
  {

    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:8',
      'telephone_number' => 'required',
      'nic' => 'required',
      'user_role' => 'required',
    ]);
    // var_dump($request);
    // exit();

    if (User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'telephone_number' => $request->telephone_number,
      'nic' => $request->nic,
      'user_role' => $request->user_role
    ])) {
      return redirect('login')->with('success', 'User created successfully.');
    } else {
      return redirect('register')->with('error', 'Oppes! You have entered invalid credentials');
    }
  }

  public function login()
  {

    return view('user.login');
  }

  public function authenticate(Request $request)
  {
    $request->validate([
      'email' => 'required|string|email',
      'password' => 'required|string',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
      $this->user = Auth::user();
      $request->session()->put('user', $this->user);

      switch ($this->user->user_role) {
        case "CUSTOMER":
          return redirect()->intended('home');
        case "OPERATOR":
          return redirect()->intended('vehicle');
        case "ADMIN":
          return redirect()->intended('admin');
      }
    }

    return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->forget('user');
    return redirect('login');
  }

  public function home(Request $request)
  {
    if (is_null($request->session()->get('user'))) {
      return redirect('login');
    } else {
      return view('customer.home');
    }
  }

  public function filterSearch(Request $request)
  {
    if (empty($request->type)) {
      return view('customer.home');
    }

    $result = DB::table('vehicles')
      ->where('vehicle_type', '=', $request->type)
      ->get();
    return view('customer.search', compact('result'));
  }

  public function request(Request $request, $id)
  {
    $request = DB::table('vehicles')
      ->where('id', '=', $id)
      ->get();
    $vehicle = $request[0];
    // var_dump($request[0]->vehicle_no);
    // exit();
    return view('customer.booking', compact('vehicle'));
  }

  public function booking(Request $request)
  {
    $request->validate([
      'id' => 'required',
      'rent_per_km' => 'required',
      'duration' => 'required',
      'total' => 'required'
    ]);

    $date_obj = new DateTime();
    $date = $date_obj->format('Y-m-d');
    $user = $request->session()->get('user');

    if (Rental_Details::create([
      'vehicle_id' => $request->id,
      'user_id' => $user->id,
      'rent_date' => $date,
      'total' => $request->total,
      'duration' => $request->duration
    ])) {
      return redirect('home')->with('success', 'User created successfully.');
    } else {
      return view('customer.search', compact('result'));
    }
  }
}
