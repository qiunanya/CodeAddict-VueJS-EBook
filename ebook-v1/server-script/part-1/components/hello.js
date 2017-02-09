Vue.component("hello", function(resolve, reject){
    Vue.http.get("/part-1/components/hello.html").then(function(result){
        var parser = new DOMParser();
        var html = parser.parseFromString(result.data, "text/html");
        resolve({
            template: html,
            data : function(){
                return { }
            },
            methods : {
                headerClick : function(){
                    alert("OK");
                }
            },
            props : ['name']
        });        
    }, function(result){
        console.log(result);
        reject(result.statusText);
    });
});