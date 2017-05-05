$(document).ready(
    function(){
        $('button.portal').on('click', function(e){
            var portal = "http://pesquisa.bvsalud.org/portal";
            var query  = encodeURIComponent($(this).parent().siblings('.query').text());
            var filter = encodeURIComponent($(this).parent().siblings('.filter').text());
            var expr = ( filter != '*' && filter != '' ) ? '?q='+query+' AND '+filter : '?q='+query;

            window.open(portal+expr, '_blank');
        });

        $('button.search').popover({
            html : true,
            placement : 'bottom',
            title: labels[LANG]['VIEW_ON'],
            trigger: 'manual',
            content: function() {
                var query  = encodeURIComponent($(this).parent().siblings('.query').text());
                var filter = encodeURIComponent($(this).parent().siblings('.filter').text());
                var origin = $(this).val();
                var portal = "http://pesquisa.bvsalud.org/portal";
                var expr   = ( filter != '*' && filter != '' ) ? '?q=' + query + ' AND ' + filter : '?q=' + query;
                var html   = '<a href="' + origin + expr + '" target="_blank">' + labels[LANG]['ORIGIN_SITE'] + '</a><br /><a href="' + portal + expr + '" target="_blank">' + labels[LANG]['VHL_PORTAL'] + '</a>';

                return html;
            }
        });

        $('button.combine').popover({
            html : true,
            placement : 'bottom',
            title: labels[LANG]['OPERATOR'],
            trigger: 'manual',
            content : '<a class="operator">AND</a> | <a class="operator">OR</a> | <a class="operator">AND NOT</a>'
        });

        $(this).on('click', 'a.operator',
            function(){
                var operator = $(this).text();
                var query    = $(this).parents().siblings('.query').text();
                var filter   = $(this).parents().siblings('.filter').text();
                var search   = $("input[name='q']").val();

                filter = ( filter !== '' && filter !== '*' ) ? ' AND ' + filter : '';
                search = ( search !== '' ) ? search + ' ' + operator + ' ' : '';

                $("input[name='q']").val(search +  '(' + query + filter + ')');
                $(this).parents().siblings('button.combine').click();
            }
        );

        $(this).on('click', function(e){
            if ( ! $(e.target).is('.combine, .search') ) {
                $('button.combine, button.search').popover('hide');
            } else {
                var id;

                if ( e.target.nodeName == 'BUTTON' ) {
                  id = $(e.target).attr('id');
                  $(e.target).popover('toggle');
                }
                else {
                  id = $(e.target).parent().attr('id');
                  $(e.target).parent().popover('toggle');
                }

                if ( $(e.target).is('.combine') ) {
                  $('button.combine:not(#'+id+'), button.search').popover('hide');
                }

                if ( $(e.target).is('.search') ) {
                  $('button.combine, button.search:not(#'+id+')').popover('hide');
                }
            }
        });
    }
);