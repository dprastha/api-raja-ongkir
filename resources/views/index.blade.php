<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Cek Ongkir</title>
</head>

<body>
    <div class="container mt-4">
        <div class="card">
            <form action="{{ url('/') }}" method="GET">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kirim-dari" class="form-label">Kirim Dari</label>
                                <select name="province_from" id="kirim-dari" class="form-control">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinces as $province)
                                    <option value="{{$province->id}}">{{$province->province}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <select name="origin" id="origin" class="form-control">
                                    <option value="">Pilih Kota</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kirim-ke" class="form-label">Kirim Ke</label>
                                <select name="province_to" id="kirim-ke" class="form-control">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinces as $province)
                                    <option value="{{$province->id}}">{{$province->province}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <select name="destination" id="destination" class="form-control">
                                    <option value="">Pilih Kota</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="weight" class="form-label">Berat Paket</label>
                                <input type="number" name="weight" id="weight" class="form-control">
                                <small>Dalam satuan gram</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="courier" class="form-label">Pilih Kurir</label>
                                <select name="courier" id="courier" class="form-control">
                                    <option value="" holder>Pilih Kurir</option>
                                    <option value="jne">JNE</option>
                                    <option value="tiki">TIKI</option>
                                    <option value="pos">POS</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">Hitung Ongkir</button>
                        </div>
                    </div>

                    @if ($results)
                    <div class="row">
                      <div class="col-md-12">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">Service</th>
                              <th scope="col">Description</th>
                              <th scope="col">Harga</th>
                              <th scope="col">Estimasi</th>
                              <th scope="col">Note</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach  ($results as $result)
                            <tr>
                              <td>{{ $result['service'] }}</td>
                              <td>{{ $result['description'] }}</td>
                              <td>{{ $result['cost'][0]['value'] }}</td>
                              <td>{{ $result['cost'][0]['etd'] }} Hari</td>
                              <td>{{ $result['cost'][0]['note'] }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                    @else
                    
                    @endif
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="province_from"]').on('change', function () {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: 'getCity/ajax/' + cityId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="origin"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="origin"]').append(
                                    '<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="origin"]').empty();
                }
            });
            
            $('select[name="province_to"]').on('change', function () {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: 'getCity/ajax/' + cityId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="destination"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="destination"]').append(
                                    '<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="origin"]').empty();
                }
            });
            
        });

    </script>
</body>

</html>
