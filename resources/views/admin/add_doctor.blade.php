<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
    label
    {
        display: inline-block;
        width: 150px;
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
            <div class="container" align="center" style="padding-top: 100px;">
               
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                        {{ session()->get('message') }}
                    </div>
                
                @endif

                <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding: 15px">
                        <label for="">Doctor Name</label>
                        <input type="text" placeholder="Write name" name="name" style="color: black" required>
                    </div>

                    <div style="padding: 15px">
                        <label for="">Phone</label>
                        <input type="number" placeholder="Write number" name="number" style="color: black" required>
                    </div>

                    <div style="padding: 15px">
                        <label for="speciality">Speciality</label>
                        <select name="speciality" id="speciality" style="color: black;">
                            <option value="">--select---</option>
                            <option value="skin">Skin</option>
                            <option value="heart">Heart</option>
                            <option value="eye">Eye</option>
                            <option value="nose">Nose</option>      
                        </select>
                    </div>

                    <div style="padding: 15px">
                        <label for="room">Room number</label>
                        <input type="text" placeholder="Enter romm number" name="room" style="color: black" required>
                    </div>

                    <div style="padding: 15px">
                        <label for="">Doctor Image</label>
                       <input type="file" name="file" required>
                    </div>

                    <div style="padding: 15px">
                        
                       <input type="submit" class="btn btn-success">
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