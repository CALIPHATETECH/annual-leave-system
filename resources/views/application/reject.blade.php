<div class="modal fade" id="reject_{{$application->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>REJECT {{strtoupper($application->user->name)}} APPLICATION</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data" action="{{route('application.update',[$application->id,'rejected'])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <textarea name="comment" id="" cols="30" rows="10" 
                        class="input-group form-control" placeholder="Please leave the rejection coment for this staff to read">{{old('content')}}</textarea>
                    </div>
                    <button class="btn btn-primary">REJECT</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>