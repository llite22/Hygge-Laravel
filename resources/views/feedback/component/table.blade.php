<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="row layout-spacing">
            <div class="my-5 w-100">
                <div class="col-lg-11">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="style-3" class="table style-3  table-hover">
                                    <thead>
                                    <tr >
                                        @foreach($columns_headers as $column_header)
                                            <th>{{ $column_header }}</th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rows as $row)
                                        <tr>
                                            @foreach($columns as $column)
                                                <td style="max-width: 250px; white-space: normal; word-wrap: break-word;">
                                                    {{ $row[$column] ?? '' }}
                                                </td>
                                            @endforeach
                                            <td>
                                                <form  action="{{route('admin-feedbacks.store')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="name" value="{{ $row['name'] }}"/>
                                                    <input type="hidden" name="email" value="{{ $row['email'] }}"/>
                                                    @if($row['status'] === true)
                                                        <td class="text-white bg-success d-flex justify-content-center">
                                                            Зарегистрирован
                                                        </td>
                                                    @else
                                                        <td class="d-flex justify-content-center">
                                                            <button type="submit" class="btn btn-primary">
                                                                Зарегистрировать
                                                            </button>
                                                        </td>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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
