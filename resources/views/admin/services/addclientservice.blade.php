@extends('layouts.app_user')

@section('content')

<!-- ROW-1 OPEN -->
<div class="row">
  <div class="col-lg-12">
    @include('flash::message')
    @include('super.formerror')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><i class="fa fa-user"></i> New Client {{$service->service_name}} Form</h3>
      </div>
      <div class="card-body">
          <form action="{{ url('/admin/services/addnewclientservice',[$company->id, $service->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf()
            <div class="form-group">
              <label class="form-label"> Select a Client </label>
              <select class="form-control select2-show-search" name="client_id" data-placeholder="Select a Client">
                @foreach($companyclients as $key => $client)
                  <option value="{{ $client->id }}">Client #: {{ $client->client_number }}; Client Name: {{ $client->first_name }}:{{ $client->last_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label class="form-label"><strong>Service Number</strong></label>
              <input type="text" class="form-control" id="service_number" name="service_number" required="" placeholder="Enter the service number">
            </div>
            <div class="form-group">
              <label class="form-label"><strong>Service Title</strong></label>
              <input type="text" class="form-control" id="service_title" name="service_title" required="" placeholder="service Title">
            </div>
            <div class="form-group">
              <label class="form-label"><strong>Service Datails/History</strong></label>
              <textarea class="form-control" id="summernote" name="service_details" placeholder="service Details and History"></textarea>
            </div>
            <div class="form-group">
              <label class="form-label"><strong>Effective Date</strong></label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                  </div>
                </div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name="effective_date" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="form-label"><strong>Assign Service To:</strong></label>
              <select class="form-control select2-show-search" name="user_id" data-placeholder="Assign this service to a lawyer">
                @foreach($companylawyers as $key => $lawyer)
                  <option value="{{ $lawyer->id }}">{{ $lawyer->name }}</option>
                @endforeach
              </select>
            </div>
            <!-- Bootstrap files: add product photos-->
            <div class="form-row">
              <div class="form-group col-md-12">
              <label class="g-mb-5"><strong>Service Files - <span style="color: red">You can add more than one files at the same time.</span></strong></label>               
                <div class="form-group">
                  <div class="file-loading">
                      <input id="filename" type="file" name="service_files[]" multiple class="file" data-overwrite-initial="false" data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
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
<script type="text/javascript">
    $("#filename").fileinput({
        theme: 'fa',
        allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif', 'svg'],
        overwriteInitial: false,
        maxFileSize:2000,
        maxFilesNum: 10,
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });
</script>
@endsection
