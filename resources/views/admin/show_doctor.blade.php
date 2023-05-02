<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
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
            <div align="center" style="font-size: 17px;padding-top:100px;">
                <table style="background-color: black;">
                    <tr>
                        <th style="padding: 7px;">Doctor name</th>
                        <th style="padding: 7px;">Phone</th>
                        <th style="padding: 7px;">Speciality</th>
                        <th style="padding: 7px;">Room No</th>
                        <th style="padding: 7px;">Image</th>
                        <th style="padding: 7px;">Delete</th>
                        <th style="padding: 7px;">Update</th>
                    </tr>

                    @foreach ($data as $doctor)
                    <tr align="center" style="background-color: skyblue;">
                        <td>{{ $doctor-> name}}</td>
                        <td>{{ $doctor-> phone}}</td>
                        <td>{{ $doctor->speciality }}</td>
                        <td>{{ $doctor-> room}}</td>
                        <td><img height="100" width="100" src="/doctorimage/{{ $doctor->image }}" alt=""></td>
                        <td><a onclick="return confirm('are you sure to delete this?')" class="btn btn-danger" href="{{ url('deletedoctor',$doctor->id) }}">Delete</a></td>
                        <td><a class="btn btn-primary" href="{{ url('updatedoctor',$doctor->id) }}">Update</td>
                    @endforeach

                </table>
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