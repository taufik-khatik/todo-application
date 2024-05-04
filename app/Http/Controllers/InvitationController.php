<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationMail;
use Illuminate\Support\Str;
use App\Models\User;

class InvitationController extends Controller
{
    public function send(Request $request, User $user)
    {
        $this->middleware('admin'); // Assuming you have an 'admin' middleware set up

        try {
            $token = Str::random(40); // Generate a random token
            $user->invitation_token = $token;
            $user->save();

            Mail::to($user->email)->send(new InvitationMail($user, $token));
            
            return redirect()->route('users.index')->with('success', 'Invitation sent successfully.');
        } catch (\Exception $e) {
            // Handle exception (log, display error message, etc.)
            return back()->with('error', 'Failed to send invitation.');
        }
    }
}
