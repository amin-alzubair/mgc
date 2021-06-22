@extends('layouts.master')

@section('content')
<div id="success" style="display:none;"></div>
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
 <table class="table table-borderless mt-50">
<tbody>
    @foreach($students as $index=>$student)

    <tr>
     <th scope="row">{{$student->id}}</th>
      <td>{{$student->name}}</td>
      <td>{{$student->email}}</td>
      <td>{{$student->stage}}</td>
      <td>
        <button type="button" class="btn btn-danger btn-sm px-3" data-toggle="modal" data-target="#delete-user-{{$student->id}}">
          <i class="fa fa-times"></i>
        </button>
      </td>
    </tr>

<div class="modal fade bd-example-modal-sm" id="delete-user-{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-body">
         <span class="text-danger">هل تريد حذف {{$student->name}}؟</span>
                <button type="button" class="btn btn-success" data-dismiss="modal">الغاء</button>
                <button type="button"  data-id="{{$student->id}}" class="deleteUser btn btn-danger">حذف</button>
            
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

<div
            class="modal fade"
            id="add-category"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">مستخدم جديد</h5>
                  <button
                    type="button"
                    class="btn btn-danger"
                    data-dismiss="modal"
                    aria-label="Close"
                  ><i class="fa fa-times"></i></button>
                </div>
                <div class="modal-body">
                  <form id="studenForm">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('الاسم') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                               
                                   <div id="nameError"></div>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('البريد الالكتروني') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                <div id="emailError"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phoneNumber" class="col-md-4 col-form-label text-md-right">{{ __('رقم الهاتف') }}</label>

                            <div class="col-md-6">
                                <input id="phoneNumber" type="text" class="form-control @error('phoneNumber') is-invalid @enderror" name="phone_number"  autocomplete="new-password">

                                <div id="passwordError"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('تسجيل') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
                </div>


@endsection