<a href="{{ $link }}"
   class="list-group-item py-3 {{ $active }} shadow-lg">
    <div class="row">
        <div class="col-auto"><i class="fas {{ $icon }}"></i></div>
        <div class="col">{{ $title }}</div>
        <div class="col-auto">
            {{ $count ?? '' }}
            <i class="fas fa-chevron-right"></i>
        </div>
    </div>
</a>
