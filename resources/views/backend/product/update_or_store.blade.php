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
                    <x-form.textarea name="description" labelName="Description" required="required" rows="4" cols="50"/>
                    <x-form.inputbox name="price" labelName="Price" required="required"/>
                    <x-form.inputbox name="pre_price" labelName="Previous Price" required="required"/>
                    <x-form.inputbox name="quantity" labelName="Quantity" required="required"/>
                    <x-form.inputbox name="weight" labelName="Weight" required="required"/>
                    <x-form.selectbox name="category_id" labelName="Category">
                        <option value="">Select Category</option>
                        @foreach ($category as $kay=>$value)
                            <option value="{{ $kay }}">{{ $value }}</option>
                        @endforeach
                    </x-form.selectbox>
                    <x-form.selectbox name="available" labelName="Available">
                        <option value="">Select Stock</option>
                        @foreach (STOCK as $kay=>$value)
                            <option value="{{ $kay }}">{{ $value }}</option>
                        @endforeach
                    </x-form.selectbox>
                    <x-form.selectbox name="status" labelName="Status">
                        <option value="">Select Status</option>
                        @foreach (STATUS as $kay=>$value)
                            <option value="{{ $kay }}">{{ $value }}</option>
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

