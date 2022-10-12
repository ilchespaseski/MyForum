$(document).ready(function () {

    url = window.location.href;
    var splitUrl = url.split('/');
    topic = splitUrl[splitUrl.length-1];



    var $pagination = $('#pagination'),
        totalRecords = 0,
        records = [],
        displayRecords = [],
        recPerPage = 12,
        page = 1,
        totalPages = 0;
    $.ajax({

        type:"POST",
        url:"/myforum/getreplies",
        data: {
            topic: topic
        },

        success: function (data) {
            // console.log(data);
            data = jQuery.parseJSON(data);
            records = data;
            totalRecords = records.length;
            totalPages = Math.ceil(totalRecords / recPerPage);
            apply_pagination()

            // console.log(data);
        }
    });

    function generate_table() {
        var tr;
        $('.replies-container').html('');
        for (var i = 0; i < displayRecords.length; i++) {
            tr = $(' <div class="row topic-container">');
            tr.append(' <div class="user-circle align-center col-1">\n' +
                '                    <p>'+displayRecords[i].add_by.charAt(0)+'</p>\n' +
                '                </div>\n' +
                '\n' +
                '                <div class="topic_subject col-8 col-lg-10 ">\n' +
                '                    <p>'+displayRecords[i].reply_content+'</p>\n' +
                '                </div>\n')
            if(displayRecords[i].is_user){
                encryptedID = btoa(displayRecords[i].reply_id);
                test1= atob(displayRecords[i].reply_id);
                tr.append('<button  class=" col-1 btn delete-replay" value="'+encryptedID+'"><i class="material-symbols-outlined">delete</i></button></div>')
            }
            $('.replies-container').append(tr);


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



    $('#addreply').click(function (){
        reply = $(".replay-area").val();

        if(reply==="" ){
            $("#isempty").css('display','revert');
        }else {
            $.ajax({
                type:"POST",
                url:"/myforum/addreply",
                data: {
                    topic: topic,
                    reply: reply,
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

    $('.replies-container').on('click','.delete-replay', function (){
        id = $(this).val();
        id= atob(id);
        $.ajax({
            type:'POST',
            url: "/myforum/deletereplay",
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








    // $("#replies-add-cat-info").append("<span class=\"h5 col-10\" id=\"cat-name\">Topics of all users</span>                " +
    //     " <a class=\"btn btn-success col-2\" id=\"createnewtopic\" href=\"#ex1\" rel=\"modal:open\">New topic</a>\n\n ")
    // topicname = sessionStorage.getItem("topicname");
    //
    //
    // var $pagination = $('#pagination'),
    //     totalRecords = 0,
    //     records = [],
    //     displayRecords = [],
    //     recPerPage = 10,
    //     page = 1,
    //     totalPages = 0;
    // $.ajax({
    //     url: "../Database/Autoload.php",
    //     async: true,
    //     dataType: 'json',
    //     type: 'POST',
    //     data: {
    //         topicname: topicname,
    //         query: 'GetPosts'
    //     },
    //     success: function (data) {
    //         records = data;
    //         totalRecords = records.length;
    //         totalPages = Math.ceil(totalRecords / recPerPage);
    //         if (totalRecords > 0) {
    //             apply_pagination()
    //         }
    //         $("#post-header").append('<span class="h5 col-10"> Name of topic: ' + topicname + '</span>' + '<a class="btn btn-success col-2" ' +
    //             'id="createnewtopic" href="#ex1" rel="modal:open">Add a new post</a>');
    //     },
    //     error: function (xhr, status, error) {
    //         console.error(xhr);
    //     }
    //
    // });
    //
    // function generate_table() {
    //     var tr;
    //     $('#post-container').html('');
    //     for (var i = 0; i < displayRecords.length; i++) {
    //         tr = $('<tr/>');
    //         tr.append('<tr class="container"><td><button id="tpcbtn" type="button" ' +
    //             'value="' + displayRecords[i].body + '" >' + displayRecords[i].body +
    //             '</button></td>');
    //         tr.append('<td>' + displayRecords[i].author + '</td>');
    //         $('#post-container').append(tr);
    //     }
    // }
    //
    // function apply_pagination() {
    //     $pagination.twbsPagination({
    //         totalPages: totalPages,
    //         visiblePages: 6,
    //         onPageClick: function (event, page) {
    //             displayRecordsIndex = Math.max(page - 1, 0) * recPerPage;
    //             endRec = (displayRecordsIndex) + recPerPage;
    //
    //             displayRecords = records.slice(displayRecordsIndex, endRec);
    //             generate_table();
    //         }
    //     });
    // }
    //
    // let obj;
    //
    //
    // $("#addpost").click(function () {
    //     post = $("#post").val();
    //     $.ajax({
    //         type: "POST",
    //         url: "../Database/Autoload.php",
    //         data: {
    //             post: post,
    //             topicname: topicname,
    //             query: 'CreatePost'
    //         },
    //         success: function (data) {
    //             location.reload()
    //         },
    //         error: function (xhr, status, error) {
    //             console.error(xhr);
    //         }
    //
    //     });
    // })
    // $("#logout").click(function () {
    //
    //     $.ajax({
    //         type: "POST",
    //         url: "../Database/Autoload.php",
    //         data: {
    //             query: 'Logout',
    //         },
    //         success: function (data) {
    //             location.reload();
    //         },
    //         error: function (xhr, status, error) {
    //             console.error(xhr);
    //         }
    //
    //     });
    // });
});