<?php

function status($slug){
    return \App\Models\Status::where('slug', $slug)->first();
}

function invite_user($inviter, $email, $role, $assigned_id = null){
    $registration_link = \App\Models\RegistrationLink::create([
        'hash' => \Illuminate\Support\Str::random(16),
        'email' => $email,
        'company_id' => in_array($role, ['owner', 'employee']) ? $assigned_id : null,
        'workplace_id' => in_array($role, ['workplace_leader', 'lecturer']) ? $assigned_id : null,
        'role' => $role,
    ]);

    \Illuminate\Support\Facades\Mail::to($registration_link->email)
        ->send(new \App\Mail\InvitationMail($inviter, $registration_link->generateLink()));
}
