@extends('layouts.app')

@section('content')
        <div id="app">          
            <div class="column is-mobile">
            <qrscanner email="{{ $user->email }}" user="{{ $user->name }}" id="{{ $user->id }}"></qrscanner>
                
            </div>
        </div>  
        
@endsection