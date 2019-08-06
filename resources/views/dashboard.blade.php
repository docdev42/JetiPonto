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

<!-- end navbar -->

<div class="container">
    <table class="table is-responsive">
        <thead>
            <tr>
            <th class="has-text-centered">Colaborador</th>
            <th class="has-text-centered">Relatórios</th>
            <th class="has-text-centered">Editar Informações</th>
            <th class="has-text-centered">Apagar Colaborador</th>             
        </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
        <tr>
            <td class="has-text-centered">{{ $user->name }}</td>
            <td class="has-text-centered"><a href="/admin/{{ $user->id }}/relatorio"><button class="btn"><i class="far fa-address-book is-size-4"></i></button></a></td>
            <td class="has-text-centered"><a href="/admin/{{ $user->id }}"><button class="btn"><i class="fas fa-pencil-alt is-size-4"></i></button></a></td>
            <td class="has-text-centered">
                <form method="POST" action="/admin/{{ $user->id }}" >
                    @method('DELETE')
                    @csrf
                    <button class="btn" type="submit"><i class="fas fa-trash-alt is-size-4"></i></button>
                </form>   
            </td>             
        </tr>
            @endforeach      
        </tbody>
    </table>
</div>


@endsection