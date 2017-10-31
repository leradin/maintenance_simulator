@extends('layouts.app')


@section('title', 'Usuarios')


@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li>@lang('messages.title_user')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="head">
                        <div class="icon"><span class="icosg-user1"></span></div>
                        <h2>@lang('messages.title_user')</h2>
                        <ul class="buttons">
                            <li><a href="{{ url("user/create") }}"><span class="icosg-plus"></span></a></li>
                        </ul>                         
                    </div>                
                        <div class="block-fluid">
                            <table class="fTable" cellpadding="0" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" class="checkall"/></th>
                                        <th width="25%">Name</th>
                                        <th width="20%">Product</th>
                                        <th width="20%">Status</th>
                                        <th width="20%">Date</th>
                                        <th width="15%" class="TAC">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" name="order[]" value="528"/></td>
                                        <td><a href="#">Dmitry Ivaniuk</a></td>
                                        <td>Product #212</td>
                                        <td><span class="label label-danger">New</span></td>
                                        <td>24/11/2012</td>
                                        <td class="TAC">
                                            <a href="#" class="icon-button"><span class="glyphicon glyphicon-ok"></span></a> 
                                            <a href="#" class="icon-button"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <a href="#" class="icon-button"><span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="order[]" value="527"/></td>
                                        <td><a href="#">John Doe</a></td>
                                        <td>Product #132</td>
                                        <td><span class="label label-danger">New</span></td>
                                        <td>24/11/2012</td>
                                        <td class="TAC">
                                            <a href="#" class="icon-button"><span class="glyphicon glyphicon-ok"></span></a> 
                                            <a href="#" class="icon-button"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <a href="#" class="icon-button"><span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="order[]" value="526"/></td>
                                        <td><a href="#">Alex Fruz</a></td>
                                        <td>Product #53</td>
                                        <td><span class="label label-danger">New</span></td>
                                        <td>23/11/2012</td>
                                        <td class="TAC">
                                            <a href="#" class="icon-button"><span class="glyphicon glyphicon-ok"></span></a> 
                                            <a href="#" class="icon-button"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <a href="#" class="icon-button"><span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                    </tr>   
                                </tbody>
                            </table>                    
                        </div> 
                </div>                         
            </div>
    </div>
@endsection