<!DOCTYPE html>
<html lang="en">
<head>
    @include('header')
    <link rel="stylesheet" href="{{ asset('css/leaderboard.css') }}">
    <title>Leaderboard | whitesecXchange</title>
</head>
@include('nav')
<body>
<div class="bg">
        <div class="text-container">
            <p class="desc">🤑💰</p>
            <div class="leaderboard-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Username</th>
                            <th>Earnings</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $index => $user)
                            @if($index + 1 == 1)
                                <tr class="first-container">
                                    <td class="first">{{ $index + 1 }}</td>
                                    <td class="first">{{ $user->name }}</td>
                                    <td class="earnings-first">${{ number_format($user->balance, 2) }}</td>
                                </tr>
                            @elseif($index + 1 == 2)
                                <tr class="second-container">
                                    <td class="second">{{ $index + 1 }}</td>
                                    <td class="second">{{ $user->name }}</td>
                                    <td class="earnings-second">${{ number_format($user->balance, 2) }}</td>
                                </tr>
                            @elseif($index + 1 == 3)
                                <tr class="third-container">
                                    <td class="third">{{ $index + 1 }}</td>
                                    <td class="third">{{ $user->name }}</td>
                                    <td class="earnings-third">${{ number_format($user->balance, 2) }}</td>
                                </tr>
                            @else
                                <tr class="normal-container">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td class="earnings">${{ number_format($user->balance, 2) }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
@include('footer')
</html>
