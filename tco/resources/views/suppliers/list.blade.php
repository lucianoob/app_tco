@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fas fa-building"></i> {{ __('suppliers.title') }}</div>

                <div class="card-body">
                    @if(!empty($mensagem))
                        <div class="alert alert-success mt-2">{{ $mensagem }}</div>
                    @endif
                    @if(count($suppliers) == 0)
                        <div class="alert alert-danger mt-2">Nenhum fornecedor cadastrado!</div>
                    @else
                    	<table class="table mt-4 text-center table-striped">
                            <thead>
                                <tr>
                        		<th>Id</th>
                        		<th class="text-left">{{ __('suppliers.name') }}</th>
                        		<th>{{ __('suppliers.phone') }}</th>
                                <th></th>
                        		<th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $p)
                                    <tr>
                                        <td>{{ $p->id }}</td>
                                        <td class="text-left">{{ $p->name }}</td>
                                        <td>{{ $p->phone }}</td>
                                        <td><a href="/suppliers/edit/{{ $p->id }}"><button class="btn btn-warning">{{ __('suppliers.edit') }}</button></a></td>
                                        <td><a href="/suppliers/remove/{{ $p->id }}"><button class="btn btn-danger">{{ __('suppliers.delete') }}</button></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    <hr>
                    <a href="/suppliers/new" class="btn btn-primary" role="button" aria-disabled="true">{{ __('suppliers.new') }}</a>
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