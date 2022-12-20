<?php

use App\Models\User;
?>

<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>



<!-- Modal -->
<div class="modal fade" id="modallockdown" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content bg-danger text-light">
      <div class="modal-header">
        <h5 class="modal-title" id="modallockdownLabel">Lockdown</h5>
      </div>
      <div class="modal-body">
            <div class="alert alert-danger text-dark" role="alert">
                <h3 class="display-3 text-light">
                   <i class="fas fa-lock-alt fa-3x"></i> LOCKDOWN
                </h3>
            </div>
      </div>
      
    </div>
  </div>
</div>

<!-- JQUERY JS -->
<script src="../../assets/js/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="../../assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- SPARKLINE JS-->
<script src="../../assets/js/jquery.sparkline.min.js"></script>

<!-- CHART-CIRCLE JS-->
<script src="../../assets/js/circle-progress.min.js"></script>

<!-- CHARTJS CHART JS-->
<script src="../../assets/plugins/chart/Chart.bundle.js"></script>
<script src="../../assets/plugins/chart/utils.js"></script>

<!-- PIETY CHART JS-->
<script src="../../assets/plugins/peitychart/jquery.peity.min.js"></script>
<script src="../../assets/plugins/peitychart/peitychart.init.js"></script>

<!-- INTERNAL SELECT2 JS -->
<script src="../../assets/plugins/select2/select2.full.min.js"></script>

<!-- DATA TABLE JS-->
<script src="../../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="../../assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="../../assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="../../assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
<script src="../../assets/plugins/datatable/js/jszip.min.js"></script>
<script src="../../assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
<script src="../../assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
<script src="../../assets/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="../../assets/plugins/datatable/js/buttons.print.min.js"></script>
<script src="../../assets/plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="../../assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="../../assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
<script src="../../assets/js/table-data.js"></script>

<!-- ECHART JS-->
<script src="../../assets/plugins/echarts/echarts.js"></script>

<!-- SIDE-MENU JS-->
<script src="../../assets/plugins/sidemenu/sidemenu.js"></script>

<!-- SIDEBAR JS -->
<script src="../../assets/plugins/sidebar/sidebar.js"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="../../assets/plugins/p-scroll/perfect-scrollbar.js"></script>
<script src="../../assets/plugins/p-scroll/pscroll.js"></script>
<script src="../../assets/plugins/p-scroll/pscroll-1.js"></script>

<!-- APEXCHART JS -->
<script src="../../assets/js/apexcharts.js"></script>

<!-- INDEX JS -->
<script src="../../assets/js/index1.js"></script>

<!-- CUSTOM JS -->
<script src="../../assets/js/custom.js"></script>

<!-- C3 CHART JS -->
<script src="../../assets/plugins/charts-c3/d3.v5.min.js"></script>
<script src="../../assets/plugins/charts-c3/c3-chart.js"></script>
<!-- INTERNAL Notifications js -->
<script src="../../assets/plugins/notify/js/rainbow.js"></script>
<script src="../../assets/plugins/notify/js/sample.js"></script>
<script src="../../assets/plugins/notify/js/jquery.growl.js"></script>
<script src="../../assets/plugins/notify/js/notifIt.js"></script>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.ui.min.js"></script>

<script>
    $(".modal").each(function(l){$(this).on("show.bs.modal",function(l){var o=$(this).attr("data-easein");"shake"==o?$(".modal-dialog").velocity("callout."+o):"pulse"==o?$(".modal-dialog").velocity("callout."+o):"tada"==o?$(".modal-dialog").velocity("callout."+o):"flash"==o?$(".modal-dialog").velocity("callout."+o):"bounce"==o?$(".modal-dialog").velocity("callout."+o):"swing"==o?$(".modal-dialog").velocity("callout."+o):$(".modal-dialog").velocity("transition."+o)})});
</script>



@include('layouts.templateCommander.script-command')

<script>

let myModal = new bootstrap.Modal(document.getElementById('modallockdown'), {
   keyboard : false,
   backdrop : "static"
});



    $(document).ready(function() {
        
        @if($config->lockdown == "yes")
            myModal.show()
        @endif
        
        
        Pusher.logToConsole = true;
        var pusher = new Pusher('d3492f7a24c6c2d7ed0f', {
            cluster: 'ap1'
        });
        var channel = pusher.subscribe('messages');
        channel.bind('my-event', function(data) {
            show_count(data);
            playSound();
        });

        function show_count(data) {
            notif({
                type: "success",
                msg: data.message,
                width: "all",
                height: 70,
                position: "center"
            });
        }

        function playSound(url) {
            const audio = new Audio(url);
            audio.play();
            console.log(audio);
        }
    });
</script>
@if(Request::segment('2') != "index-tsm")
<script>
    /*chart-pie*/
    var chart = c3.generate({
        bindto: '#chart-pie', // id of chart wrapper
        data: {
            columns: [
                // each columns data

                <?php foreach ($paslon as $pas) :  ?>
                    <?php $voice = 0;  ?>
                    <?php foreach ($pas->saksi_data as $pak) :  ?>
                        <?php
                        $voice += $pak->voice;
                        ?>
                    <?php endforeach  ?>['data<?= $pas->id  ?>', <?= $voice ?>],
                <?php endforeach  ?>
            ],
            type: 'pie', // default type of chart
            colors: {
                <?php foreach ($paslon as $pas) :  ?> 'data<?= $pas->id  ?>': "<?= $pas->color ?>",
                <?php endforeach  ?>
            },
            names: {
                // name of each serie
                <?php foreach ($paslon as $pas) :  ?> 'data<?= $pas->id  ?>': " <?= $pas->candidate ?> - <?= $pas->deputy_candidate ?>",
                <?php endforeach  ?>
            }
        },
        axis: {},
        legend: {
            show: true, //hide legend
        },
        padding: {
            bottom: 0,
            top: 0
        },
    });
</script>
<script>
    /*chart-pie*/
    var chart = c3.generate({
        bindto: '#chart-donut', // id of chart wrapper
    data: {
            columns: [
                // each columns data

                <?php foreach ($paslon_terverifikasi as $pas) :  ?>
                    <?php $voice = 0;  ?>
                    <?php foreach ($pas->saksi_data as $pak) :  ?>
                        <?php
                        $voice += $pak->voice;
                        ?>
                    <?php endforeach  ?>['data<?= $pas->id  ?>', <?= $voice ?>],
                <?php endforeach  ?>
            ],
            type: 'donut', // default type of chart
            colors: {
                <?php foreach ($paslon_terverifikasi as $pas) :  ?> 'data<?= $pas->id  ?>': "<?= $pas->color ?>",
                <?php endforeach  ?>
            },
            names: {
                // name of each serie
                <?php foreach ($paslon_terverifikasi as $pas) :  ?> 'data<?= $pas->id  ?>': " <?= $pas->candidate ?> - <?= $pas->deputy_candidate ?>",
                <?php endforeach  ?>
            }
        },
        axis: {},
        legend: {
            show: true, //hide legend
        },
        padding: {
            bottom: 0,
            top: 0
        },
    });
</script>


<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

<!-- CHART-CIRCLE JS-->
<script src="../../assets/js/circle-progress.min.js"></script>
<script>
$('#ikon-map-full').on('click',function(){
    $.ajax({
    url:"{{route('map2')}}",
    type:"get",
    success:function(data){
        $('div.modal-body.map2').html(data);
    }
})
})
  


var map = L.map('map').setView([-6.261223099846002, 106.69325190584601], 10);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    @foreach($tracking as $track)
    <?php $user = User::where('id', (string)$track->id_user)->first(); ?>
    @if($user == NULL)
      L.marker([{{$track['latitude']}},{{$track['longitude']}}]).bindPopup(' Tidak Terdeteksi ').addTo(map);
    @else
       var text<?= $user['id'] ?> = '<div class="row"><div class="col-4"><img src="' + '<?php if($user["profile_photo_path"] == NULL){ echo "https://ui-avatars.com/api/?name=' + '".$user["name"]."' +'&color=7F9CF5&background=EBF4FF"; }else{ echo url("/storage/profile-photos/".$user["profile_photo_path"]); } ?>' + '" class="'+ 'img-fluid' + '"  width="150px" height="auto" /></div>   <div class="col-8"><table>' + '<tr><td>Nama</td><td>:</td><td>' + '<?= $user["name"] ?>' + '</td></tr>' + '<tr><td>Email</td><td>:</td><td>' + '<?= $user["email"]?>' + '</td></tr>' + '<tr><td>Nomor</td><td>:</td><td>' + '<?= $user["no_hp"]?>' + '</td></tr>' + '<tr><td>Last Seen</td><td>:</td><td>' + '    {{ \Carbon\Carbon::parse($user["last_seen"])->diffForHumans() }}' + '</td></tr>' + '</table><a href="{{url('/')}}/administrator/patroli_mode/tracking/detail/<?= encrypt($user["id"])?>">Detail Tracking</a>  </div> </div>';
    L.marker([{{ $track['latitude']}}, {{ $track['longitude']}}]).bindPopup(text<?= $user['id'] ?>).addTo(map);   
    @endif
    @endforeach
</script>
@else
        <script>
               var chart = c3.generate({
                bindto: '#chart-pie', // id of chart wrapper
                data: {
                    columns: [
                         <?php $i = 1 ?>
                                    <?php foreach ($index_tsm as $item): ?>
                                        <?php    if($item->jenis !=0){
                                            continue;
                                        } ?>
                                        <?php
                                     $totalKec =  App\Models\Bukti_deskripsi_curang::join('list_kecurangan','list_kecurangan.id','=','bukti_deskripsi_curang.list_kecurangan_id')
                                     ->join('saksi', 'saksi.tps_id', '=', 'bukti_deskripsi_curang.tps_id')
                                                     ->where('saksi.status_kecurangan', "terverifikasi")
                                    ->where('bukti_deskripsi_curang.list_kecurangan_id',$item->id)
                                    ->where('list_kecurangan.jenis',0)
                                    ->count();
                                    $jumlahSaksi = App\Models\Saksi::where('kecurangan',"yes")->count();
                                    $persen = ($totalKec/ $jumlahSaksi)*100;
                                      ?>
                                      ['{{$i++}}',<?=substr($persen,0,4)?>],
                                    <?php endforeach ?>
                    ],
                                type: 'pie',
                },
                axis: {},
                legend: {
                    show: true, //hide legend
                },
                axis: {
 		        	rotated: true,
 		        },
                padding: {
                    bottom: 0,
                    top: 0
                },
                size: {
                    height: 300,
                    width: 300
                }
            });
               var chart2 = c3.generate({
                bindto: '#chart-donut', // id of chart wrapper
                data: {
                    columns: [
                         <?php $i = 1 ?>
                                    <?php foreach ($index_tsm as $item): ?>
                                        <?php    if($item->jenis !=1){
                                            continue;
                                        } ?>
                                        <?php
                                   $totalKec =  App\Models\Bukti_deskripsi_curang::join('list_kecurangan','list_kecurangan.id','=','bukti_deskripsi_curang.list_kecurangan_id')
                                     ->join('saksi', 'saksi.tps_id', '=', 'bukti_deskripsi_curang.tps_id')
                                                     ->where('saksi.status_kecurangan', "terverifikasi")
                                    ->where('bukti_deskripsi_curang.list_kecurangan_id',$item->id)
                                    ->where('list_kecurangan.jenis',1)
                                    ->count();
                                    $jumlahSaksi = App\Models\Saksi::where('kecurangan',"yes")->count();
                                    $persen = ($totalKec/ $jumlahSaksi)*100;
                                      ?>
                                      ['{{$i++}}',<?=substr($persen,0,4)?>],
                                    <?php endforeach ?>
                    ],
                                type: 'pie',
                },
                axis: {},
                legend: {
                    show: true, //hide legend
                },
                padding: {
                    bottom: 0,
                    top: 0
                },
                size: {
                    height: 300,
                    width: 300
                }
            });
        </script>

@endif

</body>

</html>
