@extends('layouts.hotel')

@section('content')
<div class="wrapper wrapper-content  animated fadeInRight">
  <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>
                        {{strtoupper($organization->name)}}
                        HOTEL BRANCHES 
                    </h5>                                    
                </div>
                <div class="ibox-content">                     
                <!-- Begin Content Here--> 
                <div class=" row ">
                    <div class="panel blank-panel">
                        <div class="panel-heading">                            
                            <div class="panel-options">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-laptop"></i>Branches</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-desktop"></i>Reservations</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-3"><i class="fa fa-signal"></i>Performance</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-4"><i class="fa fa-bar-chart-o"></i>History Log</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active"> 
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Date Created</th>
                                            <th>Branch Action</th>                        
                                        </tr>
                                        </thead>
                                        <tbody> 
                                            
                                        </tbody>                                     
                                    </table>                             
                                </div>

                                <div id="tab-2" class="tab-pane">
                                    
                                </div>
                                <div id="tab-3" class="tab-pane">
                                    
                                </div>
                                <div id="tab-4" class="tab-pane">
                                                                        
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!--End Content Here-->                
               </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection
