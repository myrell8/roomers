<form id="search-form" action="" method="GET">
  <div>
    <span>Ruimte beschikbaar:</span>
    <select name="ruimte">
      <option value="">Alles weergeven</option>
      <option value="1">< 50 m²</option>
      <option value="2">50 - 100 m²</option>
      <option value="3">100 - 150 m²</option>
      <option value="4">150 - 200 m²</option>
      <option value="5">200 - 250 m²</option>
      <option value="6">250 - 300 m²</option>
      <option value="7">300 - 350 m²</option>
      <option value="8">350 - 400 m²</option>
      <option value="9">400 - 450 m²</option>
      <option value="10">450 - 500 m²</option>
      <option value="11">500 m² +</option>
    </select>
  </div>
  <div>
  <span>Tijd beschikbaar:</span>
  <select name="tijd">
    <option value="">Alles weergeven</option>
    <option value="< 1 maand">< 1 maand</option>
    <option value="1 tot 3 maanden">1 tot 3 maanden</option>
    <option value="3 tot 5 maanden">3 tot 5 maanden</option>
    <option value="5 tot 12 maanden">5 tot 12 maanden</option>
    <option value="1 jaar +">1 jaar +</option>
  </select>
  </div>
  <div>
    <span>Type gebouw:</span>
    <select name="type">
      <option value="">Alles weergeven</option>
      <option value="School">School</option>
      <option value="Kantoor">Kantoor</option>
      <option value="Winkel">Winkel</option>
      <option value="Horeca">Horeca</option>
      <option value="Industrie">Industrie</option>
      <option value="Woonruimte">Woonruimte</option>
    </select>
  </div>
  <div>
  <span>Verdiepingen:</span>
  <select name="verdiepingen">
    <option value="">Alles weergeven</option>
    <option value="1 verdieping">1 verdieping</option>
    <option value="2 verdiepingen">2 verdiepingen</option>
    <option value="3 verdiepingen">3 verdiepingen</option>
    <option value="4 verdiepingen">4 verdiepingen</option>
    <option value="5+ verdiepingen">5+ verdiepingen</option>
  </select>
  </div>
  <div>
    <span>Parkeermogelijkheid:</span>
    <select name="parkeer">
      <option value="">Alles weergeven</option>
      <option value="Ja">Ja</option>
      <option value="Nee">Nee</option>
      <option value="Beperkt">Beperkt</option>
      <option value="Betaald">Betaald</option>
    </select>
  </div>
  <div>
    <span>Sorteer op:</span>
    <select name="sort">
      <option value="1">Nieuwste eerst</option>
      <option value="2">Oudste eerst</option>
      <option value="3">Naam (A-Z)</option>
      <option value="4">Naam (Z-A)</option>
      <option value="5">Ruimte oplopend</option>
      <option value="6">Ruimte aflopend</option>
    </select>
  </div>
  <input id="search-button" type="submit" value="Zoeken">
</form>