<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Queue;
use Illuminate\Support\Facades\Auth;

 
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user
        $userType = $user->type; // Get the user's type
        return view('home', compact('user', 'userType'));
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $user = Auth::user();
        $userType = $user->type;
        $queues = Queue::with('user')->get(); // Eager load the associated user
        return view('adminhome', compact('queues','userType'));
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        return view('managerHome');
    }
}