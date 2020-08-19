@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>{{ trans('messages.whoops_something_went_wrong') }} </strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
