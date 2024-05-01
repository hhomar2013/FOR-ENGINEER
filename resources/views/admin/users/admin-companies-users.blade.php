<div class="table-responsive-sm">
    <table class="table table-bordered  table-hover table-sm text-center ">
        <thead>
        <tr class="bg-dark text-white" >
            <th scope="col"><i class="fa fa-list"></i></th>
            <th scope="col"><i class="fa fa-user-alt"></i></th>
            <th scope="col"><i class="fa fa-mail-bulk"></i></th>
            <th scope="col"><i class="fa fa-cogs"></i> {{__('Status')}}</th>
            <th scope="col"><i class="fa fa-cogs"></i></th>
        </tr>
        </thead>
        <tbody>
        <?php $i =1; ?>

        @forelse($company_users as $val_companies)

            <tr>
                <th class="bg-dark text-white" scope="row">{{$i++}}</th>
                <td>{{$val_companies->name}}</td>
                <td>{{$val_companies->email}}</td>
                <td>
{{--                    {{$val_company->status}}--}}
                @livewire('switcher', ['model' => $val_companies, 'field' => 'status'], key("company- . $val_companies->id"))

                </td>

                <td>

{{--                    <button class="btn btn-sm " wire:click="edit({{ $val_companies->id }},'company')"><i class="fas fa-edit text-primary"></i></button> &nbsp;--}}
                    <button class="btn btn-sm " onclick="delete_ct({{ $val_companies->id }})"><i class="fas fa-trash text-danger"></i></button>
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
