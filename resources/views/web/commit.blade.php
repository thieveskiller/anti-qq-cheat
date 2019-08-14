@extends('layouts.app')
@section('js')
    <script>
        var recaptcha;
        var RecaptchaOnloadCallback = function() {
            recaptcha = grecaptcha.render('recaptcha', {
                'sitekey' : '{{ env('RECAPTCHA_SITE_KEY') }}',
                'theme' : 'light',
                'callback' : function () {
                    $('#submit').removeAttr('disabled');
                }
            });
        };
    </script>
    <script src="https://www.recaptcha.net/recaptcha/api.js?onload=RecaptchaOnloadCallback" async defer></script>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">提交盗号网站</div>

                    <div class="card-body">
                        <form method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="url" class="col-md-4 col-form-label text-md-right">URL</label>
                                <div class="col-md-6">
                                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" required autofocus>
                                    @error('url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div id="recaptcha"></div>
                                    @error('recaptcha')
                                       <strong>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button id="submit" type="submit" class="btn btn-primary" disabled>
                                        提交
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
