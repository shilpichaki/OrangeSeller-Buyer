@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Rate Chart</div>

                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('ratecharts.create') }}"> Add Ratechart</a>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div></div>
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
                                            Rate
                                        </th>
                                        
                                        <th>
                                            &nbsp;
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ratecharts as $ratechart)
                                        <tr >
                                            <td>
                
                                            </td>
                                            <td>
                                                {{ $ratechart->item_name ?? '' }}
                                            </td>
                                            <td>
                                                {{ $ratechart->rate ?? '' }}
                                            </td>
                                            
                                            <td>
                                                <form action="{{ route('ratecharts.destroy',$ratechart->id) }}" method="POST">
                                                
                                                    <a class="btn btn-xs btn-info" href="{{ route('ratecharts.edit', $ratechart->id) }}">
                                                        Edit
                                                    </a>

                                                    @csrf
                                                    @method('DELETE')
                                    
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                                
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