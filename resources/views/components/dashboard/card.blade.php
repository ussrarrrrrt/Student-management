@props(['title', 'value', 'icon', 'class' => 'bg-primary'])

<div class="col-md-6 col-xl-3">
    <div class="card text-white {{ $class }} shadow-sm">
        <div class="card-body d-flex align-items-center">
            <i class="bi {{ $icon }} fs-1 me-3 opacity-75"></i>
            <div>
                <h6 class="text-uppercase fw-light mb-1">{{ $title }}</h6>
                <h3 class="fw-bold mb-0">{{ $value }}</h3>
            </div>
        </div>
    </div>
</div>