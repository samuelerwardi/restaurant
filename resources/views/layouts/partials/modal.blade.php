@if(!empty($errors->getMessageBag()->getMessages()))
    <div class="modal" id="modal-message">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" id="" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Default Modal</h4>
                </div>
                <div class="modal-body">
                    <?php
                    //                dump($errors->getMessageBag()->getMessages());

                    ?>
                    @foreach ($errors->getMessageBag()->getMessages() as $key => $value)
                        <p>
                            <label>{{ $key }}</label> :
                            @foreach($value as $keyMessage => $valueMessage)
                                <label>{{ $valueMessage }}</label>
                            @endforeach
                        </p>
                    @endforeach
                </div>
                <div class="modal-footer">
                    {{--                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>--}}
                    {{--                <button type="button" class="btn btn-primary">Save changes</button>--}}
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endif