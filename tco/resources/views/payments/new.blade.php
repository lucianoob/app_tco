@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fas fa-money-bill-alt"></i> {{ __('payments.title') }}</div>

                <div class="card-body">
                    <form method="post" action="/payments/new/0">
                        {{ csrf_field() }}

                        <input id="supplier_id" type="hidden" name="supplier_id" value="{{ $supplier }}">

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('payments.description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required autofocus>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="payment" class="col-md-4 col-form-label text-md-right">{{ __('payments.payment') }}</label>

                            <div class="col-md-3">
                                <input id="payment" type="text" class="form-control{{ $errors->has('payment') ? ' is-invalid' : '' }} money" name="payment" required>

                                @if ($errors->has('payment'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('payment') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('payments.save') }}
                                </button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
            @if (isset($status))
                <div class="alert alert-success" role="alert">
                    {{ $status }}
                </div>
            @endif
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function($){
        $('.money').mask("0.000,00", {reverse: true});
    });
</script>
@endsection
