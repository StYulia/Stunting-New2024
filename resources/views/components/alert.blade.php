@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="alert-body">
            {{ session('success') }}
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
        </div>
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            {{$errors->first()}}
        </div>
    </div>
@endif

