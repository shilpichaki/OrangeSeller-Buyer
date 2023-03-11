@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Seller Profile</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                    <h1>{{ Auth::user()->name }}</h1>

                    <p>{{ Auth::user()->description }}</p>

                    <form 
                            id="profileupdate" 
                            method="POST" 
                            action="{{ route('sellerprofile.update',auth()->id()) }}" 
                            enctype="multipart/form-data"
                            class="needs-validation" 
                            role="form"
                            novalidate
                        >
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input class="form-control" type="text" id="name" name="name" value="{{ auth()->user()->name }}" autofocus="" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input class="form-control" type="text" id="email" name="email" value="{{ auth()->user()->email }}" placeholder="john.doe@example.com" readonly>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Description</label>
                                    <input class="form-control" type="text" id="description" name="description" value="{{ auth()->user()->description }}"  autofocus="" >
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="inputImage">Select Image:</label>
                                    <input 
                                        type="file" 
                                        name="image" 
                                        id="inputImage"
                                        class="form-control @error('image') is-invalid @enderror">
                      
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div>
                                        
                                        <img src="{{ asset('images/'. auth()->user()->image) }}" alt="Image" width="300" height="250"/>
                                     </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="button-create me-2">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 