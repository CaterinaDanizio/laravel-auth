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
                            <p>Choose your profile photo</p>
                            <input name="icon" type="file" class="form-control border-0">
                            <input type="submit" class="btn btn-success" value="UPDATE">
                            <a href="{{route('clearIcon')}}" class="btn btn-danger" value="CLEAR">CLEAR</a>

                        </form>
                    </div>

                    
                    @if (Auth::user()-> icon)
                       <div class="card-body">
                            <h3>Here the profile photo you've chosen</h3>
                            <img src="{{ asset('storage/icon/' . Auth::user()->icon )}}" alt="" width="300px">
                       </div> 
                        
                    @else 
                        <div class="card-body">
                            <h3>Here default profile photo</h3>
                            <img src="{{ asset('storage/icon/avatar-placeholder.png')}}" alt="" width="300px">
                       </div>       
                    @endif

                    
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
