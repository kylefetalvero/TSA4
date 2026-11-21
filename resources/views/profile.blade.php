
@extends('layouts.tasks')

@section('title', 'My Profile')

@section('content')

<div class="header">
    <h1>My Profile</h1>
    <p>View your registered account information.</p>
</div>

<div class="card">

    @if ($user)

        <div style="text-align:center; padding:25px;">

            <div style="
                width:100px;
                height:100px;
                border-radius:50%;
                background:#394a76;
                color:white;
                display:flex;
                align-items:center;
                justify-content:center;
                font-size:40px;
                font-weight:bold;
                margin:0 auto 20px;
            ">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>

            <h2>{{ $user->name }}</h2>

            <p style="color:#858da0; margin-top:8px;">
                Registered User
            </p>

        </div>

        <hr style="border:0; border-top:1px solid #edf0f5; margin:20px 0;">

        <div class="profile-info">

            <p>
                <strong>Full Name:</strong>
                {{ $user->name }}
            </p>

            <p>
                <strong>Email Address:</strong>
                {{ $user->email }}
            </p>

            <p>
                <strong>Account Created:</strong>
                {{ $user->created_at->format('F d, Y') }}
            </p>

        </div>

    @else

        <div class="empty">
            No user profile found.
        </div>

    @endif

</div>

@endsection
