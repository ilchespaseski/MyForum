$(document).ready(function (){
   test = []
   console.log(sessionStorage.getItem('username'))
   $.ajax({
      type:"POST",
      url:"/MyForum/getcategories",
      success: function (data){
         data = jQuery.parseJSON(data);
         test = data;
         colors=['#b99268','#b2b5b4','#bb9a90','#b22223','#02b354','#444444','#248af1','#6fa0c0','#80007f','#0000ff','#d2681e'];

         for(i=0;i<data.length;i++){
            $('#category-container').append("<a class='cat-link' href='/MyForum/topics/"+data[i].cat_name.toLowerCase()+"'><li value=\""+data[i].cat_id+"\"  style=\'border-bottom: 0.5px solid lightgrey\; border:0.5px solid lightgrey;border-left: 10px solid"+colors[i]+";' " +
                " class=\"container category-container\" id='category-containers' > <div class=\"category-dsc-last-post\" >\n" +
                "\n " +
                "            <p class=\"category-name\">"+ data[i].cat_name +"</p>\n" +
                "            <p class=\"topic-num\">5</p>\n" +
                "        </div>\n" +
                "        <p class=\"category-description\">"+data[i].cat_description+"</p></li></a>");
         }

      },
      error: function (xhr, status, error){
         console.error(xhr);
      }

   });
   $('#category-container').on('click', 'li', function(){
      catid= this.value;
      catname = this.name;
      sessionStorage.setItem("catid", catid);
      sessionStorage.setItem("catname", catname);

   })


});

