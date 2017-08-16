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

        $('a.add-collection').popover({
            html : true,
            placement : 'right',
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
            id = $(this).closest('td').find('a.add-collection').attr('value');
            title = $(this).closest('tr').find('div.record a').text();
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
                    if ( response.dir == 'INCOMING_FOLDER' )
                        alert(labels[LANG]['DOC_EXISTS']+' '+labels[LANG]['INCOMING_FOLDER']);
                    else
                        alert(labels[LANG]['DOC_EXISTS']+' '+response.dir);
                }else{
                    alert(labels[LANG]['ADD_DOC_FAIL']);
                }
                
                $('.popover').popover('hide');
            });
        });

        $(this).on('click', 'a.related-docs',
            function(e){
                e.preventDefault();

                path = window.location.pathname;
                parts = path.split("/controller/");
                href = parts[0]+"/controller/suggesteddocs/control/business/task/related";

                content = $(this).closest('td').find('div.related_docs');
                title = $(this).closest('td').find('div.record a').text();

                obj = new Object();
                obj.sentence = $.trim(title);

                content.find('.related-list').hide();
                content.find('.related-list').find('small').remove();
                content.find('.related-loading').show();

                $.post( href, obj, function(data) {
                    response = $.parseJSON(data);

                    if(typeof response == 'object') {
                        var html;
                        var before = '<small><ol>';
                        var after = '</ol></small>';

                        html = before;
                        $.each(response, function(index, res) {
                            html += '<li><a href="'+res.docURL+'" target="_blank">'+res.title+'</a></li>';
                        });
                        html += after;

                        content.find('.related-loading').hide();
                        content.find('.related-list').append(html).show();
                    } else {
                        content.find('.related-loading').hide();
                        alert(content.find('.related-alert').text());
                    }
                });
            }
        );

        $( document ).on('change', '.bulkactions', function(e) {
            e.preventDefault();

            option = $('.bulkactions option:selected').attr('class');
            href = $(this).val();

            documents = [];

            $("input:checkbox:checked").each(function(){
                documents.push($(this).val());
            });

            implode = documents.join();

            if ( implode ) {
                if ( 'bulkremovedoc' == option ) {
                    response = confirm(labels[LANG]['REMOVE_DOCS']);
                    if (response == true) {
                        window.location.href = href+'/document/'+implode;
                    }
                } else if ( 'bulkmovedoc' == option ) {
                    window.open(href+'/document/'+implode,'','resizable=no,width=420,height=270');
                }
            }
        });

        $(this).on('click', 'a.operator',
            function(){
                var operator = $(this).text();
                var query    = $(this).parents().siblings('.combine').data('query');
                var filter   = $(this).parents().siblings('.combine').data('filter');
                var search   = $("input[name='q']").val();

                filter = ( filter !== '' && filter !== '*' ) ? ' AND ' + filter : '';
                search = ( search !== '' ) ? search + ' ' + operator + ' ' : '';

                $("input[name='q']").val(search +  '(' + query + filter + ')');
                $(this).parents().siblings('button.combine').click();
            }
        );

        $(document).on('click', function (e) {
            portalPopover();
            searchPopover();
            combinePopover();

            $('[data-toggle="popover"],[data-original-title]').each(function () {
                //the 'is' for buttons that trigger popups
                //the 'has' for icons within a button that triggers a popup
                if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {                
                    (($(this).popover('hide').data('bs.popover')||{}).inState||{}).click = false  // fix for BS 3.3.6
                }

            });
        });

        $('#datatable-search').DataTable( {
            paging: false,
            ordering: false,
            info: false,
            searching: false,
            responsive: true
        } );

        var portalPopover = function () {
            $('button.portal').on('click', function(e){
                var portal = "http://pesquisa.bvsalud.org/portal";
                var query  = encodeURIComponent($(this).data('query'));
                var filter = encodeURIComponent($(this).data('filter'));
                var expr = ( filter != '*' && filter != '' ) ? '?q='+query+' AND '+filter : '?q='+query;

                window.open(portal+expr, '_blank');
            });
        };

        portalPopover();

        var searchPopover = function () {
            $('button.search').popover({
                html : true,
                placement : 'bottom',
                title: labels[LANG]['VIEW_ON'],
                // trigger: 'manual',
                content: function() {
                    var query  = encodeURIComponent($(this).parent().siblings('.search').data('query'));
                    var filter = encodeURIComponent($(this).parent().siblings('.search').data('filter'));
                    var origin = $(this).val();
                    var portal = "http://pesquisa.bvsalud.org/portal";
                    var label  = $(this).attr('data-label');
                    var expr   = ( filter != '*' && filter != '' ) ? '?q=' + query + ' AND ' + filter : '?q=' + query;
                    var html   = '<a href="' + origin + expr + '" target="_blank">' + label + '</a><br /><a href="' + portal + expr + '" target="_blank">' + labels[LANG]['VHL_PORTAL'] + '</a>';

                    return html;
                }
            });
        };

        searchPopover();

        var combinePopover = function () {
            $('button.combine').popover({
                html : true,
                placement : 'bottom',
                title: labels[LANG]['OPERATOR'],
                // trigger: 'manual',
                content : '<a class="operator">AND</a> | <a class="operator">OR</a> | <a class="operator">AND NOT</a>'
            });
        };

        combinePopover();

        var setContentHeight = function () {
            // reset height
            $RIGHT_COL.css('min-height', $(window).height());

            var bodyHeight = $BODY.outerHeight(),
                footerHeight = $BODY.hasClass('footer_fixed') ? 0 : $FOOTER.outerHeight(),
                leftColHeight = $LEFT_COL.eq(1).height() + $SIDEBAR_FOOTER.height(),
                contentHeight = bodyHeight < leftColHeight ? leftColHeight : bodyHeight;

            // normalize content
            contentHeight -= footerHeight + 2;

            $RIGHT_COL.css('min-height', contentHeight);
        };

        $MENU_TOGGLE.on('click', function() { setContentHeight(); });

        setContentHeight();
    }
);
