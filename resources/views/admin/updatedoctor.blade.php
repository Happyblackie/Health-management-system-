<!DOCTYPE html>
<html lang="en">
  <head>
   <base href="/public">
   @include('admin.css')
   <style>
    label
    {
      display: inline-block;
      width: 200px;
    }
   </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
          @if (session()->has('message'))
              <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert">X</button>
                  {{ session()->get('message') }}
              </div>
          
          @endif
          <div class="container" align="center" style="padding:100px;">

            <form action="{{ url('editdoctor',$data->id) }}" enctype="multipart/form-data" method="POST">
              @csrf
              <div style="padding: 15px;">
                <label for="">Doctor Name</label>
                <input style="color:black;" type="text" name="name" value="{{ $data->name }}">
              </div>
              <div style="padding: 15px;">
                <label for="">Phone</label>
                <input style="color:black;" type="number" name="phone" value="{{ $data->phone }}">
              </div>
              <div style="padding: 15px;">
                <label for="">Speciality</label>
                <input style="color:black;" type="text" name="speciality" value="{{ $data->speciality }}">
              </div>
              <div style="padding: 15px;">
                <label for="">Room</label>
                <input style="color:black;" type="text" name="room" value="{{ $data->room }}">
              </div>
              <div style="padding: 15px;">
                <label for="">Old Image</label>
                <img name="image" height="150" width="150" src="doctorimage/{{ $data->image }}" alt="">
              </div>

              <div class="" style="padding: 15px;">
                <label for="">Change image</label>
                <input type="file" name="file">
              </div>

              <div class="" style="padding: 15px;">
                <input type="submit" class="btn btn-primary">
              </div>
              
              
             
            </form>
          </div>
        </div>
        <!-- page-body-wrapper ends -->
      
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>