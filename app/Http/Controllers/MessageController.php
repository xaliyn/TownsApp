<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Anyone (visitor) can open the contact form
    public function contact()
    {
        return view('contact');
    }

    // Anyone can submit; validate & save
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'subject' => 'nullable|string|max:150',
            'body'    => 'required|string',
        ]);

        Message::create($data);

        return back()->with('ok', 'Thank you! Your message was sent.');
    }

    // Only logged-in users can see Messages list
    public function index()
    {
        $messages = Message::latest()->paginate(10);
        return view('messages', compact('messages'));
    }
}
