@extends('layouts.app_user')

@section('content')

<!-- ROW-4 -->
<div class="row mt-xl-5">
  <div class="col-md-12 col-lg-12">
    @include('flash::message')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mr-10"><i class="fa fa-lawyer"></i> Lawyers Table</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Comapny</th>
                <th>Designation</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($companylawyers as $lawyer)
              <tr>
                <td>{{ $lawyer->id }}</td>
                <td>{{ $lawyer->name }}</td>
                <td>{{ $lawyer->email }}</td>
                <td>{{ $lawyer->company->company_name }}</td>
                <td>{{ $lawyer->designation }}</td>
                <td>{{ $lawyer->created_at->toFormattedDateString()}}</td>
                <td>
                <a href="{{ url('/admin/lawyers/delete/'.$lawyer->id) }}" id="delete_lawyer-{{$lawyer->id}}" class="btn btn-default btn-sm" data-toggle="tooltip" data-original-title="Delete" 
                  onclick="
                  return confirm('Are you sure you want to Delete this lawyer?')
                       event.preventDefault();
                       document.getElementById( "delete_lawyer-{{$lawyer->id}} ").submit();
                  "><i class="fa fa-trash-o"></i>
                  
                </a>
                <form id="delete_lawyer-{{$lawyer->id}}" action="{{ url('/admin/lawyers/delete/'.$lawyer->id) }}" method="POST" style="display: none;">
                    @csrf
                </form>
                
                <a href="" class="btn btn-default btn-sm" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                
                </td>
                </tr>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ROW-4 CLOSED-->

@endsection
