<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Invites</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <x-modal title="{{ $title }} User" :status="$invite_u">
                                <form action="" wire:submit.prevent='send_invite'>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" class="form-control" placeholder="Email"
                                                wire:model.defer='mail_to'>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control " style="width: 100%;" wire:model='org_name'>
                                            <option></option>
                                            @forelse ($org as $item)
                                                <option>{{ $item->org->name }}</option>
                                            @empty
                                                <option selected="selected" data-select2-id="19">Select Organisation
                                                </option>
                                            @endforelse
                                        </select>

                                    </div>
                                    <button type="submit" class="btn btn-primary">Send Invite</button>
                                </form>
                            </x-modal>
                            <div class="d-flex justify-content-end">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info form-control"
                                        wire:click.prevent='open_modal'>Add</button>
                                </div>
                            </div>
                            <table class="table table-striped table-inverse table-responsive-sm">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>From</th>
                                        <th>to</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($invites as $item)
                                        <tr>
                                            <td scope="row">{{$item->user->name}}</td>
                                            <td>{{ $item->mail_to }}</td>
                                            <td><span
                                                    class="badge text-capitalize h5 @if ($item->seen == '0') bg-danger @else bg-success @endif">
                                                    @if ($item->seen == '0' && $item->status == 'Rejected')
                                                        Pending
                                                    @else
                                                        Rejected
                                                    @endif
                                                </span>
                                            </td>
<td></td>
                                        </tr>
                                    @empty
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
