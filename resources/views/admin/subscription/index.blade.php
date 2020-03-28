@extends('admin.admin-master')

@section('body')
    <div class="container-fluid">
        @include('admin.message.message')
        <h1>All {{ $controllerInfo->title }}s</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Serial</th>
                <th scope="col">User Name</th>
                <th scope="col">Transaction ID</th>
                <th scope="col">Number of Months</th>
                <th scope="col">Amount Paid</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subscriptions as $key => $subscription)
                <tr>
                    <th scope="row">{{ $key += 1 }}</th>
                    <td>{{ $subscription->user->name }}</td>
                    <td>{{ $subscription->transaction_id }}</td>
                    <td>{{ $subscription->no_of_month }}</td>
                    <td>{{ $subscription->paid_amount }}</td>
                    <td>{{ $subscription->status_title }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit{{$subscription->id}}">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
