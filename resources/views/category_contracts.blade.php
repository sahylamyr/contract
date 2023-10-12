@extends('layouts.main')


@section('title', $category->name)

@section('content')

    <div class="module">
        <div class="module-head" style="display: flex; justify-content:space-between; align-items:center;">
            <h3>{{ $category->name }}</h3>

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

                if (confirm('Are you sure?')) {
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
