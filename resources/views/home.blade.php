@extends('layouts.app')


@section('content')
<section class="hero is-fullheight is-medium is-jeti is-bold ">
  <div class="hero-body">
    <div class="container">
      <div class="columns is-centered">
        <article class="card is-rounded">
          <div class="card-content">
            <div class="columns is-centered is-mobile">                                   
              <img src="{{ asset('storage/logo.png') }}" alt="logo" width="200">
            </div>

              <h1 class="title has-text-dark has-text-centered">Bem Vindo {{ Auth::user()->name }}</h1>
            
            <div>
              <a href="/scan/{{ Auth::user()->id }}">
              <button class="button is-jeti is-medium is-fullwidth">
              <p class="is-white">Check-in</p>
              </a>  
            </div>


            <div>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              <button class="button is-jeti is-medium is-fullwidth">
              <p class="is-white">Sair</p>
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
