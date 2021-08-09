
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="name" id="name">
        <br><br>
        <input type="email" name="email" id="email">
        <br><br>  
        <button type="button" id="gonder">Gonder</button>
    </form>
    
    
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        var name;
        var email=$('#email').html();
        $('#gonder').click(function(){
            name=$('#name').val();
            // alert(name);
            $.ajax({
                type:'post',
                headers:{
                    "X-CSRF-TOKEN":'{{ csrf_token() }}'
                },
                data:{
                    item:name
                },
                url:'{{ route('ajax.post') }}',
                success:function(param){
                    console.log(param);
                }
            });
        });
       
    });
</script>
</html>