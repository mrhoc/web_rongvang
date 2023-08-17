$(function () {
    $date=  new Date();
    $tmp=strtotime($date)
    $('#datepicker').attr('placeholder',new Date())
})
$("#datepicker").flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d",
});
$('#datepicker').change(function () {
    console.log($('#datepicker').val())
})
