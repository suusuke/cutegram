<script type="text/javascript">
$(document).ready(function() {
    $("#loading").bind("ajaxSend", function(){
        $("#list").html();
        $(this).show();
    }).bind("ajaxComplete", function(){
        $(this).hide();
    });

    $("#more_link").click(function() {
        var max_tag_id = '';
        if ($("#max_tag_id").length) {
            max_tag_id = $("#max_tag_id").val();
        }
        
        $.post('/cutegram/?/ajax/'+max_tag_id, {
            
        }, function(result, status) {
            $("#list").html(result);
        });
    });

    $("#more_link").click();
});
</script>


    <div id="list"></div>
    <div id="pagenation">
      <a href="#" id="more_link">More...</a>
    </div>
    <div id="loading">Loading content...</div>

