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
                        
                    <h4>{{ $sellerProfile->name }}</h4>

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable">
                            <thead>
                                <tr>
                                    <th width="10">
            
                                    </th>
                                    <th>
                                       Item Name
                                    </th>
                                    <th>
                                        Rate
                                     </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ratecharts as $ratechart)
                                    <tr >
                                        <td>
                                            {{ $ratechart->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ratechart->item_name ?? '' }}
                                        </td>
                                        
                                        <td>
                                            {{ $ratechart->rate ?? '' }}
                                            
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