var url;
var docs = [];

$( document ).ready(
    function(){
        $( "#reference" ).change(
            function(e){
                e.preventDefault();

                reference = $( this ).val();
                url = window.location.pathname + '/task/reference/type/' + reference;

                if ( reference == 'mydocuments' ) {
                    $( ".profiles" ).hide();
                    $( ".docs-folder" ).show();
                    $( "#docsfolder" ).val('');
                }
                else if ( reference == 'myprofiledocuments' ) {
                    $( ".docs-folder" ).hide();
                    $( ".profiles" ).show();
                    $( "#profile" ).val('');
                }
                else if ( reference == 'orcidworks' ) {
                    $( ".docs-folder" ).hide();
                    $( ".profiles" ).hide();
                    loadData( url, e.type );
                }
                else {
                    $( ".docs-folder" ).hide();
                    $( ".profiles" ).hide();
                }
            }
        )

        $( "#docsfolder" ).change(
            function(e){
                e.preventDefault();
                folder = $( this ).val();

                if ( folder ) {
                    href = url + '/folder/' + folder;
                    loadData( href, e.type );
                }
            }
        )

        $( "#profile" ).change(
            function(e){
                e.preventDefault();
                profile = $( this ).val();

                if ( profile ) {
                    href = url + '/profile/' + profile;
                    loadData( href, e.type );
                }
            }
        )

        $( this ).on( "change", "#tab_config input[type='checkbox']", function(e) {
                e.preventDefault();

                size = arrayLength(docs);

                if ( size == 10 ) {
                    if ( $(this).is(":checked") ){
                        alert(labels[LANG]['MAX_DOCS']);
                        $(this).prop('checked', false);
                        return false;
                    }
                }

                id = $( this ).attr("id");
                val = $( this ).val();

                if ( $( this ).is(":checked") ){
                    docs[id] = val;
                } else {
                    delete docs[id];
                }

                size = arrayLength(docs);
                $( ".count" ).text(size);
            }
        )

        $( this ).on( "click", "#tab_config .paginate_button a", function(e) {
                e.preventDefault();
                href = $( this ).attr("href");
                loadData( href );
            }
        )

        $( this ).on( "click", "#tab_config button.submit", function(e) {
                e.preventDefault();

                size = arrayLength(docs);

                if ( size > 0 ) {
                    data = $.extend({}, docs);
                    obj = new Object();
                    obj.suggestions = data;
                    href = window.location.pathname + '/task/suggestions';

                    $('#loading').show();
                    
                    $('html, body').animate({
                        scrollTop: $("#loading").offset().top
                    }, "fast");

                    $.post( href, obj, function(data) {
                        if(data == true){
                            location.reload();
                        }else{
                            $('#loading').hide();
                            alert(labels[LANG]['SD_FAIL']);
                        }
                    });
                }
            }
        )

        $('button.add-collection').popover({
            html : true,
            placement : 'left',
            title: labels[LANG]['COLLECTIONS'],
            // trigger: 'manual',
            content : function() {
                return $('#docsfolderlist').html();
            }
        });

        $( document ).on('change', '.docsfolderlist', function(e) {
            e.preventDefault();

            path = window.location.pathname;
            parts = path.split("/controller/");
            href = parts[0]+"/controller/servicesplatform/control/business/task/addDoc";

            folder = $(this).val();
            text = $('.docsfolderlist option:selected').text();
            id = $(this).closest('td').find('button.add-collection').val();
            title = $(this).closest('tr').find('a').text();
            url = $(this).closest('tr').find('a').attr('href');
            author = $(this).closest('tr').find('small').text();

            obj = new Object();
            obj.url = $.trim(url);
            obj.source = 'pesquisa.bvsalud.org';
            obj.author = $.trim(author);
            obj.title = $.trim(title);
            obj.id = $.trim(id);
            obj.userTK = unescape(getCookie('userTK'));

            $.post( href, obj, function(data) {
                response = $.parseJSON(data);

                if(data == true){
                    href = parts[0]+"/controller/directories/control/business/task/movedoc";

                    obj = new Object();
                    obj.mode = 'persist';
                    obj.document = $.trim(id);
                    obj.fromDirectory = 0;
                    obj.moveToDirectory = folder;

                    $.post( href, obj, function(data) {
                        alert(labels[LANG]['ADD_DOC_SUCCESS']+' '+text);
                    });
                }else if(typeof response == 'object'){
                    alert(labels[LANG]['DOC_EXISTS']+' '+response.dir);
                }else{
                    alert(labels[LANG]['ADD_DOC_FAIL']);
                }
                
                $('.popover').popover('hide');
            });
        });

        function loadData(url, type, obj) {
            $('#loading').show();
            
            $(".result").load( url + ' .result', obj, function() {
                if ( 'change' == type ) {
                    docs = [];
                    $( ".count" ).text(0);
                } else{
                    for (var key in docs) {
                        size = arrayLength(docs);
                        $( ".count" ).text(size);
                        $('#'+key).prop('checked', true);
                    }
                }                

                $('#loading').hide();
            });
        }

        function arrayLength(arr) {
            obj = $.extend({}, arr);
            size = Object.keys(obj).length;
            return size;
        }

        function getCookie(name) {
          var value = "; " + document.cookie;
          var parts = value.split("; " + name + "=");
          if (parts.length == 2) return parts.pop().split(";").shift();
        }
    }
);
