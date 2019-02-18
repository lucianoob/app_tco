@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><i class="fas fa-building"></i> {{ __('payments.title') }}</div>

                    <div class="card-body">
                        <table class="table mt-4 text-center table-striped" id="tblData">
                            <thead>
                            <tr>
                                <tr>
                                <th>Id</th>
                                <th>{{ __('payments.supplier') }}</th>
                                <th>{{ __('payments.description') }}</th>
                                <th>{{ __('payments.payment') }}</th>
                                </tr>
                            </tr>
                            </thead>
                        </table>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
         <script src="{{ asset('js/form.js') }}"></script>
        <script>
            param_api = 'payment/';
            dtColumns = [
                { data: 'id' },
                { data: 'supplier' },
                { data: 'description' },
                { data: 'payment' },
            ];
        </script>
    @endpush
@stop
