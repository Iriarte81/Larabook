@if ($currentUser)
@if ($user->isFollowedBy($currentUser))
    <p>You are following {{ $user->username }}</p>
    {!! Form::open(['method' => 'DELETE', 'route' => ['follow_path', $user->id]]) !!}

        {!! Form::hidden('UserIdToUnfollow', $user->id ) !!}
        <button type="submit" class="btn btn-danger">Unfollow {{ $user->username }}</button>

    {!! Form::close() !!}
@else
{!! Form::open(['route' => 'follows_path', 'method' => 'POST']) !!}

    {!! Form::hidden('userIdToFollow', $user->id ) !!}
    <button type="submit" class="btn btn-primary">Follow {{ $user->username }}</button>

{!! Form::close() !!}
@endif
@endif