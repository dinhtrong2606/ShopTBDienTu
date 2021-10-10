<script type="text/javascript">
    $(document).ready(function() {
        function loadData() {
            $.ajax({
                url: 'select-data.php',
                type: 'POST',
                success: function(data) {
                    $("#content").html(data);
                }
            });
        }

        
        
        $("#btn").on("click", function(e) {
            e.preventDefault();
            var name = $("#name").val();
            var msg = $("#msg").val();

            $.ajax({
                url: 'insert-data.php',
                type: 'POST',
                data: {
                    name: name,
                    msg: msg
                },
                success: function(data) {
                    if (data == 1) {
                        loadData();
                        alert('Comment Submitted Successfully.');
                        $("#form").trigger("reset");
                    } else {
                        alert("Comment Can't Submit.");
                    }
                }
            });
        });

        $('.quick-buy-form').submit(function (event){
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'process-cart.php?action=add',
                data: $(this).serializeArray(),
                success: function (response){
                    response = JSON.parse(response);
                    if(response.status == 0){ //co loi
                        alert(response.message);
                    } else{
                        alert(response.message); //mua thanh cong
                        //location.reload();
                    }
                }
            });
        });
    });
</script>