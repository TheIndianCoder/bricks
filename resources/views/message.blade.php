@if ($message = Session::get('success'))
    <div id="alertMessage" class="alert alert-success alert-dismissible" role="alert">
        <i class="mdi mdi-check-all me-2"></i>
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <i class="mdi mdi-check-all me-2"></i>
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
@endif
@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        <i class="mdi mdi-check-all me-2"></i>
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
@endif


<script>
    // $(document).ready(function () {
    //     setTimeout(() => {
    //         $('.alert').alert('close');
    //     }, 3000);
    // });    
</script>

{{-- <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="return isDelete('{{route('admin.unit.delete', Crypt::encrypt($item->id))}}')">Delete</a> --}}
<script>

</script>