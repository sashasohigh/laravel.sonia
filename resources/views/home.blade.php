@extends('layout')

@section('main')
<div class="container d-flex align-items-center" style="min-height: 100vh;">
    <div class="row w-100 justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header"> 
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <button id="create" class="btn btn-secondary w-100">Generate</button>
                    </div>
                  </div>
                </div>
                <div class="table_links_wrapper card-body table-responsive p-0" style="max-height: 300px;">
                  {!! $table !!}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#create').on('click', function () {
            $.ajax({
                url: '{{ route('create') }}',
                type: 'GET',
                success: function (data) {
                    var newRow = $('<tr>')
                    .append('<td><a href="' + data.url + '">' + data.link + '</a></td>')
                    .append('<td>' + data.date + '</td>');
                    $('#table_links').show();
                    $('#table_links tbody').append(newRow);
                },
                error: function (xhr, status, error) {
                    console.error('error', xhr, status, error);
                }
            });
        });
    });
</script>
@endsection