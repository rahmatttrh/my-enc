@extends('layouts.app')
@section('title')
KPA
@endsection
@section('content')

<div class="page-inner">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb  ">
            <li class="breadcrumb-item " aria-current="page"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item " aria-current="page"><a href="{{route('kpa')}}">KPA</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
    </nav>

    <div class="row" id="boxCreate">
        <div class="col-md-3">
            <div class="card shadow-none border">
                <div class="card-header d-flex">
                    <div class="d-flex  align-items-center">
                        <div class="card-title">Give Performance Apprasial</div>
                    </div>

                </div>
                <div class="card-body">
                    <form>
                        @csrf
                        <div class="form-group form-group-default">
                            <label><b>Employee</b></label>
                            {{$kpa->employe->biodata->fullName()}}
                        </div>
                        <div class="form-group form-group-default">
                            <label>Month</label>
                            {{ date('M Y', strtotime($kpa->date))}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card shadow-none border">
                <div class="card-header">
                    <div class="card-title">Objective KPI</div>
                </div>
                <input type="hidden" id="kpi_id" name="kpi_id">
                <input type="hidden" id="employee_id" name="employe_id">
                <input type="hidden" id="date" name="date">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableCreate" class="displays table table-striped ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Objective</th>
                                    <th>Weight</th>
                                    <th>Target</th>
                                    <th>Value</th>
                                    <th>Achievement</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)

                                @php
                                $urlPdf = Storage::url($data->evidence) ;
                                @endphp
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td><a href="#" data-target="#myModal-{{$data->id}}" data-toggle="modal"> {{$data->kpidetail->objective}} </a></td>
                                    <td> {{$data->kpidetail->weight}}</td>
                                    <td> {{$data->kpidetail->target}}</td>
                                    <td> {{$data->value}}</td>
                                    <td class="text-right"> <b>{{$data->achievement}}</b></td>
                                </tr>


                                <div class="modal fade" id="myModal-{{$data->id}}" data-bs-backdrop="static">
                                    <div class="modal-dialog" style="max-width: 80%;">
                                        <div class="modal-content">

                                            <!-- Bagian header modal -->
                                            <div class="modal-header bg-primary">
                                                <h3 class="modal-title">{{$data->kpidetail->objective}} </h3>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <form method="POST" action="{{route('kpa.update',$kpa->id) }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <input type="hidden" name="id" value="{{$data->id}}">
                                                <input type="hidden" name="kpa_id" value="{{$kpa->id}}">

                                                <!-- Bagian konten modal -->
                                                <div class="modal-body">

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="card shadow-none border">
                                                                <div class="card-header d-flex">
                                                                    <div class="d-flex  align-items-center">
                                                                        <div class="card-title">Form Edit</div>
                                                                    </div>

                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="objective">Objective:</label>
                                                                        <input type="text" class="form-control" id="objective" name="objective" value="{{ $data->kpidetail->objective }}" readonly>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="weight">Weight:</label>
                                                                        <input type="text" class="form-control" id="weight" name="weight" value="{{ $data->kpidetail->weight }}" readonly>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="target">Target:</label>
                                                                        <input type="text" class="form-control" id="target" name="target" value="{{ $data->kpidetail->target }}" readonly>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="value">Value:</label>
                                                                        <input type="text" class="form-control value" id="value" name="value" data-key="{{ $data->id }}" data-target="{{ $data->kpidetail->target }}" data-weight="{{ $data->kpidetail->weight }}" value="{{ old('value', $data->value) }}" autocomplete="off">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="achievement">Achievement:</label>
                                                                        <input type="text" class="form-control" id="achievement-{{$data->id}}" name="achievement" value="{{ $data->achievement }}" readonly>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="attachment">Evidence</label>
                                                                        <input type="file" class="form-control-file attachment" id="attachment" data-key="{{ $data->id }}" name="attachment" accept=".pdf">
                                                                        <label for="attachment">*opsional jika evidence ingin di rubah</label>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between">
                                                                        <button type="reset" class="btn btn-secondary ml-auto">
                                                                            <i class="fa fa-refresh"></i> Reset
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card shadow-none border">
                                                                <div class="card-header d-flex">
                                                                    <div class="d-flex  align-items-center">
                                                                        <div class="card-title">Evidence</div>
                                                                    </div>

                                                                </div>
                                                                <div class="card-body">
                                                                    @if ($data->evidence)
                                                                    <iframe src="{{ Storage::url($data->evidence) }}" id="pdfPreview-{{$data->id}}" width=" 100%" height="575px"></iframe>
                                                                    @else
                                                                    <p>No attachment available.</p>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>

                                                <!-- Bagian footer modal -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-warning">Update</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5" class="text-right">Achievement</th>
                                    <th class="text-right" id="totalAchievement">{{$kpa->achievement}}</th>
                                </tr>
                            </tfoot>
                        </table>
                        <small class="text-danger">* Jika anda ingin mengupdate nilai value, silahkan klik objective</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js_footer')
<script>
    $(document).ready(function() {
        $('.attachment').on('change', function() {
            var input = $(this)[0];

            var key = $(this).data('key');

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {

                    showPdf(e.target.result, key);

                };
                reader.readAsDataURL(input.files[0]);
            }
        });

        function showPdf(data, id) {
            $('#pdfPreview-' + id).attr('src', ''); // Mengosongkan atribut src
            $('#pdfPreview-' + id).attr('src', data); // Menetapkan atribut src dengan tampilan pratinjau baru
            $('#pdfPreview-' + id).show();
        }

        $('.value').on('input', function() {
            var inputValue = $(this).val();

            // Hapus angka 0 di depan jika ada
            inputValue = inputValue.replace(/^0+(?=\d)/, '');

            $(this).val(inputValue);

            var key = parseFloat($(this).data('key'));
            var targetValue = parseFloat($(this).data('target'));
            var weightValue = parseFloat($(this).data('weight'));



            validateInput($(this), targetValue);

            let achievementValue = Math.round(($(this).val() / targetValue) * weightValue);

            $('#achievement-' + key).val(achievementValue);

        });

        function validateInput(input, targetValue) {
            var inputValue = parseFloat(input.val());

            if (isNaN(inputValue) || inputValue < 0.1) {
                input.removeClass('is-valid');
                input.addClass('is-invalid');
            } else if (inputValue > targetValue) {
                input.val(targetValue);
                input.removeClass('is-invalid');
                input.addClass('is-valid');
            } else {
                input.removeClass('is-invalid');
                input.addClass('is-valid');
            }
        }

    })
</script>
@endpush