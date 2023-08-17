<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Queue;
 
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
        $user = auth()->user(); // Get the authenticated user
        if ($user->type === 1) { // Check if the user's type is 'admin'
            return redirect()->route('admin.home');
        }
        return view('home', compact('user'));
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $queues = Queue::with('user')->get(); // Eager load the associated user
        return view('adminhome', compact('queues'));
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