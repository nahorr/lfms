@extends('layouts.app_user')

@section('content')

<!-- ROW-4 -->
<div class="row mt-xl-5">
  <div class="col-md-12 col-lg-12">
    @include('flash::message')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mr-10"><i class="fa fa-users"></i> Template Category Table</h3>
        <a href="{{ url('/admin/templates/newcategory/'.Auth::user()->company_id) }}" class="btn btn-secondary btn-icon text-white mr-2" style="margin-left: auto">
          <span>
              <i class="fa fa-plus"></i>
          </span> <strong>New Template Category</strong>
        </a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
            <thead>
              <tr>
                <th>#</th>
                <th>Category</th>
                <th>Description</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($templatecategory as $key => $category)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>
                  {{ $category->category_name }} 
                  <a href="{{ asset('/admin/templates/category/showtemplates/'.$company->id) }}/{{$category->id}}">
                    <span class="badgetext badge badge-danger badge-pill">{{$category->templates->count()}}</span>
                  </a>
                </td>
                <td>{{ $category->description }}</td>
                <td>{{ $category->created_at }}</td>
                <td>
                    <a class="btn btn-light" href="{{ asset('/admin/templates/category/showtemplates/'.$category->id)}}" target="_blank" role="button" data-toggle="tooltip" data-placement="top" data-container="body" title="click on file name to view">
                  <i class="fa fa-plus" style="color: Tomato;"></i>
                    </a>
                    <i class="fa fa-pencil"></i>
                    <i class="fa fa-trash"></i>
                </td>
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
