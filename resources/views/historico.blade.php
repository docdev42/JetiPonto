@extends('layouts.app')

@section('content')
<!-- navbar -->
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

<!-- end navbar -->

<div>
    <div class="column">
        <h1>{{ $user->name }}</h1>
        <table class="table is-responsive is-hoverable">
        <thead>
            <tr>
            <th class="has-text-centered">Mês</th>            
            <th class="has-text-centered">Dia</th>
            <th class="has-text-centered">Entrada</th>
            <th class="has-text-centered">Saida Para Almoço</th>
            <th class="has-text-centered">Entrada</th>  
            <th class="has-text-centered">Fim de Expediente</th>             
        </tr>
        </thead>
        <tbody>
            @foreach($histories as $history)
        <tr>
            <td class="has-text-centered">{{ $history->date->month }}</td>
            <td class="has-text-centered">{{ $history->date->day }}</td>
            <td class="has-text-centered">
                @if($history->entramanha != null)
                
                    {{ $history->entramanha->toTimeString() }} 
                
                @endif
            </td>
            <td class="has-text-centered">
                @if($history->saimanha != null) 
                
                    {{ $history->saimanha->toTimeString() }}
                
                @endif
                </td>
            <td class="has-text-centered">
                @if($history->entratarde != null)
                
                    {{ $history->entratarde->toTimeString() }}
                
                @endif
            </td>  
            <td class="has-text-centered">
                @if($history->saitarde != null)
                
                    {{ $history->saitarde->toTimeString() }}</td>             
                
                @endif
        </tr>
            @endforeach      
        </tbody>
        </table>
    </div>
</div>

@endsection