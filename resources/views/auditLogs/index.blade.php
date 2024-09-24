@extends('layouts.app')

@section('content')
<div>
    <h2>Audit Logs</h2>
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Action</th>
                <th>Description</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
                <tr>
                    <td>{{ $log->user->name }}</td>
                    <td>{{ $log->action }}</td>
                    <td>{{ $log->description }}</td>
                    <td>{{ $log->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
