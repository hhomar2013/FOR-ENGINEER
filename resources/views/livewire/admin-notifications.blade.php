<div>
    <li class="nav-item dropdown no-arrow mx-1" wire:poll.debounce.1000ms="get_notification" wire:ignore.self>
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            @if(!empty($notifications) && sizeof($notifications) > 0)
                <span class="badge badge-danger badge-counter">{{$notifications->count() > 0 ? '+' . $notifications->count() : ''}}</span>
            @else
                <span class="badge"></span>
            @endif
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown" wire:ignore.self>
            <h6 class="dropdown-header">
                {{__('Alerts Center')}}
            </h6>
            @if(!empty($notifications) && sizeof($notifications) > 0)
                @forelse($notifications as $notification_data)
                    <a class="dropdown-item d-flex align-items-center" href="#" >
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">{{\Carbon\Carbon::parse($notification_data->updated_at)->diffForHumans()}}</div>
                            <span class="font-weight-bold">{{__('You Have New Order') . ': '. $notification_data['order_refrence']}}</span>
                        </div>
                    </a>
                @empty
                    <a class="dropdown-item d-flex align-items-center">
                        <span class="text-center">{{__('There are no notifications')}}</span>
                    </a>
                @endforelse

            @endif


            {{--                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>--}}
        </div>

    </li>
</div>

<script>
    document.addEventListener("livewire:load", () => {
        @this.on('play_notify', () => {
            new Audio("{{url('asset/img/new-not.mp3')}}").play();
        })
    });


</script>
<script>
    window.addEventListener("livewire:load", function () {
        Livewire.emit("play_notify");
    });
</script>
