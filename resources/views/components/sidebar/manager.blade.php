@if (auth()->user()->hasRole('HRD-Spv|HRD|HRD-Recruitment|HRD-Manager'))
<li class="nav-item">
   <a data-toggle="collapse" href="#vessel">
      <i class="fas fa-server"></i>
      <p>Master Data</p>
      <span class="caret"></span>
   </a>
   <div class="collapse" id="vessel">
      <ul class="nav nav-collapse">
         <li>
            <a href="{{route('unit')}}">
               <span class="sub-item">Bisnis Unit</span>
            </a>
         </li>
         <li>
            <a href="{{route('department')}}">
               <span class="sub-item">Department</span>
            </a>
         </li>
         <li>
            <a href="{{route('designation')}}">
               <span class="sub-item">Level</span>
            </a>
         </li>
         <li>
            <a href="{{route('position')}}">
               <span class="sub-item">Jabatan</span>
            </a>
         </li>
         <li>
            <a href="{{route('so')}}">
               <span class="sub-item">Struktur Organisasi</span>
            </a>
         </li>
      </ul>
   </div>
</li>
@endif

<li class="nav-item">
   <a data-toggle="collapse" href="#kpi">
      <i class="fas fa-file-contract"></i>
      <p>Performance</p>
      <span class="caret"></span>
   </a>
   <div class="collapse" id="kpi">
      <ul class="nav nav-collapse">
         @if (auth()->user()->hasRole('HRD-Spv|HRD|HRD-Recruitment'))
         <li>
            <a href="{{route('pe.component')}}">
               <span class="sub-item">Component</span>
            </a>
         </li>
         <li>
            <a href="{{route('discipline')}}">
               <span class="sub-item">Discipline</span>
            </a>
         </li>
         @endif
         <li>
            <a href="{{route('kpi')}}">
               <span class="sub-item">KPI</span>
            </a>
         </li>
         
      </ul>
   </div>
</li>
@if (auth()->user()->hasRole('HRD-Spv|HRD|HRD-Recruitment|HRD-Manager'))
<li class="nav-item">
   <a data-toggle="collapse" href="#employee">
      <i class="fas fa-users"></i>
      <p>Employee</p>
      <span class="caret"></span>
   </a>
   <div class="collapse" id="employee">
      <ul class="nav nav-collapse">
         <li>
            <a href="{{route('employee', enkripRambo('active'))}}">
               <span class="sub-item">Active</span>
            </a>
         </li>
         <li>
            <a href="{{route('employee.nonactive')}}">
               <span class="sub-item">Non Active</span>
            </a>
         </li>
         <li>
            <a href="{{route('employee.draft')}}">
               <span class="sub-item">Draft</span>
            </a>
         </li>
         <li>
            <a href="{{route('employee.import')}}">
               <span class="sub-item">Import by Excel</span>
            </a>
         </li>
         <li>
            <a href="{{route('employee.import.edit')}}">
               <span class="sub-item">Update by Excel</span>
            </a>
         </li>

      </ul>
   </div>
</li>
@endif
<li class="nav-item">
   <a data-toggle="collapse" href="#qpe">
      <!-- <a  href="{{route('qpe')}}"> -->
      <i class="fas fa-file"></i>
      <p>Quick PE</p>
      <span class="caret"></span>
   </a>
   <div class="collapse" id="qpe">
      <ul class="nav nav-collapse">
         <li>
            <a href="{{route('qpe.create')}}">
               <span class="sub-item">Create PE</span>
            </a>
         </li>
         <li>
            <a href="{{route('qpe')}}">
               <span class="sub-item">Daftar PE</span>
            </a>
         </li>
         @if (auth()->user()->hasRole('HRD-Spv|HRD|HRD-Recruitment|HRD-Manager'))
         <li>
            <a href="{{route('qpe.report')}}">
               <span class="sub-item">Monitoring</span>
            </a>
         </li>
         @endif
      </ul>
   </div>
</li>

<li class="nav-item {{ (request()->is('sp/*')) ? 'active' : '' }}">
   <a href="{{route('sp')}}">
      <i class="fas fa-file-code"></i>
      <p>SP</p>
   </a>
</li>

{{-- <li class="nav-item {{ (request()->is('employee/detail/*')) ? 'active' : '' }}">
   <a href="{{route('employee.detail', [enkripRambo(auth()->user()->employee->id), enkripRambo('contract')])}}">
      <i class="fas fa-user"></i>
      <p>My Profile</p>
   </a>
</li>
<li class="nav-item {{ (request()->is('employee/spkl/*')) ? 'active' : '' }}">
   <a href="{{route('manager.spkl')}}">
      <i class="fas fa-clock"></i>
      <p>SPKL</p>
   </a>
</li>

<li class="nav-item {{ (request()->is('employee/spt/*')) ? 'active' : '' }}">
   <a href="{{route('employee.spt')}}">
      <i class="fas fa-briefcase"></i>
      <p>SPT</p>
   </a>
</li>

<li class="nav-item">
   <a href="{{route('employee.detail', [enkripRambo(auth()->user()->employee->id), enkripRambo('contract')])}}">
      <i class="fas fa-calendar"></i>
      <p>Cuti</p>
   </a>
</li>
<li class="nav-item">
   <a href="{{route('employee.detail', [enkripRambo(auth()->user()->employee->id), enkripRambo('contract')])}}">
      <i class="fas fa-hospital"></i>
      <p>Permit</p>
   </a>
</li> --}}