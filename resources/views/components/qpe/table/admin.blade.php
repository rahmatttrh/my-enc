<div class="table-responsive">
   <table id="basic-datatables" class="display basic-datatables table-sm table-striped ">
       <thead>
           <tr>
               <th class="text-white text-center" style="width: 20px">No </th>
               
               <th>ID</th>
               <th>NIK</th>
               <th class="text-white">Employe</th>
               <th class="text-white">Semester</th>
               <th class="text-white text-center">KPI</th>
               <th class="text-white text-center">Behavior</th>
               <th class="text-white text-center">Discipline</th>
               <th class="text-white text-center">Achievement</th>
               <th class="text-white">Status</th>
               <th class="text-right text-white">Action</th>
           </tr>
       </thead>
       <tbody>
         @foreach ($pes->sortByDesc('updated_at') as $pe)
            <tr>
               <td class="text-center">{{++$i}} </td>
               <td>
                  @if (auth()->user()->hasRole('Administrator'))
                     {{$pe->id}} 
                  @endif
               </td>
               <td>
                  @if($pe->status == '0' || $pe->status == '101')
                  <a href="/qpe/edit/{{enkripRambo($pe->kpa->id)}}">{{$pe->employe->nik}}  </a>
                  @elseif($pe->status == '1' || $pe->status == '202' )
                  <a href="/qpe/approval/{{enkripRambo($pe->kpa->id)}}">{{$pe->employe->nik}}  </a>
                  @else
                  <a href="/qpe/show/{{enkripRambo($pe->kpa->id)}}">{{$pe->employe->nik}}  </a>
                  @endif
               </td>
               <td>
                  @if($pe->status == '0' || $pe->status == '101')
                  <a href="/qpe/edit/{{enkripRambo($pe->kpa->id)}}">{{$pe->employe->biodata->fullName()}} </a>
                  @elseif($pe->status == '1' || $pe->status == '202' )
                  <a href="/qpe/approval/{{enkripRambo($pe->kpa->id)}}">{{$pe->employe->biodata->fullName()}} </a>
                  @else
                  <a href="/qpe/show/{{enkripRambo($pe->kpa->id)}}">{{$pe->employe->biodata->fullName()}} </a>
                  @endif
               </td>
               <td>{{$pe->semester}} / {{$pe->tahun}}</td>
              
               <td class="text-center">
                  <span class="">{{$pe->kpi}}</span>
               </td>
               <td class="text-center">
                  <span class="">{{$pe->behavior}}</span>
               </td>
               <td class="text-center">
                  <span class="">{{$pe->discipline}}</span>
               </td>
               <td class="text-center">
                  {{-- <span class="badge badge-primary badge-lg"><b>{{$pe->achievement}}</b></span> --}}
                  <span class="">{{$pe->achievement}}</span>
               </td>
               <td>
                  <x-status.qpe-plain :pe="$pe" />
               </td>
               {{-- @if($pe->status == 0)
               <td><span class="badge badge-dark badge-lg"><b>Draft</b></span></td>
               @elseif($pe->status == '1')
               <td>
                  @if (auth()->user()->hasRole('Manager'))
                  <span class="badge badge-warning badge-lg"><b>Perlu Diverifikasi</b></span>
                  @else
                  <span class="badge badge-warning badge-lg"><b>Verifikasi Manager</b></span>
                  @endif
               </td>
               @elseif($pe->status == '2')
               <td><span class="badge badge-success badge-lg"><b>Done</b></span></td>
               @elseif($pe->status == '3')
               <td><span class="badge badge-primary badge-lg"><b>Validasi HRD</b></span></td>
               @elseif($pe->status == '101')
               <td><span class="badge badge-danger badge-lg"><b>Di Reject Manager</b></span></td>
               @elseif($pe->status == '202')
               <td><span class="badge badge-warning badge-lg"><b>Need Discuss</b></span></td>
               @endif --}}
               <td class="text-right">
                  @if($pe->status == 0)
                  <!-- <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{$pe->id}}"><i class="fas fa-trash"></i> Delete</button> -->
                  @elseif(($pe->status == '1' || $pe->status == '2' || $pe->status == '101' || $pe->status == '202') && $pe->behavior > 0)
                  <a href="{{ route('export.qpe', $pe->id) }}" target="_blank">PDF</a>
                  @elseif(($pe->status == 0 || $pe->status == 101 || $pe->status == 202) && auth()->user()->hasRole('Leader'))
                  <!-- <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-submit-{{$pe->id}}"><i class="fas fa-rocket"></i> Submit</button> -->
                  @endif
               </td>
            </tr>
            <x-modal.submit :id="$pe->id" :body="'KPI ' . $pe->employe->biodata->fullName() . ' bulan '. date('F Y', strtotime($pe->date))   " url="" />
            <x-modal.delete :id="$pe->id" :body="'KPI ' . $pe->employe->biodata->fullName() . ' bulan '. date('F Y', strtotime($pe->date))   " url="qpe/delete/{{$pe->id}}" />
         @endforeach
       </tbody>
   </table>
</div>