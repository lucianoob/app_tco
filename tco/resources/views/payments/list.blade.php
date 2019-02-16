@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fas fa-money-bill-alt"></i> {{ __('payments.title') }}</div>

                <div class="card-body">
                    <form action="/payments/list/" method="post" class="form-inline mt-4">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                        <label for="supplier_id">Fornecedores:&nbsp;&nbsp;</label>
                        <select name="supplier_id" id="supplier_id" class="form-control col-8" onchange="this.form.submit()">
                            <option value="">Escolha...</option>
                            @foreach ($suppliers as $p)
                                <option value="{{ $p->id }}" {{ isset($supplier_id) ? ($supplier_id == $p->id ? 'selected' : '') : ''}}>{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </form>
                    @if(count($payments) == 0)
                        <div class="alert alert-danger mt-2">Nenhuma mensalidade cadastrada!</div>
                    @else
                    	<table class="table mt-4 text-center table-striped">
                            <thead>
                                <tr>
                        		<th class="text-left">Id</th>
                                @if (!isset($supplier_id))
                                    <th>{{ __('payments.supplier') }}</th>
                                @endif
                        		<th>{{ __('payments.description') }}</th>
                        		<th>{{ __('payments.payment') }}</th>
                                @if (isset($supplier_id))
                                    <th></th>
                            		<th></th>
                                @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $p)
                                    <tr>
                                        <td class="text-left">{{ $p->id }}</td>
                                        @if (!isset($supplier_id))
                                            <td>{{ $p->supplier }}</td>
                                        @endif
                                        <td>{{ $p->description }}</td>
                                        <td>{{ $p->payment }}</td>
                                        @if (isset($supplier_id))
                                            <td><a href="/payments/edit/{{ $p->id }}"><button class="btn btn-warning">{{ __('payments.edit') }}</button></a></td>
                                            <td><a href="/payments/remove/{{ $p->id }}"><button class="btn btn-danger">{{ __('payments.delete') }}</button></a></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="alert alert-secondary text-right text-muted">
                            Total: R$ {{ $payment_tot }}
                        </div>
                    @endif
                    <hr>
                    @if (isset($supplier_id))
                        <a href="/payments/new/{{ $supplier_id }}" class="btn btn-primary" role="button" aria-disabled="true">{{ __('payments.new') }}</a>
                    @endif
                </div>
                @if (\Session::has('message'))
                    <div class="card-footer alert-success">
                        {{ \Session::get('message') }}
                    </div>
                @endif
            </div>
            
        </div>
    </div>
</div>
@stop