@extends('templates.dashboard_pages_template')
@section('page_title') Profile @endsection
@section('page-content')

                    @include("partials.form_errors")
                        <form role="form" method="POST" action="{{ url('promotion-coupon') }}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="registrationFormCont">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h1 class="formHeadingWithStyle">
                                            <span>Supplier List<span></span></span>
                                        </h1>
                                    
                                  
                                  
                                 
                                    
                                    <div class="col-sm-12">
                                        @if(count($viewReuest)==0)
                                                 <div class="alert alert-warning">
                                                  <strong>No Supplier found!</strong> 
                                                </div>
                                        @else
                                        <div class="box">
                                                <div class="box-body">
                                                  <table id="example2" class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th width="10">No</th>
                                                            <th width="100">Name</th>
                                                            <th width="100">Email</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <input type="hidden" name="id" value="{{$i=0}}"/>
                                                            @foreach ($viewReuest as $supplierlist )

                                                                <tr>
                                                                    <td>{{++$i}}</td>
                                                                    <td>{{$supplierlist->first_name}}{{$supplierlist->last_name}}</td>
                                                                    <td>{{$supplierlist->email}}</td>
                                                                </tr>
                                                            @endforeach

                                                    </tbody>

                                                  </table>
                                                    <div class="row">
                                                        <div class="col-md-12">

                                                        </div>
                                                    </div>

                                                </div><!-- /.box-body -->
                                            </div>
                                         @endif
                                    </div
                                   
                                </div>
                            </div>
                                    
                        </form>
                       
@endsection