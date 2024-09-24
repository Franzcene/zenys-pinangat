@extends('layouts.app')

@section('title', 'Accounting')

@section('content')
    <div class="accounting">
        <h1>Income Statement</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Total Revenue</th>
                    <th>Total Expenses</th>
                    <th>Profit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($incomeStatements as $statement)
                    <tr>
                        <td>{{ $statement->month }}</td>
                        <td>${{ $statement->total_revenue }}</td>
                        <td>${{ $statement->total_expenses }}</td>
                        <td>${{ $statement->profit }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Reconciliation</h2>
        <!-- Reconciliation report or inputs -->
    </div>
@endsection
