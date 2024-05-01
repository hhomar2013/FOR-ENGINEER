<div>
    {{--    Heding Page--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-users-cog">@include('load')</i> {{__('users')}}</h1>
    </div>
    {{--End of Heading Page--}}


    <ul class="nav nav-pills nav-justified">
        <li class="nav-item">
            <a class="nav-link {{$users == '1' ? 'active' : ''}}" wire:click.prevent="show_users(1)" aria-current="page" href="">
                {{__('system users')}} <span class="badge badge-dark">{{$total_system_users > 0 ? $total_system_users : ''}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link  {{$users == '2' ? 'active' : ''}}" wire:click.prevent="show_users(2)" href="">
                {{__('visiting users')}}
                <span class="badge badge-dark">{{$total_visiting_users > 0 ? $total_visiting_users : '' }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{$users == '3' ? 'active' : ''}}" wire:click.prevent="show_users(3)" href="#">
                {{__('Companies')}}
                <span class="badge badge-dark">{{$total_company_users > 0 ? $total_company_users : ''}}</span>
            </a>
        </li>
    </ul>

    <div>
        <br>
        <div class="input-group p-2">
            <div class="input-group-append">

                <span class="input-group-text bg-dark text-white">{{ __('t.pages') }}</span>
                <select class="form-select-sm" wire:model="numbers" wire:change="pages_num">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="500000000000">الكل</option>
                </select>



            </div>

            <div class="col-md-6 ">
                <div class="input-group-append">
                    <span class="input-group-text bg-dark text-white"><i class="fa fa-search"></i></span>
                    <input type="text" name="" id="search" class="form-control" wire:model="search"/>

                </div>
            </div><!--End of search  -->

        </div>
    </div>


    <div class="p-2">
            <br>
            @if($users == 1)
                @include('admin.users.admin-system-users')
            @elseif($users == 2)
                @include('admin.users.admin-visiting-users')
            @elseif($users == 3)
                @include('admin.users.admin-companies-users')
            @endif
        </div>
</div>
