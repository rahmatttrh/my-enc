
@extends('layouts.app')
@section('title')
      Dashboard
@endsection
@section('content')
   <div class="page-inner mt--5">
      <div class="page-header">
         <h4 class="page-title">Dashboardddd</h4>
      </div>
      <div class="row">
         <div class="col-sm-6 col-md-3">
            <a href="" style="text-decoration: none" data-toggle="tooltip" data-placement="top" title="Total Vessel">
               <div class="card card-stats card-primary card-round">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-5">
                           <div class="icon-big text-center">
                              <i class="flaticon-users"></i>
                           </div>
                        </div>
                        <div class="col col-stats">
                           <div class="numbers">
                              <p class="card-category">Total Employee</p>
                              <h4 class="card-title">450</h4>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-sm-6 col-md-3">
            <a href="#" style="text-decoration: none" data-toggle="tooltip" data-placement="top" title="Total Office">
               <div class="card card-stats card-info card-round">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-5">
                           <div class="icon-big text-center">
                              <i class="flaticon-user"></i>
                           </div>
                        </div>
                        <div class="col col-stats">
                           <div class="numbers">
                              <p class="card-category">Male</p>
                               <h4 class="card-title">320</h4> 
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-sm-6 col-md-3">
            <a href="" style="text-decoration: none" data-toggle="tooltip" data-placement="top" title="Total Material">
               <div class="card card-stats card-secondary card-round">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-5">
                           <div class="icon-big text-center">
                              <i class="flaticon-like"></i>
                           </div>
                        </div>
                        <div class="col col-stats">
                           <div class="numbers">
                              <p class="card-category">Female</p>
                              <h4 class="card-title">130</h4>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-sm-6 col-md-3">
            <a href="#" style="text-decoration: none" data-toggle="tooltip" data-placement="top" title="Total Material Request">
               <div class="card card-stats card-danger card-round">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-5">
                           <div class="icon-big text-center">
                              <i class="flaticon-clock"></i>
                           </div>
                        </div>
                        <div class="col col-stats">
                           <div class="numbers">
                              <p class="card-category">Retired</p>
                              <h4 class="card-title">14</h4> 
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </a>
         </div>
      </div>
      <div class="row">
         <div class="col-md-7">
            <div class="card">
               <div class="card-header">
                  <div class="badge badge-primary">
                     Recent Activities
                  </div>
               </div>
               <div class="card-body">
                  <div class="d-flex">
                     <div class="avatar avatar-online">
                        <span class="avatar-title rounded-circle border border-white bg-info">J</span>
                     </div>
                     <div class="flex-1 ml-3 pt-1">
                        <h5 class="text-uppercase fw-bold mb-1">Form Cuti <span
                              class="text-warning pl-3">pending</span></h5>
                        <span class="text-muted">Rahmat Hidayat</span>
                     </div>
                     <div class="float-right pt-1">
                        <small class="text-muted">8:40 PM</small>
                     </div>
                  </div>
                  <div class="separator-dashed"></div>
                  <div class="d-flex">
                     <div class="avatar avatar-offline">
                        <span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
                     </div>
                     <div class="flex-1 ml-3 pt-1">
                        <h5 class="text-uppercase fw-bold mb-1">Form Lembur<span
                              class="text-success pl-3">pending</span></h5>
                        <span class="text-muted">Ahmad Juantoro</span>
                     </div>
                     <div class="float-right pt-1">
                        <small class="text-muted">1 Day Ago</small>
                     </div>
                  </div>
                  <div class="separator-dashed"></div>
                  <div class="d-flex">
                     <div class="avatar avatar-away">
                        <span class="avatar-title rounded-circle border border-white bg-danger">L</span>
                     </div>
                     <div class="flex-1 ml-3 pt-1">
                        <h5 class="text-uppercase fw-bold mb-1">Form SPT<span
                              class="text-muted pl-3">closed</span></h5>
                        <span class="text-muted">Ari Pratama</span>
                     </div>
                     <div class="float-right pt-1">
                        <small class="text-muted">2 Days Ago</small>
                     </div>
                  </div>
                  <div class="separator-dashed"></div>
                  <div class="d-flex">
                     <div class="avatar avatar-offline">
                        <span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
                     </div>
                     <div class="flex-1 ml-3 pt-1">
                        <h5 class="text-uppercase fw-bold mb-1">Form Lembur<span
                              class="text-success pl-3">open</span></h5>
                        <span class="text-muted">Dareza</span>
                     </div>
                     <div class="float-right pt-1">
                        <small class="text-muted">2 Day Ago</small>
                     </div>
                  </div>
                  <div class="separator-dashed"></div>
                  <div class="d-flex">
                     <div class="avatar avatar-away">
                        <span class="avatar-title rounded-circle border border-white bg-danger">L</span>
                     </div>
                     <div class="flex-1 ml-3 pt-1">
                        <h5 class="text-uppercase fw-bold mb-1">Form Lembur<span
                              class="text-muted pl-3">closed</span></h5>
                        <span class="text-muted">Abdul Fikri</span>
                     </div>
                     <div class="float-right pt-1">
                        <small class="text-muted">2 Days Ago</small>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card">
               <div class="card-header">
                  <div class="badge badge-danger">
                     Chart
                  </div>
               </div>
               <div class="card-body">
                  <div class="chart-container">
                     <canvas id="barChart"></canvas>
                  </div>
               </div>
            </div>
            
         </div>
         <div class="col-md-5">
            <div class="card">
               <div class="card-header">
                  <div class="badge badge-warning">
                     Birthday This Week
                  </div>
               </div>
               <div class="card-body">
                  <div class="d-flex">
                     <div class="avatar avatar-online">
                        {{-- <span class="avatar-title rounded-circle border border-white bg-info">J</span> --}}
                        <img src="{{asset('img/jm_denis.jpg')}}" alt="..." class="avatar-img rounded-circle">
                     </div>
                     <div class="flex-1 ml-3 pt-1">
                        <h5 class="text-uppercase fw-bold mb-1">9 Januari 1995</h5>
                        <span class="text-muted">Rahmat Hidayat</span>
                     </div>
                  </div>
                  <div class="separator-dashed"></div>
                  <div class="d-flex">
                     <div class="avatar avatar-online">
                        {{-- <span class="avatar-title rounded-circle border border-white bg-secondary">P</span> --}}
                        <img src="{{asset('img/chadengle.jpg')}}" alt="..." class="avatar-img rounded-circle">
                     </div>
                     <div class="flex-1 ml-3 pt-1">
                        <h5 class="text-uppercase fw-bold mb-1">11 Januari 1965</h5>
                        <span class="text-muted">Ahmad Juantoro</span>
                     </div>
                     
                  </div>
               </div>
            </div>
            <div class="card">
               <div class="card-header">
                  <div class="badge badge-danger">
                     Contract End This Week
                  </div>
               </div>
               <div class="card-body">
                  <div class="d-flex">
                     <div class="avatar avatar-online">
                        {{-- <span class="avatar-title rounded-circle border border-white bg-info">J</span> --}}
                        <img src="{{asset('img/mlane.jpg')}}" alt="..." class="avatar-img rounded-circle">
                     </div>
                     <div class="flex-1 ml-3 pt-1">
                        <h5 class="text-uppercase fw-bold mb-1">Contract end at 12 June 2023</h5>
                        <span class="text-muted">Abdul Fikri</span>
                     </div>
                  </div>
                  <div class="separator-dashed"></div>
                  <div class="d-flex">
                     <div class="avatar avatar-online">
                        {{-- <span class="avatar-title rounded-circle border border-white bg-secondary">P</span> --}}
                        <img src="{{asset('img/talha.jpg')}}" alt="..." class="avatar-img rounded-circle">
                     </div>
                     <div class="flex-1 ml-3 pt-1">
                        <h5 class="text-uppercase fw-bold mb-1">Contract end at 15 June 2023</h5>
                        <span class="text-muted">Dareza</span>
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   @push('chart-dashboard')
   <script>
       $(document).ready(function() {
         var barChart = document.getElementById('barChart').getContext('2d');

         var myBarChart = new Chart(barChart, {
            type: 'bar',
            data: {
               labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
               datasets : [{
                  label: "Sales",
                  backgroundColor: 'rgb(23, 125, 255)',
                  borderColor: 'rgb(23, 125, 255)',
                  data: [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4],
               }],
            },
            options: {
               responsive: true, 
               maintainAspectRatio: false,
               scales: {
                  yAxes: [{
                     ticks: {
                        beginAtZero:true
                     }
                  }]
               },
            }
         });
      })
   </script>
   @endpush
   
@endsection