@extends('layouts.app')

@section('content')
        <div id="app">
            <h1>Olá {{ $user->name }}</h1>
            
            <?php $email=$user->email ;
            ?>
            
            <qrscanner email="{{ $user->email }}" id="{{ $user->id }}"></qrscanner>
        </div>        
                
        <form method="post" action="/scan/{{ $user->id }}">
        @csrf
            <button>vai</button>
        </form>
            
            
        
@endsection