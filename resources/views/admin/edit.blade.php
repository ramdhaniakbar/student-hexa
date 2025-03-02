@extends('master');

@section('title', 'Edit User')

@section('content')
<div class="page-header">
   <h3 class="page-title">Edit user page</h3>
</div>
<div class="col-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title">Update user</h4>
         <form class="forms-sample" action="/admin/dashboard/update/{{ $users->id }}" method="post">
            @csrf
            <input type="hidden" class="form-control" name="password" value="{{ $users->password }}">
            <div class="form-group">
               <label for="inputName">Name</label>
               <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name"
                  placeholder="Name" value="{{ $users->name }}">
               @error('name')
               <span class="text-red">{{ $message }}</span>
               @enderror
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                  name="email" placeholder="Email" value="{{ $users->email }}">
               @error('email')
               <span class="text-red">{{ $message }}</span>
               @enderror
            </div>
            <div class="form-group">
               <label for="selectRole">Role</label>
               <select name="role" class="form-control" id="selectRole">
                  <option value="Admin" @if($users->role == 'Admin') selected @endif>Admin</option>
                  <option value="Teacher" @if($users->role == 'Teacher') selected @endif>Teacher</option>
                  <option value="Student" @if($users->role == 'Student') selected @endif>Student</option>
               </select>
            </div>
            <button type="submit" class="btn btn-primary mr-2 mt-3">Submit</button>
         </form>
      </div>
   </div>
</div>
@endsection