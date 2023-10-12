@extends('admin.layouts.main')


@section('title', 'Kateqoriyalar')

@section('content')

    <div class="module">
        <div class="module-head" style="display: flex; justify-content:space-between; align-items:center;">
            <h3>Kateqoriyalar</h3>
            <div class="">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Əlavə et </a>
            </div>
        </div>
        <div class="module-body">
            <table cellpadding="0" cellspacing="0" border="0"
                class="datatable-1 table table-bordered table-hover table-striped display" width="100%">
                <thead>
                    <tr>
                        <th width="10">#</th>
                        <th>Ad</th>
                        <th>URL</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->slug }}</td>
                            <td width="10">
                                <div style="display: flex">
                                    <a href="{{ route('admin.categories.edit', $item->id) }}" class="btn btn-xs">
                                        <i class="menu-icon icon-edit text-primary"></i>
                                    </a>
                                    &nbsp;
                                    <a href="javascript:void(0)"
                                        data-route="{{ route('admin.categories.delete', $item->id) }}"
                                        class="btn btn-xs category-delete">
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
            $('.category-delete').on('click', function() {
                var route = $(this).attr('data-route')
                var el = this;
                if (confirm('Silmək istədiyinizə əminsiniz??')) {
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
