@extends('layouts.app')


@section('content')
<section class="hero is-fullheight is-medium is-primary is-bold">
  <div class="hero-body">
    <div class="container">
      <div class="columns is-centered">
        <article class="card is-rounded">
          <div class="card-content">
            <div class="columns is-centered">                                   
              <img src="{{ asset('storage/logo.png') }}" alt="logo" width="200">
            </div>

              <h1 class="title has-text-dark">Bem Vindo {{ Auth::user()->name }}</h1>
            
            <div>
              <a href="/scan/{{ Auth::user()->id }}">
              <button class="button is-primary is-medium is-fullwidth">
              Check-in
              </a>  
            </div>


            <div>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              <button class="button is-primary is-medium is-fullwidth">
                Sair
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>
@endsection
