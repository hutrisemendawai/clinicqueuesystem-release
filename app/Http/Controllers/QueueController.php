<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Queue;

class QueueController extends Controller
{
    public function createForm()
    {
        return view('create-queue');
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
        ]);
    
        $queue = new Queue([
            'description' => $validatedData['description'],
        ]);
    
        $user = auth()->user();
        $user->queues()->save($queue); // This associates the user's ID with the queue_owner column
    
        return redirect()->route('home')->with('success', 'Queue created successfully');
    }

    public function destroy(Queue $queue)
    {
        // Add validation to ensure the user owns the queue
        // if ($queue->user_id !== auth()->user()->id) {
        //     return redirect()->route('home')->with('error', 'You are not authorized to delete this queue.');
        // }
        // Determine the redirect route based on user's role
        $queue->delete();

        // Determine the redirect route based on user's role
        if (auth()->user()->type === 1) { 
            return redirect()->route('admin.home')->with('success', 'Queue deleted successfully');
        } else {
            return redirect()->route('home')->with('success', 'Queue deleted successfully');
        }
    }

    public function destroyForAdmin(Queue $queue)
    {
        $queue->delete();

        return redirect()->route('admin.home')->with('success', 'Queue deleted successfully');
    }


}
