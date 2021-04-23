@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                </div>


            </div> -->

            <table class="table" id="table" style="background-color:blueviolet;color:wheat;margin-top:14px;" >
                <thead >
                    <tr>
                         <th>SL</th>
                        <th>App Name</th>
                        <th>Package Name</th>
                        <th width="20%">Icon Url</th>
                    </tr>
                </thead>
                <tbody style="color:blue;">
                    @foreach($data->response->dataset as $key=>$item)
                    <tr>
                        <td  width="20%">{{$key+1}}</td>
                        <td  width="20%">{{$item->app_name}}</td>
                        <td  width="20%">{{$item->package_name}}</td>
                        <td width="20%"><img src="{{$item->icon_url}}" height="70" width=70></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.jqueryui.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/scroller/2.0.3/css/scroller.jqueryui.min.css" rel="stylesheet">
    <!-- data table code  -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    

<script>
    $(document).ready(function() {
        $.noConflict();
    $('#table').DataTable({
        "bPaginate": $('#table tbody tr').length>15,
        "searching": false,
        "bLengthChange": false
    });
} );
</script>


