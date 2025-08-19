@extends('layouts.master1')

@section('content')
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      @include('layouts.master')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        @include('layouts.sidebar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Form </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('category.create') }}">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Category Form</li>
                </ol>
              </nav>
            </div>
            
              <form action="{{ route('category.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Category Form</h4>
                    @if($errors->any())
                      @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Failed</strong> {{ $error }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                          </button>
                        </div>
                      @endforeach
                    @endif
                    @session('success')
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Success</strong> {{ session('success') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                          </button>
                        </div>
                    @endsession
                    <form class="forms-sample">
                      <div class="form-group mt-5">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" placeholder="Enter your Category Name" name="category_name" value="{{ old('category_name')}}">
                      </div>
                      <div class="form-group">
                        <label for="image">File upload</label>
                        <input type="file" name="image" id="image" class="file-upload-default" value="{{ old('image')}}">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <div class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary py-3" type="button">Upload</button>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="short_desc">Short Description</label>
                        <input type="text" class="form-control" id="short_desc" placeholder="Type here..." name="short_desc">
                      </div>
                      <div class="form-group">
                        <label for="long_desc">Long Description</label>
                        <textarea class="form-control" id="long_desc" name="long_desc" rows="4"></textarea>
                      </div>
                      <button class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <!-- partial -->
        </div>
          @include('layouts.footer')

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <script>
        document.querySelector('.file-upload-browse').addEventListener('click', function() {
        document.querySelector('.file-upload-default').click();
      });

      document.querySelector('.file-upload-default').addEventListener('change', function() {
        document.querySelector('.file-upload-info').value = this.files[0].name;
      });
      </script>
    <!-- container-scroller -->
    <!-- plugins:js -->
@endsection


