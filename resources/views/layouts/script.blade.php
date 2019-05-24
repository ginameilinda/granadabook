    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  <!-- Tooltip -->
<!--   <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
    });
  </script> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function (){
        $(".update-cart").click(function (e){
            e.preventDefault();
            console.log('aaaaa');
            var ele = $(this);

            $.ajax({
                url: "{{route('carts.update')}}",
                method:"PATCH",
                data:{
                _token:'{{csrf_token() }}',
                id:ele.attr("data-id"),
                quantity:ele.parents("tr").find(".quantity").val()
                },
                success:function(response){
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e){
            e.preventDefault();

            var ele = $(this);
            if(confirm("Are you Sure?")){
                $.ajax({
                    url:"{{route('carts.remove')}}",
                    method: "DELETE",
                    data: {
                        _token:"{{csrf_token() }}", 
                        id: ele.attr("data-id")
                        },
                    success: function(response){
                        window.location.reload();
                    }
                });
            }
        });
    });
</script>

@stack('script')