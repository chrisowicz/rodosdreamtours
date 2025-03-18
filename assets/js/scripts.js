(function() {

  const menuToggle = document.querySelector('#menu-toggle');
  const menuClose = document.querySelector('#menu-close');
  const close = document.querySelector('#main');
  const mainNav = document.querySelector('#main-nav');
  const lists = mainNav.querySelectorAll('.menu-item-has-children');
  const header = document.querySelector('#header');
  const rezervationToggle = document.querySelector('.rezervation-toggle');
  const rezervationSection = document.querySelector('#book-a-trip');
  const rezervationCloseSection = document.querySelector('#close-book-a-trip');
  const quick_contact_small_toggle = document.querySelector('#quick-contact-toggle');
  const quick_contact_small_content = document.querySelector('#qc-content');

  
  for (const item of lists) {

    const link = item.querySelector('a');
    const subMenu = item.querySelector('.sub-menu');
    
    
    
    link.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      subMenu.classList.toggle('open');
    });
    
    
    close.addEventListener('click', function(e) {
      subMenu.classList.remove('open');
    });
  }

  if(window.screen.width > 992) {
    window.addEventListener('scroll', function() {
      if(this.document.documentElement.scrollTop >= 60) {
        header.classList.add('scroll');
      } else {
        header.classList.remove('scroll');
      }
    }, false);
  }


  // rezervationToggle.addEventListener('click', function(e) {
  //   e.preventDefault();
  //   document.body.classList.toggle('no-scroll');
  //   rezervationSection.classList.add('open');
  // });
  // rezervationCloseSection.addEventListener('click', function(e) {
  //   document.body.classList.toggle('no-scroll');
  //   rezervationSection.classList.remove('open');
  // });

  menuToggle.addEventListener('click', function() {
    this.classList.toggle('icon-close');
    document.body.classList.toggle('no-scroll');
    mainNav.classList.toggle('open');
  });

  quick_contact_small_toggle.addEventListener('click', function() {
    this.classList.toggle('icon-quick-contact-close');
    quick_contact_small_content.classList.toggle('flex');
  });


  // if(window.screen.width < 992 ) {
  // }


  // if(window.screen.width < 992 ) {

  //   const mainNav = document.querySelector('#menu-menu-glowne');
  //   const lists = mainNav.querySelectorAll('.menu-item-has-children');
    
  //   for (const item of lists) {

  //     const link = item.querySelector('a');
  //     const subMenu = item.querySelector('.sub-menu');

      
  //     link.addEventListener('click', function(e) {
  //       e.preventDefault();
        
  //       subMenu.classList.toggle('open');
  //       this.parentElement.classList.toggle('rotate');
  //     });
  //   }
    
  // }

})();