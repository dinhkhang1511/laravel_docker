

  <footer class="footer mt-auto">
    <div class="copyright bg-white">
      <p>
        &copy; <span id="copy-year">2019</span> Copyright Sleek Dashboard Bootstrap Template by
        <a
          class="text-primary"
          href="http://www.iamabdus.com/"
          target="_blank"
          >Abdus</a
        >
      </p>
    </div>
    <script>
        var d = new Date();
        var year = d.getFullYear();
        document.getElementById("copy-year").innerHTML = year;
    </script>
  </footer>

</div>
</div>

<script src="{{asset('dist/js/jquery.min.js')}}"></script>
<script src="{{asset('dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/js/sleek.js')}}"></script>
<script src="{{asset('dist/js/custom.js')}}"></script>

<script>
    $("#search-input").keydown(function(e){
        if (e.keyCode == 13) {
                $(".btn-search").click();
        }
});
</script>

{{-- $.ajax({
    type: "POST",
    url: "{{ route('customer.filter') }}",
    data: {
        "_token": "{{ csrf_token() }}",
        'id': $(this).attr('data-id'),
        'gender': currentValue,
    },
}); --}}
<script src="{{asset('dist/js/jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.filter').change(function (e) {
            $(".btn-filter").click();
        });
    });

</script>
  </body>
</html>
