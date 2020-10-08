<html lang="en">

<head>

    <title>
        CSV in json
    </title>
    <style>
        .box{
            border:1px solid black;
            padding: 10px;
        }

    </style>
</head>

<body>

<div id="container">

    <div id="content"></div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>
    var oset=0;
    var iload=1;
    var holdload=false;
    $(function(){
        loadArt(7);
    });

    $(window).scroll(function(){
        if($(window).scrollTop()>=$(document).height()-$(window).height()-100){
            loadArt(1);
        }
    })

    function loadArt(a){
        if (!holdload){
            var holder={oset:oset,iload:a};
            console.log(holder);
            holdload=true;
            $.ajax({
                url:"api.php",
                type:"POST",
                data:holder,
                dataType:"json",
                success:function (data){
                    console.log(data);
                    for(var i=0;i<data.content.length;i++){
                        oset++;
                        var item=data.content[i];
                        var html='<div class="box">'+item.id+'<br>'+item.model_number+'<br>'+item.category_name+'<br>'+item.department_name+'<br>'+item.manufacturer_name+'<br>'+item.upc+'<br>'+item.sku+'<br>'+item.regular_price+'<br>'+item.sale_price+'<br>'+item.description+'<br>'+item.url+'</div>';
                        $('#content').append(html);
                    }
                    holdload=false;
                    if(data.content.length==0){holdload=true;}
                }
            })
        }
    }

</script>

</body>

</html>