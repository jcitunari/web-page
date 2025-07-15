
$(window).load(function() {
  $('#loadPage').fadeOut("slow");
});

$(window).on("load",function() {
    $(window).scroll(function() {
      var windowBottom = $(this).scrollTop() + $(this).innerHeight();
      $(".hexagon").each(function() {
        let objectBottom = $(this).offset().top + $(this).outerHeight();
        if (objectBottom < windowBottom) {
          $('.counter').each(function() {
    var $this = $(this),
        countTo = $this.attr('data-count');
    
    $({ countNum: $this.text()}).animate({
      countNum: countTo
    },
    {
      duration: 1500,
      easing:'linear',
      step: function() {
        $this.text(Math.floor(this.countNum));
      },
      complete: function() {
        $this.text(this.countNum);
        //alert('finished');
      }
  
    });  
    
  });
        } else {
          // Objeto fuera de la vista
        }
      });
    }).scroll();
  });

  

function executeProcess() {
    
    const myButton = document.getElementById('submit');
    //form.submit();
    myButton.textContent = 'Ejecutando proceso...';
     //myButton.setAttribute("disabled", "");
     
    
}
  