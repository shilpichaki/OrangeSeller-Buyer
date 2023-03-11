@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Buyer Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable">
                            <thead>
                                <tr>
                                    <th width="10">
            
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    
                                    
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sellers as $seller)
                                    <tr >
                                        <td>
            
                                        </td>
                                        <td>
                                            {{ $seller->name ?? '' }}
                                        </td>
                                        
                                        <td>
                                            
                                                <a class="btn btn-xs btn-info" href="{{ route('buyer.viewprofile', $seller->id) }}">
                                                    View Profile
                                                </a>
                                            
                                        </td>
            
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 