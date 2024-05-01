<div class="table-responsive-sm">
    <table class="table table-bordered  table-hover table-sm text-center ">
        <thead>
        <tr class="bg-dark text-white" >
            <th scope="col"><i class="fa fa-list"></i></th>
            <th scope="col"><i class="fa fa-user-alt"></i></th>
            <th scope="col"><i class="fa fa-cogs"></i> {{__('Status')}}</th>
            <th scope="col"><i class="fa fa-cogs"></i></th>
        </tr>
        </thead>
        <tbody>
        <?php $i =1; ?>

        @forelse($system_users as $val_system)
            <tr>
                <th class="bg-dark text-white" scope="row">{{$i++}}</th>
                <td>{{$val_system->name}}</td>
                <td>
                    @livewire('switcher', ['model' => $val_system, 'field' => 'status'], key("system-".$val_system->id))
                </td>

                <td>
                    <button class="btn  btn-sm " wire:click="edit({{ $val_system->id }})"><i class="fas fa-edit text-primary"></i></button> &nbsp;
                    <button class="btn btn-sm " onclick="delete_ct({{ $val_system->id }})"><i class="fas fa-trash text-danger"></i></button>

                </td>
            </tr>

        @empty
            <tr>
                <td class="text-danger" colspan="5" scope="row">{{__('There is no data')}}</td>
            </tr>
        @endforelse


        </tbody>
    </table>
</div>
