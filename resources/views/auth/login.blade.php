@extends('layouts.app')
@section('title', 'Login')
@section('content')
 
    <section class="section-content bg padding-y">
        <div class="container">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <header class="card-header" style="background-image: linear-gradient(red,black,teal);">
                        <h4 class="card-title mt-2" style="color:#fff;text-align:center;">Se Connecter ou créer un compte pour gérer vos recettes.</h4>
                    </header>
                    <article class="card-body">
                        <form action="{{ route('login') }}" method="POST" role="form">
                            @csrf
                            <div class="form-group">
                                <label for="email">E-Mail Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row mr-auto">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block"> Login </button>
                            </div>
                        
                        </form>
                    </article>
                    <div class="border-top card-body text-center">Pas encore de compte? <a href="{{ route('register') }}">Créer ici</a></div>
                </div>
            </div>
        </div>
    </section>
@stop