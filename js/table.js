$(document).ready(function(){
$("#Cursos #checkall").click(function () {
        if ($("#Cursos #checkall").is(':checked')) {
            $("#Cursos input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#Cursos input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
    $("[data-toggle=tooltip]").tooltip();
});

function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("Cursos");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {    
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else { 
        tr[i].style.display = "none";
      }
    }
  }
}

    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      if(date_input == null){
        date_input=$('input[name="finalDdate"]');
      }
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })

/* Autocomplete */
$(document).on("focus keyup", "   .autocomplete", function() {

  // Cache useful selectors
  var $input = $(this);
  var $dropdown = $input.next("ul.dropdown-menu");

  // Create the no matches entry if it does not exists yet
  if (!$dropdown.data("containsNoMatchesEntry")) {
    $("input.autocomplete + ul.dropdown-menu").append('<li class="no-matches hidden"><a>No matches</a></li>');
    $dropdown.data("containsNoMatchesEntry", true);
  }

  // Show only matching values
  $dropdown.find("li:not(.no-matches)").each(function(key, li) {
    var $li = $(li);
    $li[new RegExp($input.val(), "i").exec($li.text()) ? "removeClass" : "addClass"]("hidden");
  });

  // Show a specific entry if we have no matches
  $dropdown.find("li.no-matches")[$dropdown.find("li:not(.no-matches):not(.hidden)").length > 0 ? "addClass" : "removeClass"]("hidden");
});


$(document).on("click", "input.autocomplete + ul.dropdown-menu li", function(e) {
  // Prevent any action on the window location
  e.preventDefault();

  // Cache useful selectors
  $li = $(this);
  $input = $li.parent("ul").prev("input");


  // Update input text with selected entry
  if (!$li.is(".no-matches")) {
    var value = $li.text();

    //$input.val(value);
  }
var idUser = $li.attr('id');


var iDiv = document.createElement('div');

iDiv.id =  idUser;
iDiv.className = 'chip';
iDiv.top = "padding: 10px 10px 10px 10px;";

var node = document.createTextNode(value);
var iImg = document.createElement('img');
iImg.src = "img/img_avatar.png";
iImg.alt="Person";
iImg.width="96"; 
iImg.height="96";


iDiv.appendChild(node);
iDiv.appendChild(iImg);

//document.getElementsByTagName('body')[0].appendChild(iDiv);

var element = document.getElementById("chipsUsers");
element.appendChild(iDiv);


});

function saveEnrol(){


    var elm = {};
    var elms = document.getElementById("chipsUsers").getElementsByTagName("div");
    
    for (var i = 0; i < elms.length; i++) {
        alert("child --> "+elms[i].id);
    }

}