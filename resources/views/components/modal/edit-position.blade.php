<div class="modal fade" id="modal-edit-position-{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Edit Position</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="{{route('position.update')}}" method="POST" >
            <div class="modal-body">
               @csrf
               @method('PUT')
                  {{-- <input type="number" name="employee" id="employee" value="{{$employee->id}}" hidden> --}}
                  
                  <input type="number" name="position" id="position" value="{{$id}}" hidden>
                  <div class="form-group form-group-default">
                     <label>Designation</label>
                     <select class="form-control" id="designation"  name="designation">
                        @foreach ($designations as $desig)
                        <option {{$pos->designation_id == $desig->id ? 'selected' : ''}}  value="{{$desig->id}}">{{$desig->name}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group form-group-default">
                     <label>Position Name</label>
                     <input type="text" class="form-control"  name="name" id="name" value="{{$pos->name}}"  >
                  </div>
                  
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-light border" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-dark ">Update</button>
            </div>
         </form>
      </div>
   </div>
</div>

