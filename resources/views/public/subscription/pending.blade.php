@extends('public.layouts.app')

@section('content')
    <div class="row" id="subscription-payments">
        <div class="col-md-6">
            <div class="heading">
            </div><!-- End .heading -->
            <table id="pending-subscription-table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr align="center">
                    <th style="width:10%">SL.</th>
                    <th>Number of Month</th>
                    <th>Paid Amount</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payments as $key => $payment)
                    <tr>
                        <td>{{ $key += 1 }}</td>
                        <td>{{ $payment->no_of_month }}</td>
                        <td class="text-right">{{ $payment->paid_amount }}</td>
                        <td>{{ $payment->status == 0 ? 'Pending' : 'Paid' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- End .col-md-6 -->
    </div><!-- End .row -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#pending-subscription-table').DataTable();
        });
    </script>
@endpush
