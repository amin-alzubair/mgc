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
                                <i class="fa fa-plus pr-2"></i>  اضافة مستخدم
    </a>
</div>
</div>
 <table class="table table-borderless mt-50">
<tbody>
    @foreach($users as $index=>$user)

    <tr>
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
                  <form id="userForm">
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
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('كلمة المرور') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                <div id="passwordError"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('تاكيد كلمة المرور ') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('اضافة') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
                </div>


@endsection