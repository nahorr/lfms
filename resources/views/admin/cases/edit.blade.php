@extends('layouts.app_user')

@section('content')

<!-- ROW-1 OPEN -->
<div class="row">
  <div class="col-lg-12">
    @include('flash::message')
    @include('super.formerror')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><i class="fa fa-user"></i> New Case Form</h3>
      </div>
      <div class="card-body">
          <form action="{{ url('/admin/cases/addcase/'.$company->id) }}" method="POST" enctype="multipart/form-data">
            @csrf()
            <div class="form-group">
              <label class="form-label"><strong>Case Number</strong></label>
              <input type="text" class="form-control" id="case_number" name="case_number" required="" value="{{$case->case_number}}">
            </div>
            <div class="form-group">
              <label class="form-label"> Change Client </label>
              <select class="form-control select2-show-search" name="client_id" data-placeholder="Select a Client">
                @foreach($companyclients as $key => $companyclient)
                  <option value="{{ $companyclient->id }}" @if($case->client_id === $companyclient->id ) selected @endif>Client Name: {{ $companyclient->first_name }}:{{ $companyclient->last_name }}</option>
                @endforeach
              </select>
            </div>
            
            <div class="form-group">
              <label class="form-label"><strong>Case Title</strong></label>
              <input type="text" class="form-control" id="case_title" name="case_title" required="" value="{{$case->case_title}}">
            </div>
            <div class="form-group">
              <label class="form-label"><strong>Case Datails and History</strong></label>
              <textarea class="form-control" id="summernote" name="history">{{$case->history}}</textarea>
            </div>
            <div class="form-group">
              <label class="form-label"><strong>Court Date</strong></label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                  </div>
                </div><input class="form-control fc-datepicker" value="{{$case->court_date->format('Y-m-d')}}" type="date" name="court_date">
              </div>
            </div>
            <div class="form-group">
              <label class="form-label"><strong>Court Location</strong></label>
              <input type="text" class="form-control" id="court_location" name="court_location" required="" value="{{$case->court_location}}">
            </div>
          
            <div class="form-group">
              <label class="form-label"><strong>Case outcome</strong></label>
              <input type="text" class="form-control" id="outcome" name="outcome" value="{{$case->outcome}}">
            </div>
            <div class="form-group">
              <label class="form-label"><strong>Assigned Case To</strong></label>
              <select class="form-control select2-show-search" name="user_id" data-placeholder="Assign this case to a lawyer">
                @foreach($companylawyers as $key => $lawyer)
                  <option value="{{ $lawyer->id }}" @if($case->user_id === $lawyer->id ) selected @endif>{{ $lawyer->name }}</option>
                @endforeach
              </select>
            </div>
            <!-- Bootstrap files: add product photos-->
            <div class="form-row">
              <div class="form-group col-md-12">
              <label class="g-mb-5"><strong>Case Files - <span style="color: red">You can add more file for this case.</span></strong></label>
              <p>
                If you wish to view or remove a particuler file please click here:
                <span class="text-danger">
                  @if($case->case_files)
                    <a href="{{ url('/admin/cases/files/showcasefiles', [$case->id, $case->company_id, $case->client_id]) }}" class="btn btn-sm btn btn-outline-info" target="_blank">
                      {{ count(json_decode($case->case_files))}} <i class="fa fa-file"></i> files
                    </a>
                  @else
                    <span class="text-danger">No case File</span>
                  @endif
                </span>

              </p>
              <p>
                
              </p>              
                <div class="form-group">
                  <div class="file-loading">
                      <input id="filename" type="file" name="case_files[]" multiple class="file" data-overwrite-initial="false" data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
                  </div>
                </div>
            </div>
            </div>
            <!-- Bootstrap files: add product photos -->
          <button type="submit" class="btn btn-primary">Add Client</button>
        </form>
      </div>
    </div>
  </div><!-- COL END -->
</div>
<!-- ROW-1 CLOSED -->
@endsection
