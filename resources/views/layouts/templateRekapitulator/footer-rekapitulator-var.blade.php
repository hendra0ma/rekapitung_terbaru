        <!-- JQUERY JS -->
        <script src="{{url('/')}}/assets/js/jquery.min.js"></script>
        
        <script>
            var doc = new jsPDF();

                function saveDiv(divId, title) {
                doc.fromHTML(`<html><head><title>${title}</title></head><body>` + document.getElementById(divId).innerHTML + `</body></html>`);
                doc.save('Komparasi.pdf');
            }
        </script>

        <!-- BOOTSTRAP JS -->
        <script src="{{url('/')}}/assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="{{url('/')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!-- SPARKLINE JS-->
        <script src="{{url('/')}}/assets/js/jquery.sparkline.min.js"></script>

        <!-- CHART-CIRCLE JS-->
        <script src="{{url('/')}}/assets/js/circle-progress.min.js"></script>

        <!-- CHARTJS CHART JS-->
        <script src="{{url('/')}}/assets/plugins/chart/Chart.bundle.js"></script>
        <script src="{{url('/')}}/assets/plugins/chart/utils.js"></script>

        <!-- PIETY CHART JS-->
        <script src="{{url('/')}}/assets/plugins/peitychart/jquery.peity.min.js"></script>
        <script src="{{url('/')}}/assets/plugins/peitychart/peitychart.init.js"></script>

        <!-- INTERNAL SELECT2 JS -->
        <script src="{{url('/')}}/assets/plugins/select2/select2.full.min.js"></script>
        <script src="{{url('/')}}/assets/plugins/sweet-alert/sweetalert.min.js"></script>
        <!-- DATA TABLE JS-->
        <script src="{{url('/')}}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
        <script src="{{url('/')}}/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
        <script src="{{url('/')}}/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
        <script src="{{url('/')}}/assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
        <script src="{{url('/')}}/assets/plugins/datatable/js/jszip.min.js"></script>
        <script src="{{url('/')}}/assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
        <script src="{{url('/')}}/assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
        <script src="{{url('/')}}/assets/plugins/datatable/js/buttons.html5.min.js"></script>
        <script src="{{url('/')}}/assets/plugins/datatable/js/buttons.print.min.js"></script>
        <script src="{{url('/')}}/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
        <script src="{{url('/')}}/assets/plugins/datatable/dataTables.responsive.min.js"></script>
        <script src="{{url('/')}}/assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
        <script src="{{url('/')}}/assets/js/table-data.js"></script>

        <!-- ECHART JS-->
        <script src="{{url('/')}}/assets/plugins/echarts/echarts.js"></script>

        <!-- SIDE-MENU JS-->
        <script src="{{url('/')}}/assets/plugins/sidemenu/sidemenu.js"></script>

        <!-- SIDEBAR JS -->
        <script src="{{url('/')}}/assets/plugins/sidebar/sidebar.js"></script>

        <!-- Perfect SCROLLBAR JS-->
        <script src="{{url('/')}}/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
        <script src="{{url('/')}}/assets/plugins/p-scroll/pscroll.js"></script>
        <script src="{{url('/')}}/assets/plugins/p-scroll/pscroll-1.js"></script>

        <!-- APEXCHART JS -->
        <script src="{{url('/')}}/assets/js/apexcharts.js"></script>

        <!-- INDEX JS -->
        <script src="{{url('/')}}/assets/js/index1.js"></script>

        <!-- CUSTOM JS -->
        <script src="{{url('/')}}/assets/js/custom.js"></script>

        <!-- C3 CHART JS -->
        <script src="{{url('/')}}/assets/plugins/charts-c3/d3.v5.min.js"></script>
        <script src="{{url('/')}}/assets/plugins/charts-c3/c3-chart.js"></script>

        <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

        <!-- CHART-CIRCLE JS-->
        <script src="{{url('/')}}/assets/js/circle-progress.min.js"></script>
        <script src="{{url('/')}}/assets/js/chat.js"></script>

        <!-- GALLERY JS -->
        <script src="{{url('/')}}/assets/plugins/gallery/picturefill.js"></script>
        <script src="{{url('/')}}/assets/plugins/gallery/lightgallery.js"></script>
        <script src="{{url('/')}}/assets/plugins/gallery/lightgallery-1.js"></script>
        <script src="{{url('/')}}/assets/plugins/gallery/lg-pager.js"></script>
        <script src="{{url('/')}}/assets/plugins/gallery/lg-autoplay.js"></script>
        <script src="{{url('/')}}/assets/plugins/gallery/lg-fullscreen.js"></script>
        <script src="{{url('/')}}/assets/plugins/gallery/lg-zoom.js"></script>
        <script src="{{url('/')}}/assets/plugins/gallery/lg-hash.js"></script>
        <script src="{{url('/')}}/assets/plugins/gallery/lg-share.js"></script>
        @livewireScripts
        @if ($message = Session::get('success'))
        <script>
            $(document).ready(function() {
                swal('Berhasil Terverifikasi!', 'Data Tps Kecurangan Berada Di Tab Terverifikasi', 'success');
            });
        </script>
        @endif
        @if ($message = Session::get('error'))
        <script>
            $(document).ready(function() {
                swal('Berhasil Ditolak!', 'Data Tps Kecurangan Berada Di Tab Ditolak', 'danger');
            });
        </script>
        @endif
        <script>
            $('a.fotoKecuranganterverifikasi').on('click', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: 'ajax/get_fotoKecuranganterverifikasi',
                    type: "GET",
                    data: {
                        id
                    },
                    success: function(response) {
                        if (response) {
                            $('#container-hukum-verifikasi').html(response);
                        }
                    }
                });
            });
        </script>
        <script>
            $('a.fotoKecuranganditolak').on('click', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: 'ajax/get_fotoKecuranganditolak',
                    type: "GET",
                    data: {
                        id
                    },
                    success: function(response) {
                        if (response) {
                            $('#container-hukum-ditolak').html(response);
                        }
                    }
                });
            });
        </script>
        <script>
            $('a.fotoKecurangan').on('click', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: 'ajax/get_foto_kecurangan',
                    type: "GET",
                    data: {
                        id
                    },
                    success: function(response) {
                        if (response) {
                            $('#container-hukum-foto').html(response);
                        }
                    }
                });
            });
        </script>
        <script>
            $('a.videoKecurangan').on('click', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: 'ajax/get_vidio_kecurangan',
                    type: "GET",
                    data: {
                        id
                    },
                    success: function(response) {
                        if (response) {
                            $('#container-hukum-vidio').html(response);
                        }
                    }
                });
            });
        </script>
        <script>
            $('a.listkecurangan').on('click', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: 'ajax/get_list_kecurangan',
                    type: "GET",
                    data: {
                        id
                    },
                    success: function(response) {
                        if (response) {
                            $('#container-hukum-list').html(response);
                        }
                    }
                });
            });
        </script>
        <!-- Internal Chat js-->
