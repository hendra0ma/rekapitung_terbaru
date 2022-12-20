<div class="row">
    <div class="col-lg-12">
        <center>
            <h1 class="fw-bold">LAPORAN KECURANGAN SAKSI</h1>
        </center>
    </div>
    <div class="col-md-6">

        <div class="row">

            <div class="col-md">

                <div class="card" style="width: 100%; height: auto;">
                    <div class="card-header bg-dark">
                        <h3 class="card-title mx-auto text-white">FOTO KECURANGAN</h3>
                    </div>
                    <div class="card-body h-100">
                        <div id="carousel-controls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php $i = 0;
                                foreach ($foto_kecurangan as $foto) : ?>
                                    <?php if ($i == 0) {
                                        $set_ = 'active';
                                    } else {
                                        $set_ = '';
                                    } ?>
                                    <div class="carousel-item <div class='carousel-item <?php echo $set_; ?>">
                                        <img class="d-block w-100" alt="" src="{{asset('storage')}}\{{ $foto['url'] }}" data-bs-holder-rendered="true">
                                    </div>
                                <?php $i++;
                                endforeach ?>
                            </div>
                            <a class="carousel-control-prev" href="#carousel-controls" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-controls" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h4 class="card-title mx-auto text-white">Vidio Kecurangan</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">

                        <ul id="lightgallery" class="list-unstyled row">
                            <video style="width: 100%; height: auto;" controls>
                                <source src="{{asset('storage/'.$vidio_kecurangan['url'])}}" type=video/ogg>
                                <source src="{{asset('storage/'.$vidio_kecurangan['url'])}}" type=video/mp4>
                            </video>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="card-title mx-auto text-white">LAPORAN KEJADIAN TPS</h4>
            </div>
            <form action="action/proses_kecurangan/{{ Crypt::encrypt($tps['id']); }}" method="post">
                @csrf
                <div class="card-body" style="height: 1000px; overflow: scroll;">
                    <p class="card-text">
                    <div class="row">
                        <div class="col-12">
                            <h6> {{ $kecamatan['name'] }} - TPS {{$tps['number']}} </h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-justify">Admin Hukum dapat
                                        mengkoreksi / menghapus dan atau menambahkan
                                        item
                                        kecurangan jika data kecurangan yang dikirimkan
                                        saksi kurang lengkap atau salah. Admin Hukum
                                        juga dapat memberi keterangan yang relevan pada
                                        kolom BAP Admin Hukum atau abaikan jika
                                        keterangan saksi dirasa cukup. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <table class="table">
                        <thead class="bg-danger text-light">
                            <tr>
                                <th class="text-white">Cek</th>
                                <th class="text-white">Deskripsi Kecurangan Saksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_kecurangan as $item)
                            <tr>
                                <td><input type="checkbox" name="bukti_text[]" checked="" value="{{ $item['text'] }}"data-id="{{ $item['list_kecurangan_id'] }}"onclick="ajaxGetSolution(this)"></td>
                                <td>{{ $item['text'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <thead>
                            <input type="hidden" name="id_relawan">
                            <tr>
                                <td class="bg-dark text-light"></td>
                                <th class="bg-dark text-light">
                                    TAMBAHKAN JENIS PELANGGARAN UMUM (+)
                                </th>
                            </tr>
                            @foreach ($pelanggaran_umum as $item)
                            <tr>
                                <td><input type="checkbox" name="curang[]" value=" {{ $item['kecurangan'] }}"data-id="{{ $item['id'] }}"onclick="ajaxGetSolution(this)">
                                </td>
                                <td><label>{{ $item['kecurangan'] }} </label></td>
                            </tr>
                            @endforeach
                        </thead>
                        <thead>
                            <input type="hidden" name="id_relawan">
                            <tr>
                                <td class="bg-dark text-light"></td>
                                <th class="bg-dark text-light">
                                    TAMBAHKAN JENIS PELANGGARAN PETUGAS (+)
                                </th>
                            </tr>
                            @foreach ($pelanggaran_petugas as $item)
                            <tr>
                                <td><input type="checkbox" name="curang[]" value=" {{ $item['kecurangan'] }}"data-id="{{ $item['id'] }}"onclick="ajaxGetSolution(this)">
                                </td>
                                <td><label>{{ $item['kecurangan'] }} </label></td>
                            </tr>
                            @endforeach
                        </thead>


                        <tbody>
                            <tr  class="bg-primary text-light">
                                <td></td>
                                <td>Rekomendasi Tindakan</td>
                            </tr>
                        </tbody>
                        <tbody id="container-rekomendasi">

                        </tbody>


                        <tbody>
                            <tr class="bg-primary text-light">
                                <td></td>
                                <td>BAP Admin Hukum</td>
                            </tr>
                            <tr>
                                <td colspan="2"><textarea name="kecurangan" placeholder="catatan hukum" class="form-control" cols="30" rows="10"></textarea></td>
                            </tr>
                            <tr>
                                <td class="bg-dark text-light"></td>
                                <th class="bg-dark text-light">
                                    Bukti Kejadian TPS
                                </th>
                            </tr>
                            @if (count($bukti_foto) > 0)
                            <tr>
                                <td>
                                    <input type="checkbox" name="bukti[]" value="1" checked="">
                                </td>
                                <td>
                                    <label for="bukti_foto">Bukti Foto</label>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <input type="checkbox" name="bukti[]" value="1">
                                </td>
                                <td>
                                    <label for="bukti_foto">Bukti Foto</label>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td>
                                    <input type="checkbox" checked name="bukti[]" value="2">
                                </td>
                                <td>
                                    <label for="bukti_video">Bukti Video</label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </p>
                </div>
                <div class="card-footer">
                    <?php if ($saksi['status_kecurangan'] == "diproses") : ?>
                        <a href="action_verifikasi_kecurangan/{{ Crypt::encrypt($tps['id']); }}" class="btn mt-2 ml-3 btn-success">Validasi Kecurangan</a>
                        {{-- <a href="print/{{ Crypt::encrypt($tps['id']); }}" class="btn mt-2 ml-3 btn-success">Print Kecurangan</a> --}}
                    <?php else : ?>
                     <button type="submit" class="btn btn-success">Validasi Kecurangan</button>
                        <a href="action_tolak_kecurangan/{{Crypt::encrypt($tps['id'])}}" class="btn btn-danger">Tolak Kecurangan</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

    </div>
</div>
<script>
    let ajaxGetSolution = function(ini){
      let id_list = $(ini).data('id')

        if (ini.checked == true) {
            $.ajax({
                url : "{{url('')}}/hukum/getsolution",
                data: {
                    id_list
                },
                type : 'get',
                success:function (res) {
                    $('tbody#container-rekomendasi').append(`
                        <tr id="solution${id_list}">
                            <td>
                            </td>
                            <td>
                                ${res.solution}
                            </td>
                        </tr>
                    `)
                }
            });
        }else{
            $(`#solution${id_list}`).remove();
        }
    }
    </script>
       <script>
            setTimeout(function(){
            let uniqueData =  [@foreach ($list_solution as $item)'{{$item->solution}}' , @endforeach];
            let uniqueDataId =  [@foreach ($list_solution as $item)'{{$item->id_list}}' , @endforeach];
            let dataMerge = [];
                uniqueArrayText = uniqueData.filter(function(item, pos) {
                    return uniqueData.indexOf(item) == pos;
                });
                uniqueArrayId = uniqueDataId.filter(function(item, pos) {
                    return uniqueDataId.indexOf(item) == pos;
                });
                for (let i = 0; i < uniqueDataId.length; i++) {
                        dataMerge.push([uniqueArrayId[i],uniqueArrayText[i]]);
                }

                dataMerge.forEach(function (item,index){
                    if (item[1] == undefined) {
                        return;
                    }
                    $('#container-rekomendasi').append(`
                    <tr id="solution${item[0]}">
                        <td>
                        </td>
                        <td>
                            ${item[1]}
                        </td>
                    </tr>
                    `)
                });
            },300)
     </script>
