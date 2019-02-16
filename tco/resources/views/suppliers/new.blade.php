@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fas fa-building"></i> {{ __('suppliers.title') }}</div>

                <div class="card-body">
                    <form method="post" action="/suppliers/new/0">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('suppliers.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('suppliers.phone') }}</label>

                            <div class="col-md-4">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }} phone" name="phone" required>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('suppliers.save') }}
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
        $('.phone').mask('(00) 0000-0000', {clearIfNotMatch: true});
    });
</script>
@endsection
