
var Normal1, Highlight1;
Normal1 = new Image();
Normal1.src = "img/button1_home.png";     /* erste Standard-Grafik */
Highlight1 = new Image();
Highlight1.src = "img/button2_home.png"; /* erste Highlight-Grafik */

var Normal2, Highlight2;
Normal2 = new Image();
Normal2.src = "img/button1_account.png";     /* zweite Standard-Grafik */
Highlight2 = new Image();
Highlight2.src = "img/button2_account.png"; /* zweite Highlight-Grafik */

var Normal3, Highlight3;
Normal3 = new Image();
Normal3.src = "img/button1_logout.png";     /* dritte Standard-Grafik */
Highlight3 = new Image();
Highlight3.src = "img/button2_logout.png"; /* dritte Highlight-Grafik */

var Normal4, Highlight4;
Normal4 = new Image();
Normal4.src = "img/button1_backend.png";     /* vierte Standard-Grafik */
Highlight4 = new Image();
Highlight4.src = "img/button2_backend.png"; /* vierte Highlight-Grafik */

var Normal5, Highlight5;
Normal5 = new Image();
Normal5.src = "img/button1_login.png";     /* vierte Standard-Grafik */
Highlight5 = new Image();
Highlight5.src = "img/button2_login.png"; /* vierte Highlight-Grafik */


/* usw. fuer alle weiteren zu benutzenden Grafiken */

function Bildwechsel (Bildnr, Bildobjekt) {
  window.document.images[Bildnr].src = Bildobjekt.src;
}
