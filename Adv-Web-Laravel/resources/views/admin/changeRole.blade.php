@extends('layouts.afterLoginLayoutAdmin')
@section('content')
<form method="post" action="" >
        
    {{@csrf_field()}}
        Customer ID: <input type="text" name="id" placeholder="id"  readonly value="{{$customer->id}}"><br>

        Username: <input type="text" name="name" placeholder="Name" value="{{$customer->username}}"><br>
        @error('name')
            {{$message}}<br>
        @enderror

        Role: 

        <select name="role" id="role" >
            <option value="SubAdmin">SubAdmin</option>
            <option value="Customer">Customer</option>
        </select>
        
        @error('role')
            {{$message}} <br>
        @enderror
        <br>
        <br>
        <input type="submit" value="  Update  ">
        
    </form>
    @endsection