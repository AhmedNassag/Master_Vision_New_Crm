<!-- Start Modal -->
<div class="modal fade custom-modal" id="addModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">{{ trans('main.Add') }} {{ trans('main.Category') }}</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate id="add-form">
                    @csrf
                    <!-- name -->
                    <div class="form-group">
                        <label>{{ trans('main.Name') }}</label>
                        <input type="text" class="form-control name" name="name" value="{{ old('name') }}" placeholder="{{ trans('main.Name') }}" required>
                        <div class="valid-feedback">{{ trans('main.Looks Good') }}</div>
                        <div class="invalid-feedback">{{ trans('main.Error Here')}}</div>
                    </div>

                    <!-- parent_id -->
                    <div class="form-group">
                        <label for="parent_id" class="mr-sm-2">{{ trans('main.Parent Category') }} :</label>
                        <select class="form-control select2" name="parent_id">
                            <option value="">{{ trans('main.Without') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary btn-block" id="submitButton" onclick="disableButton()">{{ trans('main.Confirm') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->



{{--
<script>
    function disableButton() {
        document.getElementById('submitButton').disabled = true;
        document.getElementById('add-form').submit();
    }
</script>
--}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Select the form by ID
        var form = document.getElementById('add-form');

        // Listen for the form's submit event
        form.addEventListener('submit', function (event) {
            // Select the button inside the form
            var submitButton = document.getElementById('submitButton');

            // Disable the button to prevent multiple clicks
            submitButton.disabled = true;

            // Optional: Change button text or add loading indicator
            submitButton.innerHTML = '<span class="indicator-label">جاري الحفظ</span>';
        });
    });
</script>
