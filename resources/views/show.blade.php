@extends('layouts.app')

@section('content')
<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <img src="https://www.jetimob.com/wp-content/uploads/2018/09/logo-jetimob-branco.png" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="true" data-target="navbar">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbar" class="navbar-menu">
        <div class="navbar-start">
            <a href="/" class="navbar-item">
                Home
            </a>

            <a href="/admin" class="navbar-item">
                Colaboradores
            </a>

            <a href="/register" class="navbar-item">
                Novo Colaborador
            </a>

            <a href="/admin/relatorio/{{ $date }}" class="navbar-item">
                Relatório do Dia
            </a>
                        
        </div>

        <div class="navbar-start nav-right" >
            <div class="navbar-item has-dropdown is-hoverable">
                <a id="navbarDropdown" class="navbar-link">
                    {{ Auth::user()->name }}
                </a>

                <div class="navbar-dropdown">
                    <a class="navbar-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Sair') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                    </li>                        
                </ul>
            </div>
        </div>    
    </div>
</nav>

<div class="container">
    <div class="card">
        <div class="card-content">
            <div class="level section">
                <div class="level-left">
                    <div class="level-item">
                    <p class="title is-4">{{ $user->name }}</p>
                    </div>
                </div>

                <div class="level-right">
                    <div class="level-item">
                        {!! QrCode::size('500')->generate($user->email); !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection