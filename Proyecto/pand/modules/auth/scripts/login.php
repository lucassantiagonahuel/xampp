<script type="text/javascript">
    $('#label-email').on('click', function(){ $('#email').focus(); });
    $('#label-password').on('click', function(){ $('#password').focus(); });

    $('#loginForm').on('submit', function(){
        pand.ajax({
            url: '/login/login',
            data: $(this).serialize(),
            success: function(data){
                location.reload();
            }
        });

        return false;
    });
</script>
