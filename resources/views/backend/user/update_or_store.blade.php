<div id="store_or_update_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close shadow-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h5 class="modal-title"></h5>
            </div>
            <div class="modal-body">
                <form id="store_or_update_form" method="POST">
                    @csrf
                    <input type="hidden" name="update_id" id="update_id">
                    <x-form.inputbox name="name" labelName="Name" required="required"/>
                    <x-form.inputbox type="email" labelName="Email" name="email" required="required"/>
                    <x-form.inputbox name="number" labelName="Mobile No"/>
                    <x-form.inputbox name="address" labelName="Address"/>
                    <x-form.inputbox type="password" name="password" labelName="Password" required="required"/>
                    <x-form.inputbox type="password" name="password_confirmation" labelName="Confirm Password" required="required"/>
                    <x-form.selectbox name="usertype" labelName="User type" required="required">
                        <option value="">Select User type</option>
                        @foreach (USER_TYPE as $key=>$value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </x-form.selectbox>
                    <div class="form-group">
                        <label for="image" class="required">Image</label>
                        <div class="px-0 text-center">
                            <div id="image">

                            </div>
                        </div>
                        <input type="hidden" name="old_image" id="old_image">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-sm btn-primary" id="save-btn"></button>
            </div>
        </div>
    </div>
</div>

