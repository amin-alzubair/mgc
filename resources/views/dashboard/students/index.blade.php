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
                                <i class="fa fa-plus pr-2"></i>   تسجيل جديد
    </a>
</div>
</div>
 <table class="table table-borderless mt-50" id="student-table">
<tbody>
    @foreach($students as $index=>$student)

    <tr id="tr-{{$student->id}}">
     <th scope="row">{{$student->id}}</th>
      <td>{{$student->name}}</td>
      <td>{{$student->email}}</td>
      <td>{{$student->stage}}</td>
      <td>
        <button type="button" class="btn btn-danger btn-sm px-3" data-toggle="modal" data-target="#delete-student-{{$student->id}}">
          <i class="fa fa-times"></i>
        </button>
      </td>
    </tr>

<div class="modal fade bd-example-modal-sm" id="delete-student-{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-body">
         <span class="text-danger">هل تريد حذف {{$student->name}}؟</span>
                <button type="button" class="btn btn-success" data-dismiss="modal">الغاء</button>
                <button type="button"  data-id="{{$student->id}}" class="deleteStudent btn btn-danger">حذف</button>
            
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