<div class="modal fade" id="modal-delete-edu-{{$edu->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            Delete Educational Background <b>{{$edu->degree}}</b>  {{$edu->major}} {{$edu->name}} ?
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-light border" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger ">
                  <a class="text-light" href="{{route('educational.delete', enkripRambo($edu->id))}}">Delete</a>
            </button>
         </div>
      </div>
   </div>
</div>