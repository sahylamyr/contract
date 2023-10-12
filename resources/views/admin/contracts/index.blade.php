@extends('admin.layouts.main')


@section('title', 'Müqavilələr')

@section('content')

    <div class="module">
        <div class="module-head" style="display: flex; justify-content:space-between; align-items:center;">
            <h3>Müqavilələr</h3>
            <div class="">
                <a href="{{ route('admin.contracts.create') }}" class="btn btn-success">Əlavə et</a>
            </div>
        </div>
        <div class="module-body">
            <table cellpadding="0" cellspacing="0" border="0"
                class="datatable-1 table table-bordered table-hover table-striped display" width="100%">
                <thead>
                    <tr>
                        <th width="10">#</th>
                        <th>Ad</th>
                        <th>Şirkət adı</th>
                        <th>Kateqoriya</th>
                        <th>Fayl</th>
                        <th>Tarix</th>
                        <th>Status</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contracts as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->company }}</td>
                            <td>{{ optional($item->category)->name }}</td>
                            <td><a target="_blank"
                                    href="{{ asset('files/' . optional($item->contract_file)->name) }}">{{ optional($item->contract_file)->original_name }}</a>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($item->date)->translatedFormat('d F Y') }}
                            <td width="10">
                                @if ($item->status)
                                    <i class="menu-icon icon-circle" style="color:green"></i>
                                @else
                                    <i class="menu-icon icon-circle" style="color:gray"></i>
                                @endif
                            </td>
                            <td width="10">
                                <div style="display: flex">
                                    <a href="{{ route('admin.contracts.edit', $item->id) }}" class="btn btn-xs">
                                        <i class="menu-icon icon-edit text-primary"></i>
                                    </a>
                                    &nbsp;
                                    <a href="javascript:void(0)"
                                        data-route="{{ route('admin.contracts.delete', $item->id) }}"
                                        class="btn btn-xs contract-delete">
                                        <i class="menu-icon icon-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            $('.contract-delete').on('click', function() {
                var route = $(this).attr('data-route')
                var el = this;

                if (confirm('Silmək istədiyinizə əminsiniz?')) {
                    $.ajax({
                        url: route,
                        method: "GET",
                        success: function(res) {
                            if (res.status === 200) {
                                $(el).parent().parent().parent().remove()
                            } else {
                                alert('404 not found');
                            }
                        }
                    })
                }
            })
        })
    </script>
@endpush
