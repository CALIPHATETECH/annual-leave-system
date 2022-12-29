
<div class="modal fade" id="addStaff" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>NEW STAFF</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('staff.register')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="NAME" value="{{old('name')}}" name="name">
                    </div>
                    
                    
                    <div class="form-group">
                        <input type="email" class="input-group form-control" placeholder="Email" value="{{old('email')}}" name="email">
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="PHONE" value="{{old('phone')}}" name="phone">
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="STAFF ID" value="{{old('staffID')}}" name="staffID">
                    </div>
                    
                    <div class="form-group">
                        <input type="password" class="input-group form-control" placeholder="passowrd" value="{{old('password')}}" name="password">
                    </div>
                
                    
                    <button class="btn btn-primary">REGISTER</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>