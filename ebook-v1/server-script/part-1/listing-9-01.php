<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listing</title>
</head>
<body>
    <div id="div-customer">
        <ul>
            <li v-for="c in customers">
                <a href="#">{{c.firstname}} {{c.lastname}}</a>
            </li>
        </ul>
    </div>
</body>
</html>
<!--<script src="/scripts/jquery.js"></script>-->
<script src="/scripts/vue.js"></script>
<script src="/scripts/vue-resource.js"></script>

<script>

    var vm = new Vue({
        el : "#div-customer",
        data : {
            customers : []
        },
        methods : {
            getDataWithJQuery : function(){
                $.ajax({
                    url : "/part-1/services/getCustomers.php",
                    method : "GET",
                    dataType : "json"
                }).done(function(result){
                    //console.log(result);
                    vm.customers = result;
                }).fail(function(){
                    alert("Error");
                }).always(function(){
                    alert("Success");
                });
            },
            getDataWithVueResource : function(){
                this.$http({
                    url : "/part-1/services/getCustomers.php",
                    method : "GET"
//                    , data : { a : "11A", b : "22B" }
                }).then(function(response){
                        console.log(response.headers);
                        this.customers = response.data;
                    }, function(response){
                        console.log(response);
                        alert("Error");
                    }
               );
            }
        },
        ready : function(){
            this.getDataWithVueResource();
//            this.getDataWithJQuery();
        }
        
    });

</script>