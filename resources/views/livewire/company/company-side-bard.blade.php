<div>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/company">
        <div class="sidebar-brand-icon 1rotate-n-15">
            @if(auth()->user()->logo == null)
                <i class="fa fa-tools"></i>
            @else

                <small><img src="{{ asset('storage/'.auth()->user()->logo)}}" class="rounded-circle" style="height: 60px;width: 60px"></small>
            @endif

        </div>
        <div class="sidebar-brand-text mx-3">{{auth()->user()->name}}<sup></sup></div>
    </a>
</div>

