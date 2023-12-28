@extends('layout')

@section('main')
<div class="container-fluid d-flex align-items-center" style="min-height: 100vh;">
    <div class="row w-100 justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-header"> 
                  <div class="card-tools d-flex justify-content-between">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <button id="create" class="btn btn-secondary w-100">Generate new link</button>
                    </div>
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <a href="{{ route('deactivate', ['id' => $page->id]) }}" id="deactivate" class="btn btn-danger w-100">Deactive current link</a>
                    </div>
                  </div>
                </div>
                <div class="card-body table-responsive p-0" style="max-height: 300px;">
                    <table id="table_links" class="table table-head-fixed text-nowrap" style="display: none;">
                      <thead>
                        <tr>
                            <th>URL</th>
                            <th>Expire Date</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header"> 
                  <div class="card-tools d-flex justify-content-center">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <button id="random" class="btn btn-success w-100">Imfeelinglucky</button>
                    </div>
                  </div>
                </div>
                <div class="random_result_wrapper card-body table-responsive p-0" style="max-height: 300px;">
                    
                  </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header"> 
                  <div class="card-tools d-flex justify-content-center">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <button id="history" class="btn btn-warning w-100">History</button>
                    </div>
                  </div>
                </div>
                <div class="table_history_wrapper card-body table-responsive p-0" style="max-height: 300px;">
                    
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

        $('#random').on('click', function () {
            $.ajax({
                url: '{{ route('game') }}',
                type: 'GET',
                success: function (data) {
                    console.log(data);
                    $('.random_result_wrapper').html(data);
                },
                error: function (xhr, status, error) {
                    console.error('error', xhr, status, error);
                }
            });
        });

        $('#history').on('click', function () {
            $.ajax({
                url: '{{ route('history') }}',
                type: 'GET',
                success: function (data) {
                    console.log(data);
                    $('.table_history_wrapper').html(data);
                },
                error: function (xhr, status, error) {
                    console.error('error', xhr, status, error);
                }
            });
        });
    });
</script>
@endsection