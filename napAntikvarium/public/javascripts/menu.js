function menu() {
  let x = document.getElementById('menusav');
  x.innerHTML="";
  let elem = document.createElement('div');
  elem.innerHTML = `
    <a href="/napAntikvarium/views/fooldal.html" class="active">Nap antikvárium</a>
    <a href="/napAntikvarium/views/Konyvkereso.html">könyvek</a>
    <a href="/napAntikvarium/views/Filmkereso.html">cd/dvd</a>
    <a href="/napAntikvarium/views/kapcsolat.html">kapcsolat</a>
    <a href="/napAntikvarium/views/felhasznalo.html">felhasználó</a>
    <a href="/napAntikvarium/views/kosar.html">kosár</a>
    <a href="/napAntikvarium/views/regisztracio.html" id="logOut">kijelentkezés</a>

    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  `;
  x.appendChild(elem);
}
menu()


//reszponzív menü
function myFunction() {
    let x = document.getElementById("menusav");
    if (x.className === "menu") {
      x.className += " responsive";
    } else {
      x.className = "menu";
    }
}