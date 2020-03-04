@extends('public.layouts.app')

@section('content')
    <div class="row" id="subscription-payments">
        <div class="col-md-6">
            <div class="heading">
            </div><!-- End .heading -->
            <form action="{{ route('subscription-payments.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <select class="form-control" name="no_of_months" @change="getTotalFee($event)">
                    <option value="">- Number Of Months -</option>
                    @for($month = 1; $month <= 12; $month++)
                        <option value="{{ $month }}">{{ $month }}</option>
                    @endfor
                </select>
                <input type="text" class="form-control" name="total_fee" placeholder="Fee" v-model="totalFee" disabled>
                <input type="number" class="form-control" name="transaction_id" placeholder="Bkash Txn ID">
                <div class="form-footer">
                    <button type="submit" name="btn" class="btn btn-primary">Submit</button>
                </div><!-- End .form-footer -->
            </form>
        </div><!-- End .col-md-6 -->
    </div><!-- End .row -->
@endsection

@push('scripts')
    <script>
        let vm = new Vue({
            el: "#subscription-payments",
            data: {
                totalFee: 0,
            },
            mounted() {
                setTimeout(function () {
                }, 1000);
            },
            methods: {
                getTotalFee(event) {
                    let _this = this;
                    axios.get('{{ route('json.get-subscription-amount') }}', {
                        params: {
                            no_of_months: event.target.value
                        }
                    })
                    .then(res => {
                        _this.totalFee = res.data.fee;
                    });
                }
            }
        });
    </script>
@endpush
