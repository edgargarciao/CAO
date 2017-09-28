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
    printPags();
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



function printPags(){

/******************************
* HIDDEN TABLE ITEMS
******************************/
  var tableCourses, tr, td, i;
  tableCourses = document.getElementById("Cursos");
  tr = tableCourses.getElementsByTagName("tr");
  for (i = 6; i < tr.length; i++) {
    tr[i].style.display = "none";
  }

  
/******************************
* ADD PAGES NUMBERS
******************************/

  var canPags = Math.ceil(tr.length / 5);
  var ulPages = document.getElementById("pags");
    
  /******************************
  * ADD PREVIOUS BUTTON
  ******************************/
  
  var iLiPrevious = document.createElement('li');
  iLiPrevious.setAttribute('class', 'disabled');
  iLiPrevious.setAttribute('onclick', 'previousPage()');  
  iLiPrevious.setAttribute('id', 'previous');
  var iSpan = document.createElement('span');
  iSpan.setAttribute('class', 'glyphicon glyphicon-chevron-left');
  iLiPrevious.appendChild(iSpan);
  pags.appendChild(iLiPrevious);
 
  /******************************
  * ADD NUMBER BUTTON
  ******************************/
  for(var j = 0;j < canPags;j++){
      var ili = document.createElement('li');
      ili.setAttribute('id', 'pg-'+(j+1));
      ili.setAttribute('onclick', 'changePage(this.id)');
      if (j == 0){
          ili.setAttribute('class', 'active');
      }
      var iSpanLi = document.createElement('span');
      var nodeValueLi = document.createTextNode(j+1);
      iSpanLi.appendChild(nodeValueLi);
      ili.appendChild(iSpanLi);
      pags.appendChild(ili);
  }

  /******************************
  * ADD NEXT BUTTON
  ******************************/

  var iLiNext = document.createElement('li');
  iLiNext.setAttribute('id', 'next');
  iLiNext.setAttribute('onclick', 'nextPage('+canPags+')');
  var iSpanNext = document.createElement('span');
  iSpanNext.setAttribute('class', 'glyphicon glyphicon-chevron-right');
  iLiNext.appendChild(iSpanNext);
  pags.appendChild(iLiNext);

}

function previousPage(){
  var ulPages = document.getElementById("pags");
  var ulLis   = ulPages.getElementsByTagName("li");
  for(var i = 0;i<ulLis.length;i++){
    alert(ulLis[i].value);
  }
  alert("previousPage");
}

function nextPage(canPags){
  var ulPages = document.getElementById("pags");
  var ulLis   = ulPages.getElementsByTagName("li");
  for(var i = 0;i<ulLis.length;i++){
    if(ulLis[i].getAttribute("class") == 'active'){
      var idLi = ulLis[i].id.split("-")[1];
      ulLis[i].removeAttribute('class');
      var ulNext = ulLis[i+1];
      ulNext.setAttribute('class', 'active');

      if(idLi == (canPags-1)){       

        document.getElementById("next").setAttribute('class', 'disabled'); 
      }
      document.getElementById("previous").removeAttribute('class');

      /******************************
      * SHOW TABLE ITEMS
      ******************************/
      var tableCourses, tr, td, i;
      tableCourses = document.getElementById("Cursos");
      tr = tableCourses.getElementsByTagName("tr");
      for (i = idLi; i < tr.length; i++) {
        tr[i].style.display = "none";
      }


      break;
    }
  
    //alert("--> "+iSpan.value);
  }

  alert("nextPage");
}

function changePage(idPage){
}

