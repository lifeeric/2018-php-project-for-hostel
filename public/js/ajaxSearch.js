$(document).ready(function() {
    $('#search').keyup(function() {
        var name = $('#search').val();
        if( name === null )
        {
            $('.ajaxSearch').html('No Result');
        }
        $.ajax({
            url:  '../includes/ajaxS.php',
            method: 'POST',
            data: { search : name },
            success: function() {
                $('.ajaxSearch').html(html).show();
            }
        });
    });
});

