<div>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->

    <!-- Check if image is properly uploaded or not -->
    @if(session()->has('success'))
        <div class="alert alert-success"> {{ session()->get('success') }} </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger"> {{ session()->get('error') }} </div>
    @endif

</div>
