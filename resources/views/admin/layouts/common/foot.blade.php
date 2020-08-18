    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('messages.ready_to_leave') }}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">{{ trans('messages.select_logout ') }}</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">{{ trans('messages.cancel') }}</button>
                    <a class="btn btn-primary" href="login.html">{{ trans('messages.logout') }}</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bower_components/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower-package/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables/media/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower-package/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('bower_components/bower-package/js/demo/chart-pie-demo.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower-package/js/demo/datatables-demo.js') }}"></script>
    <script src="{{ mix('js/custom.js') }}"></script>
    </body>
</html>
