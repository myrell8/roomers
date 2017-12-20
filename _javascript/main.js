document.addEventListener('DOMContentLoaded', () => {
  console.log('Hello Bulma!')
})

$('.dropdown').click(function() {
  $(this).toggleClass('is-active')
})

// $(window).click(e => {
//   console.log(e.target.classList.value)
//   if (e.target.classList.value.indexOf('dropdown-trigger') !== -1) return
//   if ($('.dropdown.is-active').length > 0) {
//     $('.dropdown').removeClass('is-active')
//   }
//   // close all open dropdowns if didnt click on trigger
//   // if (e.target.classList.value.indexOf('dropdown-trigger') === -1) {
//   //   $('.dropdown').removeClass('is-active')
//   // }
// })
