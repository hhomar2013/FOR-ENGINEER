
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
        @forelse($visiting_users as $val_visiting)
            <tr>
                <th class="bg-dark text-white" scope="row">{{$val_visiting->id -1}}</th>
                <td>{{$val_visiting->name}}</td>
                <td>
                    @livewire('switcher', ['model' => $val_visiting, 'field' => 'status'], key("visiting-".$val_visiting->id))
                </td>

                <td>
                    <button class="btn  btn-sm " wire:click="edit({{ $val_visiting->id }})"><i class="fas fa-edit text-primary"></i></button> &nbsp;
                    <button class="btn btn-sm " onclick="delete_ct({{ $val_visiting->id }})"><i class="fas fa-trash text-danger"></i></button>
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
<hr>
<span class="p-3">{{$visiting_users->links()}}</span>
