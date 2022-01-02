// $(document).ready(function() {
//   $(".navbar__link").click(function(e) {                 // User clicks nav link
//     e.preventDefault();                                // Stop loading new link
//     let url = this.href;                               // Get value of href
//     console.log(url);
//     $(".navbar__link.active").removeClass('active');         // Clear current indicator
//     $(this).addClass('active');                       // New current indicator
  
//     $('.container-fluid').remove();                          // Remove old content
//     $('.main__container').load(url + ' .container-fluid').hide().fadeIn('slow'); // New content

//   });
  
//   $(".btn-insert").click(function(e) {                 // User clicks nav link
//     e.preventDefault();                                // Stop loading new link
//     let url = this.href;                               // Get value of href
//     console.log($(this)); //
 
  
//     $(".container-fluid").remove();                          // Remove old content
//     $(".main__container").load(url + ' .container-fluid').hide().fadeIn('slow'); // New content
// });
 
// })
