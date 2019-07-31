<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="/css/pages/user-card.css" rel="stylesheet">
    <link href="/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
    <link href="/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
    <link href="/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/css/style.min.css" rel="stylesheet">
</head>
<body>




    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">Dossiers académiques</h4>
                    <hr>
                    <div class="row el-element-overlay">
                        <div class="col-md-12">

                        </div>
                        @foreach($images as $value)

                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="el-card-item">
                                    @if($value)
                                    <div class="el-card-avatar el-overlay-1">
                                        <img src="{{ asset('storage/'.$value) }}" alt="user" />
                                        <div class="el-overlay">
                                            <ul class="el-info">
                                                <li>
                                                    <a class="btn default btn-outline image-popup-vertical-fit" href="{{ asset('storage/'.$value) }}">
                                                        <i class="icon-magnifier"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="btn default btn-outline" href="javascript:void(0);">
                                                        <i class="icon-link"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @else

                                    <div class="el-card-avatar el-overlay-1">
                                        <h3>AUCUN FICHIER TELECHARGE </h3>
                                        <div class="el-overlay">
                                            <ul class="el-info">
                                                <li>

                                                </li>

                                            </ul>
                                        </div>
                                    </div>


                                    @endif

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <hr >
                    <br>

                </div>
            </form>
        </div>
    </div>
</div>
</div>

</body>
<script src="/node_modules/jquery/jquery-3.2.1.min.js"></script>
<script src="/node_modules/popper/popper.min.js"></script>
<script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/js/perfect-scrollbar.jquery.min.js"></script>
<script src="/js/waves.js"></script>
<script src="/js/sidebarmenu.js"></script>
<script src="/js/custom.min.js"></script>
<script src="/js/pages/mask.js"></script>
<script src="/node_modules/datatables/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>


<script>
    $(document).ready(function() {
        $('#academicsInfo').DataTable();
        $('#guardiansInfo').DataTable();
    });
</script>
<script>
    $('div.alert').not('.alert-important').delay(5000).fadeOut(500);
</script>


</html>