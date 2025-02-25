@extends('master');

@section('title', 'Teacher')

@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
   {{ session ('success') }}
</div>
@endif
@if (session('danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
   {{ session ('danger') }}
</div>
@endif
<div class="card">
   <div class="card-body">
      <h4 class="card-title">Student User</h4>
       @if ($students->count()) 
       <div class="table-responsive mt-4">
         <table class="table table-bordered mb-4">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($students as $student)
               <tr>
                  <td>{{ $students->firstItem() + $loop->index }}</td>
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->email }}</td>
                  <td>{{ $student->role }}</td>
               </tr>
               @endforeach
            </tbody>
         </table>
         {{ $students->links() }}
      </div>
      @else
      <p class="text-center h4 mt-5 mb-3">No students Found</p>
      @endif
   </div>
</div>
@endsection