@extends('layouts.master')

@section('content')
<div class="modal fade bd-example-modal-sm" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="card">
            <div class="card-body">
            <div class="modal-body">
           <span class="text-success"></span>
        </div>
        </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 mb-30">
        <div class="card">
        <div class="card-body">
        <div class="clearfex">

<div class="float-left text-info">
<span class="text-info">
 <i class="fa fa-group highlight-icon" aria-hidden="true"></i>
</span>
</div>

<div class="float-right">
    <a href="#" data-toggle="modal" data-target="#add-category"
                                class="btn btn-primary btn-block m-t-20">
                                <i class="fa fa-plus pr-2"></i>  اضافة مستخدم
    </a>
</div>
</div>
 <table class="table table-borderless mt-50" id="myTable">
<tbody>
    @foreach($users as $index=>$user)

    <tr id="tr-{{$user->id}}">
     @if(auth()->user()->id != $user->id )
     <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>
        <button type="button" class="btn btn-danger btn-sm px-3" data-toggle="modal" data-target="#delete-user-{{$user->id}}">
          <i class="fa fa-times"></i>
        </button>
      </td>
    </tr>
     @endif
<div class="modal fade bd-example-modal-sm" id="delete-user-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-body">
         <span class="text-danger">هل تريد حذف {{$user->name}}؟</span>
                <button type="button" class="btn btn-success" data-dismiss="modal">الغاء</button>
                <button type="button" data-modal="delete-user-{{$user->id}}" data-id="{{$user->id}}" class="deleteUser btn btn-danger">حذف</button>
            
        </div>
        </div>
    </div>
</div>
    @endforeach
 </tbody>
 </table>
 </div>
 </div>
 </div>
 </div>

@endsection
@section('modal')

@include('layouts.modal')
@endsection