@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are successfully logged in!') }}
                </div>

                <div class="card-header">{{ __('Profile image') }}</div>

                    <div class="card-body">
                        <form action="{{route('updateIcon')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <input name="icon" type="file" class="form-control border-0">
                            <input type="submit" value="SUBMIT">
                        </form>
                    </div>

                    
                    @if (Auth::user()-> icon)
                       <div class="card-body">
                            <h1>Here the profile photo you've chosen</h1>
                            <img src="{{ asset('storage/icon/' . Auth::user()->icon )}}" alt="">
                       </div> 
                        
                    @else 
                        <div class="card-body">
                            <h1>Here default profile photo</h1>
                            <img src="{{ asset('storage/icon/avatar-placeholder.png')}}" alt="">
                       </div>       
                    @endif

                    
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
