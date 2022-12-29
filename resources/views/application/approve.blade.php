<div class="modal fade" id="approve_{{$application->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>APROVE {{strtoupper($application->user->name)}} APPLICATION</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data" action="{{route('application.update',[$application->id,'approved'])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <textarea name="coment" id="" cols="30" rows="10" class="input-group form-control" placeholder="Please describe why you need this leave in few sentences">{{old('content')}}</textarea>
                    </div>
                    <button class="btn btn-primary">APPROVE</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>