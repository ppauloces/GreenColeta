var form1 = document.getElementById("form1");
var form2 = document.getElementById("form2");

var radioButton1 = document.getElementById("usuario");
radioButton1.checked = true;
document.getElementById("label-usuario").style.color = "black";
var radioButton2 = document.getElementById("coletor");

radioButton1.addEventListener("click", function() {
  form1.style.display = "block";
  form2.style.display = "none";
  document.getElementById("label-usuario").style.color = "black";
  document.getElementById("label-coletor").style.color = "#9e9e9e";
});

radioButton2.addEventListener("click", function() {
  form1.style.display = "none";
  form2.style.display = "block";
  document.getElementById("label-coletor").style.color = "black";
  document.getElementById("label-usuario").style.color = "#9e9e9e";
});

/*
$(document).ready(function() {
  $('select').formSelect();

  $.ajax({
    url: '/states',
    type: 'GET',
    dataType: 'json',
    success: function(data) {
      var options = '';
      data.forEach(function(state) {
        options += '<option value="' + state.id + '">' + state.name + '</option>';
      });
      $('#states').append(options);
      $('#states').formSelect();
      $('#states_collector').append(options);
      $('#states_collector').formSelect(); // Atualiza o select de estados
    }
  });

  $('#states').on('change', function() {
    var stateId = $(this).val();
    if (stateId) {
      $.ajax({
        url: '/cities/' + stateId,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          var options = '';
          data.forEach(function(city) {
            options += '<option value="' + city.id + '">' + city.name + '</option>';
          });
          $('#cities').html(options);
          $('#cities').formSelect(); // Atualiza o select de cidades
        }
      });
    } else {
      $('#cities').html('<option value="" disabled selected>Selecione uma cidade</option>');
      $('#cities').formSelect(); // Atualiza o select de cidades
    }
  });


});*/