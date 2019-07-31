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

            <a href="/register" class="navbar-item">
                Novo Colaborador
            </a>

            <a href="#" class="navbar-item">
                Colaboradores
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a href="#" class="navbar-link">
                    Relatórios
                </a>

                <div class="navbar-dropdown">
                    <a href="#" class="navbar-item">
                        Diário
                    </a>
                    <a href="#" class="navbar-item">
                        Mensal
                    </a>          
                </div>
            </div>
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
<div class="demo">
    <table class="table is-responsive">
    <thead>
        <tr>
        <th>Colaborador</th>
        <th></th>
        <th></th>   
        <th></th>     
      </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td><i class="fas fa-pencil-alt"></i></td>
        <td><i class="fas fa-trash-alt"></i></td>
        <td><a href="/admin/{{ $user->id }}">code</a></td>        
      </tr>
        @endforeach      
    </tbody>
  </table>

</div>


@endsection