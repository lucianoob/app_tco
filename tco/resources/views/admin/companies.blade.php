@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><i class="fas fa-building"></i> {{ __('companies.title') }}</div>

                    <div class="card-body">
                        <table class="table mt-4 text-center table-striped" id="tblData">
                            <thead>
                            <tr>
                                <tr>
                                <th>Id</th>
                                <th>{{ __('companies.user') }}</th>
                                <th>{{ __('companies.name') }}</th>
                                <th>{{ __('companies.cnpj') }}</th>
                                <th>{{ __('companies.email') }}</th>
                                <th>{{ __('companies.phone') }}</th>
                                <th>{{ __('companies.cep') }}</th>
                                <th>{{ __('companies.address') }}</th>
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
            param_api = 'company/';
            dtColumns = [
                { data: 'id' },
                { data: 'user' },
                { data: 'name' },
                { data: 'cnpj' },
                { data: 'email' },
                { data: 'phone' },
                { data: 'cep' },
                { data: 'address' },
            ];
        </script>
    @endpush
@stop
