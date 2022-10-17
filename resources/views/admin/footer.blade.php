<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Kelompok 3 PA2 2022</span>
            <div class="credits">
                By <a href="">INSTITUT TEKNOLOGI DEL</a>
            </div>
        </div>

    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- 
@if(Session::has('success'))
<script>
    toastr.success("{{Session::get('success') }}")
</script>
@endif -->
<script src="{{asset('js')}}/previewimg.js"></script>
<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor')}}/jquery/jquery.min.js"></script>
<script src="{{asset('vendor')}}/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor')}}/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js')}}/sb-admin-2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="{{asset('js')}}/demo/datatables-demo.js"></script>

<script src="{{asset('vendor')}}/chart.js/Chart.min.js"></script>

<script src="{{asset('js')}}/demo/chart-area-demo.js"></script>
<script src="{{asset('js')}}/demo/chart-pie-demo.js"></script>
@include('sweetalert::alert')
</body>

</html>