$(document).ready(function () {
  // $(selector).val();
  $("button[type=submit]").click(function (e) {
    e.preventDefault();
    $date = $("input[name='date']").val();
    $time = $("input[name='time']").val();
    $guests = $("input[name='guests']").val();
    $additional = $("textarea").val();
    $name = $("input[name='name']").val();
    $email = $("input[name='email']").val();
    $phone = $("input[name='phone']").val();
    $.ajax({
      url: 'reserve.php',
      type: 'POST',
      data: {
        date: $date,
        time: $time,
        guests: $guests,
        additional: $additional,
        name: $name,
        email: $email,
        phone: $phone,
      },
      success: function (msg) {
        alert('Email Sent');
        $date = $("input[name='date']").val("");
        $time = $("input[name='time']").val("");
        $guests = $("input[name='guests']").val("");
        $additional = $("textarea").val("");
        $name = $("input[name='name']").val("");
        $email = $("input[name='email']").val("");
        $phone = $("input[name='phone']").val("");
      }
    })
  });
});