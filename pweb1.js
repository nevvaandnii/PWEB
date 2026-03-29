const menuIcon = document.getElementById("menu-icon");
const menuList = document.getElementById("menu-list");

menuIcon.addEventListener("click", () => {
    menuList.classList.toggle("hidden");
})
// document.addEventListener("DOMContentLoaded", function() {
//   const panel = document.getElementById("filterPanel");
//   const openBtn = document.getElementById("openFilter");
//   const closeBtn = document.querySelector(".close-btn");

//   openBtn.onclick = function() {
//     panel.style.right = "0";
//   };

//   closeBtn.onclick = function() {
//     panel.style.right = "-100%";
//   };

//   // BONUS: klik luar untuk close
//   window.onclick = function(e) {
//     if (e.target === panel) {
//       panel.style.right = "-100%";
//     }
//   };
//   function closePanel() {
//   document.getElementById("filterPanel").style.right = "-100%";
// }
// });