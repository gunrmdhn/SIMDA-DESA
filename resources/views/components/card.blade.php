<div class="col-12">
    <div class="card p-sm-5">
        <div class="card-header">
            <h3 class="card-title mx-auto">{{ $title }}</h3>
        </div>
        <div class="card-body">
            <div class="row gy-4">
                {{ $button }}
                <div class="col-sm-12">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>