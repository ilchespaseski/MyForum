$(document).ready(function (){
    // catid =  sessionStorage.getItem('catid');
    // catname =  sessionStorage.getItem('catname');
    // console.log(catid)
    // console.log(catname)

    loggedin = sessionStorage.getItem('loggedin');
    url = window.location.href;
    var splitUrl = url.split('/');
    category = splitUrl[splitUrl.length-1];
    const category2 = category.charAt(0).toUpperCase() + category.slice(1);
    $("#topic-add-cat-info").append("<span class=\"h5 col-6 col-lg-10 col-md-8\" id=\"cat-name\">Category: "+category2+"</span>")
    if(loggedin !== 'false') {
        if(loggedin === null){

        }else {
            $("#topic-add-cat-info").append("<a class=\"btn btn-success col-2\" id=\"createnewtopic\" href=\"#ex1\" rel=\"modal:open\">New topic</a>\n\n ");
        }
        }
    $("#addtopic").click(function () {
            tpcname = $("#topic-name").val();
            firstreplay = $(".first-replay-textarea").val();
            if(tpcname==="" || firstreplay === ""){
                $("#emptytpcname").css('display','revert');
            }else {
            $.ajax({
                type:"POST",
                url:"/myforum/addtopic",
                data: {
                    tpcname: tpcname,
                    firstreplay: firstreplay,
                    category: category
                },
                cache: false,
                success: function (data){
                    // console.log(data);
                    location.reload();
                    },
                error: function (xhr, status, error){
                    console.error(xhr);
                }

            });
            }
        });


    var $pagination = $('#pagination'),
        totalRecords = 0,
        records = [],
        displayRecords = [],
        recPerPage = 12,
        page = 1,
        totalPages = 0;
    $.ajax({
        type:'POST',
        url: "/myforum/gettopics",
        data: {
            category:category
        },

        success: function (data) {
            //  console.log(data)
            data = jQuery.parseJSON(data);
            records = data;
            totalRecords = records.length;
            totalPages = Math.ceil(totalRecords / recPerPage);

            apply_pagination()

            // console.log(data);
        }
    });
    function encryptMessage(publicKey) {
        let encoded = getMessageEncoding();
        return window.crypto.subtle.encrypt(
            {
                name: "RSA-OAEP"
            },
            publicKey,
            encoded
        );
    }

    function generate_table() {

        var tr;
        $('.topics-container').html('');
        for (var i = 0; i < displayRecords.length; i++) {
            tr = $(' <div class="row topic-container">');
            tr.append(' <div class="user-circle align-center col-1">\n' +
                '                    <p>'+displayRecords[i].add_by.charAt(0)+'</p>\n' +
                '                </div>\n' +
                '\n' +
                '                <div class="topic_subject col-8 col-lg-10 ">\n' +
                '                    <a class="topic-subject-link" href="/myforum/replies/'+btoa(displayRecords[i].topic_subject)+'">'+displayRecords[i].topic_subject+'</a>\n' +
                '                </div>\n')
            if(displayRecords[i].is_user){
                encryptedID = btoa(displayRecords[i].topic_id);
                test1= atob(displayRecords[i].topic_id);
                tr.append('<button  class=" col-1 btn delete_topic" value="'+encryptedID+'"><i class="material-symbols-outlined">delete</i></button></div>')
            }
            $('.topics-container').append(tr);
        }
    }

        function apply_pagination() {
            $pagination.twbsPagination({
                totalPages: totalPages,
                visiblePages: 6,
                onPageClick: function (event, page) {
                    displayRecordsIndex = Math.max(page - 1, 0) * recPerPage;
                    endRec = (displayRecordsIndex) + recPerPage;

                    displayRecords = records.slice(displayRecordsIndex, endRec);
                    generate_table();

                }
            });
        }

        $('.topics-container').on('click','.delete_topic', function (){
            id = $(this).val();
            id= atob(id);
            $.ajax({
                type:'POST',
                url: "/myforum/deletetopic",
                data: {
                    id:id
                },

                success: function (data) {
                    // console.log(data);
                    location.reload();
                },
                error: function (xhr, status, error){
                    console.error(xhr);
                }

            });

        })

    })
