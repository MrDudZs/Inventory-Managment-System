@php
    $user = Auth::user();
@endphp

@if ($user->permission_level == 1)
    <a href="{{ route('clerk.dashboard') }}" class="btn btn-light"><< Back to Dashboard</a>
@elseif ($user->permission_level == 2)
    <a href="{{ route('admin.dashboard') }}" class="btn btn-light"><< Back to Dashboard</a>
@else
    <a href="{{ route('dashboard') }}" class="btn btn-light"><< Back to Dashboard</a>
@endif
