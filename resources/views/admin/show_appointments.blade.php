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
            <div align="center" style="font-size: 11px;padding-top:100px;">
                <table style="background-color: black;">
                    <tr>
                        <th style="padding: 7px;"> Customer</th>
                        <th style="padding: 7px;">Email</th>
                        <th style="padding: 7px;">Phone</th>
                        <th style="padding: 7px;">Doctor name</th>
                        <th style="padding: 7px;">Date</th>
                        <th style="padding: 7px;">Message</th>
                        <th style="padding: 7px;">Status</th>
                        <th style="padding: 7px;">Approved</th>
                        <th style="padding: 7px;">Cancelled</th>
                    </tr>

                    @foreach ($datas as $data)
                    <tr align="center" style="background-color: skyblue;">
                        <td>{{ $data-> name}}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data-> phone}}</td>
                        <td>{{ $data->doctor }}</td>
                        <td>{{ $data-> date}}</td>
                        <td>{{ $data->message }}</td>
                        <td>{{ $data->status }}</td>
                        <td><a class="btn btn-success" href="{{ url('approved', $data->id) }}">Approved</a></td>
                        <td><a class="btn btn-danger" href="{{ url('canceled',$data->id) }}">Cancelled</a></td>
                    </tr>
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