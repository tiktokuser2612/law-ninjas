  <!-- ========== footer start =========== -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 order-last order-md-first">
              <div class="copyright text-center text-md-start">
                <p class="text-sm">
                  Copyright © 2021
                  <a href="{{url('/dashboard')}}" rel="nofollow"target="_blank">Law Ninjas.</a>
                  All rights reserved.
                </p>
              </div>
            </div>
            <!-- end col-->
            <div class="col-md-6">
              <div class=" terms d-flex justify-content-center justify-content-md-end ">
                <a href="https://lawninjas.co/terms-conditions/" class="text-sm">Term & Conditions</a>
                <a href="https://lawninjas.co/privacy-policy/" class="text-sm ml-15">Privacy & Policy</a>
              </div>
            </div>
          </div>
          <!-- end row -->
        </div>
        <!-- end container -->
      </footer>
      <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{url('public/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('public/assets/js/Chart.min.js')}}"></script>
    <script src="{{url('public/assets/js/dynamic-pie-chart.js')}}"></script>
    <script src="{{url('public/assets/js/moment.min.js')}}"></script>
    <script src="{{url('public/assets/js/jvectormap.min.js')}}"></script>
    <script src="{{url('public/assets/js/world-merc.js')}}"></script>
    <script src="{{url('public/assets/js/polyfill.js')}}"></script>
    <script src="{{url('public/assets/js/main.js')}}"></script>
      <!-- ========= All Javascript files toggle js ======== -->
    <script src="{{url('public/assets/js/toggle-button.js')}}"></script>

    <script>
    
      // =========== chart one start
      const ctx1 = document.getElementById("Chart1").getContext("2d");
      const chart1 = new Chart(ctx1, {
        // The type of chart we want to create
        type: "line", // also try bar or other graph types

        // The data for our dataset
        data: {
          labels: [
            "Jan",
            "Fab",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
          ],
          // Information about the dataset
          datasets: [
            {
              label: "",
              backgroundColor: "transparent",
              borderColor: "#4A6CF7",
              data: [
                600, 800, 750, 880, 940, 880, 900, 770, 920, 890, 976, 1100,
              ],
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#4A6CF7",
              pointBorderColor: "transparent",
              pointHoverBorderColor: "#fff",
              pointHoverBorderWidth: 5,
              pointBorderWidth: 5,
              pointRadius: 8,
              pointHoverRadius: 8,
            },
          ],
        },

        // Configuration options
        defaultFontFamily: "Inter",
        options: {
          tooltips: {
            callbacks: {
              labelColor: function (tooltipItem, chart) {
                return {
                  backgroundColor: "#ffffff",
                };
              },
            },
            intersect: false,
            backgroundColor: "#f9f9f9",
            titleFontFamily: "Inter",
            titleFontColor: "#8F92A1",
            titleFontColor: "#8F92A1",
            titleFontSize: 12,
            bodyFontFamily: "Inter",
            bodyFontColor: "#171717",
            bodyFontStyle: "bold",
            bodyFontSize: 16,
            multiKeyBackground: "transparent",
            displayColors: false,
            xPadding: 30,
            yPadding: 10,
            bodyAlign: "center",
            titleAlign: "center",
          },

          title: {
            display: false,
          },
          legend: {
            display: false,
          },

          scales: {
            yAxes: [
              {
                gridLines: {
                  display: false,
                  drawTicks: false,
                  drawBorder: false,
                },
                ticks: {
                  padding: 35,
                  max: 1200,
                  min: 500,
                },
              },
            ],
            xAxes: [
              {
                gridLines: {
                  drawBorder: false,
                  color: "rgba(143, 146, 161, .1)",
                  zeroLineColor: "rgba(143, 146, 161, .1)",
                },
                ticks: {
                  padding: 20,
                },
              },
            ],
          },
        },
      });

      // =========== chart one end
      </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  @if(Session::has('success'))
<script>
  toastr.options.closeButton = true;
  toastr.options.progressBar = true;
  toastr.options.closeDuration = 100;
  toastr.success("{{ session('success') }}");
</script>
@endif

@if(Session::has('error'))
<script>
  toastr.options.closeButton = true;
  toastr.options.progressBar = true;
  toastr.options.closeDuration = 100;
  toastr.error("{{ session('error') }}");
</script>
@endif

@if(Session::has('info'))
<script>
  toastr.options.closeButton = true;
  toastr.options.progressBar = true;
  toastr.options.closeDuration = 100;
  toastr.info("{{ session('info') }}");
</script>
@endif

@if(Session::has('warning'))
<script>
  toastr.options.closeButton = true;
  toastr.options.progressBar = true;
  toastr.options.closeDuration = 100;
  toastr.warning("{{ session('warning') }}");
</script>
@endif


  </body>
</html>
