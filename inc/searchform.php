<form id="search-form" action="" method="GET">
  <div class="filter-order filter-button">
     <input class="button is-primary" id="search-button" type="submit" value="Zoeken">
     <div>
       <span>12344</span>
       <span>Resultaten</span>
     </div>
  </div>
  <div class="filter-order filter-holder">
    <span class="filter-head">Sorteer op</span>
    <div class="filter-select">
      <select name="sort">
        <option value="1">Nieuwste eerst</option>
        <option value="2">Oudste eerst</option>
        <option value="3">Naam (A-Z)</option>
        <option value="4">Naam (Z-A)</option>
        <option value="5">Ruimte oplopend</option>
        <option value="6">Ruimte aflopend</option>
      </select>
    </div>
  </div>
  <div class="filter-order filter-holder">
    <span class="filter-head">Ruimte beschikbaar</span>
    <label class="checkbox filter-cb">
      <input type="checkbox" value="1" id="cb-minus50" name="type"/>
      <label for="cb-minus50">< 50 m²</label>
    </label>
    <label class="checkbox filter-cb">
      <input type="checkbox" value="2" id="cb-50to100" name="type"/>
      <label for="cb-50to100">50 - 100 m²</label>
    </label>
    <label class="checkbox filter-cb">
      <input type="checkbox" value="3" id="cb-100to150" name="type"/>
      <label for="cb-100to150">100 - 150 m²</label>
    </label>
    <label class="checkbox filter-cb">
      <input type="checkbox" value="4" id="cb-150to200" name="type"/>
      <label for="cb-150to200">150 - 200 m²</label>
    </label>
    <label class="checkbox filter-cb">
      <input type="checkbox" value="5" id="cb-200to250" name="type"/>
      <label for="cb-200to250"">200 - 250 m²</label>
    </label>
    <label class="checkbox filter-cb">
      <input type="checkbox" value="6" id="cb-250to300" name="type"/>
      <label for="cb-250to300">250 - 300 m²</label>
    </label>
    <label class="checkbox filter-cb">
      <input type="checkbox" value="7" id="cb-350to400" name="type"/>
      <label for="cb-350to400">350 - 400 m²</label>
    </label>
    <label class="checkbox filter-cb">
      <input type="checkbox" value="8" id="cb-400to450" name="type"/>
      <label for="cb-400to450">400 - 450 m²</label>
    </label>
    <label class="checkbox filter-cb">
      <input type="checkbox" value="9" id="cb-450to500" name="type"/>
      <label for="cb-450to500">450 - 500 m²</label>
    </label>
    <label class="checkbox filter-cb">
      <input type="checkbox" value="10" id="cb-plus500" name="type"/>
      <label for="cb-plus500">500 m² +</label>
    </label>
  </div>
  <div class="filter-order filter-holder">
    <span class="filter-head">Tijd beschikbaar</span>
    <div class="filter-select">
      <select name="tijd">
        <option value="">Alles weergeven</option>
        <option value="< 1 maand">< 1 maand</option>
        <option value="1 tot 3 maanden">1 tot 3 maanden</option>
        <option value="3 tot 5 maanden">3 tot 5 maanden</option>
        <option value="5 tot 12 maanden">5 tot 12 maanden</option>
        <option value="1 jaar +">1 jaar +</option>
      </select>
    </div>
  </div>
  <div class="filter-order filter-holder">
    <span class="filter-head">Type gebouw</span>
    <label class="checkbox filter-cb d-flex justify-space-between align-items-center">
      <div>
        <input type="checkbox" value="Woonruimte" id="cb-woonruimte" name="type1" <?php echo $checkbox1 ?>/>
        <label for="cb-woonruimte">Woonruimte</label>
      </div>
      <div class="filter-amount">(72)</div>
    </label>
    <label class="checkbox filter-cb d-flex justify-space-between align-items-center">
      <div>
        <input type="checkbox" value="Kantoor" id="cb-kantoor" name="type2" <?php echo $checkbox2 ?>/>
        <label for="cb-kantoor">Kantoor</label>
      </div>
      <div class="filter-amount">(85)</div>
    </label>
    <label class="checkbox filter-cb d-flex justify-space-between align-items-center">
      <div>
        <input type="checkbox" value="Winkel" id="cb-winkel" name="type3" <?php echo $checkbox3 ?>/>
        <label for="cb-winkel">Winkel</label>
      </div>
      <div class="filter-amount">(45)</div>
    </label>
    <label class="checkbox filter-cb d-flex justify-space-between align-items-center">
      <div>
        <input type="checkbox" value="Horeca" id="cb-horeca" name="type4" <?php echo $checkbox4 ?>/>
        <label for="cb-horeca">Horeca</label>
      </div>
      <div class="filter-amount">(37)</div>
    </label>
    <label class="checkbox filter-cb d-flex justify-space-between align-items-center">
      <div>
        <input type="checkbox" value="Industrie" id="cb-industrie" name="type5" <?php echo $checkbox5 ?>/>
        <label for="cb-industrie">Industrie</label>
      </div>
      <div class="filter-amount">(25)</div>
    </label>
  </div>
  <div class="filter-order filter-holder">
    <span class="filter-head">Verdiepingen:</span>
    <div class="filter-select">
      <select name="layers">
        <option value="">Alles weergeven</option>
        <option value="1 verdieping">1 verdieping</option>
        <option value="2 verdiepingen">2 verdiepingen</option>
        <option value="3 verdiepingen">3 verdiepingen</option>
        <option value="4 verdiepingen">4 verdiepingen</option>
        <option value="5+ verdiepingen">5+ verdiepingen</option>
      </select>
    </div>
  </div>
  <div class="filter-order filter-holder">
    <span class="filter-head">Parkeermogelijkheid</span>
    <div class="filter-select">
      <select name="parkeer">
        <option value="">Alles weergeven</option>
        <option value="Ja">Ja</option>
        <option value="Nee">Nee</option>
        <option value="Beperkt">Beperkt</option>
        <option value="Betaald">Betaald</option>
      </select>
    </div>
  </div>
</form>