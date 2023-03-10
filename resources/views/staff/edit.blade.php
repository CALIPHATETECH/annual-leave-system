
<div class="modal fade" id="edit_{{$staff->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>EDIT {{strtoupper($staff->name)}}</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data" action="{{route('staff.update',[$staff->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="NAME" value="{{$staff->name}}" name="name">
                    </div>
                
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="QUANTITY" value="{{$staff->email}}" name="email">
                    </div>

                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="PPRICE" value="{{$staff->phone}}" name="phone">
                    </div>

                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="STAFF ID" value="{{$staff->staffID}}" name="staffID">
                    </div>

                    <div class="form-group">
                        <input type="passowrd" class="input-group form-control" placeholder="" value="{{old('password')}}" name="passowrd">
                    </div>

                    <button class="btn btn-primary">UPDATE</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>