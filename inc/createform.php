<form id="create-form" action="inc/create.php" method="POST">
  <div id="top">
    <div>
      <span>Naam advertentie* :</span>
      <input type="text" name="addname">
    </div>
    <div>
      <span>Foto toevoegen :</span>
      <input type="file" name="photo">
    </div>
  </div>
  <div id="mid">
    <div>
      <span>Straatnaam* :</span>
      <input type="text" name="street">
    </div>
    <div>
      <span>Huisnummer* :</span>
      <input type="text" name="number">
    </div>
    <div>
      <span>Postcode* :</span>
      <input type="text" name="areacode">
    </div>
    <div>
      <span>Stad* :</span>
      <input type="text" name="city">
    </div>
    <div>
      <span>Type gebouw :</span>
        <select name="type">
        <option value="">Maak een keuze</option>
        <option value="School">School</option>
        <option value="Kantoor">Kantoor</option>
        <option value="Winkel">Winkel</option>7
        <option value="Horeca">Horeca</option>
        <option value="Industrie">Industrie</option>
        <option value="Woonruimte">Woonruimte</option>
      </select>
    </div>
    <div>
      <span>Tijd beschikbaar :</span>
      <select name="time">
        <option value="">Maak een keuze</option>
        <option value="< 1 maand">< 1 maand</option>
        <option value="1 tot 3 maanden">1 tot 3 maanden</option>
        <option value="3 tot 5 maanden">3 tot 5 maanden</option>
        <option value="5 tot 12 maanden">5 tot 12 maanden</option>
        <option value="1 jaar +">1 jaar +</option>
      </select>
    </div>
    <div>
      <span>Bouwjaar :</span>
      <input type="text" name="year">
    </div>
    <div>
      <span>Ruimte (m²) :</span>
      <input type="text" name="space">
    </div>
    <div>
      <span>Verdiepingen:</span>
      <select name="layers">
        <option value="">Maak een keuze</option>
        <option value="1">1 verdieping</option>
        <option value="2">2 verdiepingen</option>
        <option value="3">3 verdiepingen</option>
        <option value="4">4 verdiepingen</option>
        <option value="5+">5+ verdiepingen</option>
      </select>
    </div>
    <div>
      <span>Parkeergelegenheid :</span>
      <select name="parking">
        <option value="">Maak een keuze</option>
        <option value="Ja">Ja</option>
        <option value="Nee">Nee</option>
        <option value="Beperkt">Beperkt</option>
        <option value="Betaald">Betaald</option>
      </select>
    </div>
  </div> 
  <div id="bot">
    <p>Beschrijving* :</p>
    <textarea name="description" cols="100" rows="10"></textarea>
  </div>
  <input type="submit" id="create-button" value="Plaats advertentie">
</form>