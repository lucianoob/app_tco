@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><i class="fas fa-building"></i> {{ __('suppliers.title') }}</div>

                    <div class="card-body">
                        <table class="table mt-4 text-center table-striped" id="tblData">
                            <thead>
                            <tr>
                                <tr>
                                <th>Id</th>
                                <th>{{ __('suppliers.company') }}</th>
                                <th>{{ __('suppliers.name') }}</th>
                                <th>{{ __('suppliers.phone') }}</th>
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
            param_api = 'supplier/';
            dtColumns = [
                { data: 'id' },
                { data: 'company' },
                { data: 'name' },
                { data: 'phone' },
            ];
        </script>
    @endpush
@stop
