<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add Form</title>
</head>
<body>
  @extends('layouts.main')
  @section('add-form')
  
  @if(Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ Session::get('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  
  
  <div class="card">
    <div class="card-header">
      Add User Form
    </div>
    <div class="card-body">
      <form action="{{ route('user.add.auth') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Name: </label>
          <input type="text" name="name" value="{{ old('name') }}" class="form-control" required autofocus>
          @error('name')
            <span style="color:red">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="email">Email: </label>
          <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
          @error('email')
            <span style="color:red">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="password">Password: </label>
          <input type="password" name="password" value="{{ old('password') }}" class="form-control" required>
          @error('password')
            <span style="color:red">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="password_confirmation">Confirm Password: </label>
          <input type="password" name="password_confirmation" class="form-control" required>
          @error('password_confirmation')
            <span style="color:red">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="role">Role: </label>
          <select name="role" value="" class="form-control">
            <option value="user" selected>User</option>
            <option value="admin">Admin</option>
          </select>
          @error('role')
            <span style="color:red">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <button type="reset" class="btn btn-danger">Clear</button>
          <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to proceed?')">Submit</button>
        </div>
      </form>
    </div>
  </div>
  
  @stop
</body>
</html>