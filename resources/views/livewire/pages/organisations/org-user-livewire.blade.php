<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    {{-- Success is as dangerous as failure. --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body ">
                            <div class="table-responsive">
                                <table class="table table-striped table-inverse table-responsive-sm">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>Name</th>
                                            <th>Organisation</th>
                                            <th>role</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $item)
                                            <tr>
                                                <td scope="row">{{ $item->user->name }}</td>
                                                <td>{{ $item->org->name }}</td>
                                                <td><span class="badge bg-success">{{ $item->role }}</span></td>
                                                <td><button type="button"
                                                        class="btn btn-outline-primary dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">Options</button>
                                                    <div class="dropdown-menu">
                                                        <a href="" class="dropdown-item"
                                                            wire:click.prevent='change_role({{ $item->user->id }})'>Change
                                                            role</a>

                                                        <a href="" class="dropdown-item">
                                                            @if ($item->user->status == 'active')
                                                                Deactivate
                                                            @else
                                                                Activate
                                                            @endif
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td scope="row" colspan="3">Empty</td>
                                            </tr>
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
</div>
