// Tabs JS
$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
// Tabs
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
// Calendário e Relógio
    $(".form_datetime").datetimepicker({
        format: "dd MM yyyy - HH:ii P",
        showMeridian: true,
        autoclose: true,
        todayBtn: true
    });
