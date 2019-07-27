<html>
<body>
<table>
   {{-- @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if ($lastLogin = $user->logins()->latest('updated_at')->first())
--}}{{--                    {{ $lastLogin->created_at->format('M j, Y \a\t g:i a') }}--}}{{--
                    {{ $lastLogin->updated_at }}
                @else
                    Never
                @endif
            </td>
        </tr>
    @endforeach--}}

    {{--@foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if ($user->last_login_at)
                    {{ $user->last_login_at }}
                @else
                    Never
                @endif
            </td>
        </tr>
    @endforeach--}}

    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Last Login</th>
        <th>Last ip</th>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if ($user->lastLogin)
                    {{ $user->lastLogin->created_at->format('M j, Y \a\t g:i a') }}
                @else
                    Never
                @endif
            </td>
            <td>
                @if ($user->lastLogin)
                    {{ $user->lastLogin->ip_address }}
                @else
                    Never
                @endif
            </td>
        </tr>
    @endforeach
</table>

</body>
</html>
