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
                                <th>{{ __('payments.date') }}</th>
                                </tr>
                            </tr>
                            </thead>
                        </table>
                        <hr>
                        <button class="btn btn-primary float-left mr-2" id="btnNew">Novo</button>
                        <button class="btn btn-success float-left mr-2" id="btnEdit" disabled>Editar</button>
                        <button class="btn btn-info float-left" id="btnCopy" disabled>Copiar</button>
                        <button class="btn btn-danger float-right" id="btnDelete" disabled>Excluir</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="mdEdit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-edit"></i> <span id="mdEditTitle">Edit</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mdEditBody">
                    <form method="POST" id="formData">
                        @csrf

                        <input id="id" type="hidden" name="id" value="">
                        <input id="company_id" type="hidden" name="company_id" value="">

                        <div class="form-group row">
                            <label for="supplier_id" class="col-md-4 col-form-label text-md-right">{{ __('payments.supplier') }}</label>

                            <div class="col-md-6">
                                 <select name="supplier_id" id="supplier_id" class="form-control col-8">
                                    <option value="">Escolha...</option>
                                    @foreach ($suppliers as $p)
                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('payments.description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="payment" class="col-md-4 col-form-label text-md-right">{{ __('payments.payment') }}</label>

                            <div class="col-md-6">
                                <input id="payment" type="text" class="form-control money" name="payment" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('payments.date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="date" value="" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-secondary float-left" data-dismiss="modal" aria-label="Close">Cancelar</button>
                                <button type="submit" class="btn btn-primary float-right">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
         <script src="{{ asset('js/form.js') }}"></script>
        <script>
            table_api = 'payment/';
            param_api = 'company/{{ Auth::user()->company->id }}';
            dtColumns = [
                { data: 'id' },
                { data: 'supplier' },
                { data: 'description' },
                { data: 'payment' },
                { data: 'date' },
            ];
        </script>
    @endpush
@stop
