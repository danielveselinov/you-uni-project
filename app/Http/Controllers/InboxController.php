<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::orderBy('name', 'asc')
            ->get();

        return view('inboxes.index', compact('users'));
    }

    public function messages(): View
    {
        $messages = auth()->user()->messages()
            ->where('scheduled_at', '<=', now())
            ->orderBy('scheduled_at', 'desc')
            ->get();

        return view('inboxes.messages', compact('messages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user' => ['required', 'exists:users,id'],
            'scheduled_at' => ['required', 'date'],
            'message' => ['required', 'string', 'min:10', 'max:1550'],
        ]);

        auth()->user()->inboxes()->create([
            'to_user_id' => $request->user,
            'scheduled_at' => $request->scheduled_at,
            'message' => $request->message,
        ]);

        return to_route('inboxes.index');
    }
}
