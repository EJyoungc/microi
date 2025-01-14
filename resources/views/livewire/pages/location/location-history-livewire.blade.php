<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Locations History</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="list-group pb-2">
                                <a class="list-group-item d-flex justify-content-between align-items-center active">
                                    <div>Device</div>
                                    <div>Latitude</div>
                                    <div>Longitude</div>
                                </a>
                            </div>
                            <div class="list-group">
                                @forelse ($location as $item)
                                    <a onclick="updatemap({{ $item->lati }},{{ $item->long }},'{{ $item->device->name }}')"
                                        class="list-group-item d-flex justify-content-between align-items-center ">
                                        <div>{{ $item->device->name }}</div>
                                        <div>{{ $item->long }}</div>
                                        <div>{{ $item->lati }}</div>
                                    </a>


                                @empty
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        empty
                                    </li>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div style="width: 100%; height:370px" id="map"></div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
