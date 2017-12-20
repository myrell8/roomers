  <div id="mainpage">
    <div id="content-container">
      <div id="search-container">
        <?php include("inc/searchform.php") ?>
      </div>
      <div id="pagination-div">
          <?php for ($x=1; $x <= $pagecount; $x++) { 
            if ($x == $active) {
              $pageclass = "pagination-active";
            }
            else{
              $pageclass = "pagination";
            }
          ?>

            <a href="main.php?page=<?php echo $x; ?>" class="<?php echo $pageclass ?>"><?php echo $x ?></a>
          <?php } ?>
      </div>

        <div class="search-result">
          <?php foreach ($BuildingArray as $item) { 
            $count++;
            if ($item['space'] == 0) {
              $space = "Niet bekend";
            }
            else{
              $space = $item['space'] . " m²"; 
            }
            if ($even == "0") {
              $container = "item-container";
              $resultinfo = "result-info";
              $even = "1";
            }
            else
            {
              $container = "item-container2";
              $resultinfo = "result-info2";
              $even = "0";
            }

            if ($item['picture1'] == NULL) {
              $picture = "img/noimg.jpg";
            }
            else
            {
              $picture = $item['picture1'];
            } ?>

            <div class=<?php echo $container ?>>
              <p><?php echo $count; ?></p>
              <img src=<?php echo $picture ?> class="result-img">
              <div class=<?php echo $resultinfo ?>>
                <div class="result-title-div">
                  <p>Naam</p>
                  <p>Adres</p>
                  <p>Postcode</p>
                  <p>Beschikbaarheid</p>
                  <p>Ruimte</p>
                  <p>Eigenaar</p>
                </div>
                <div class="result-div">
                  <p class="result-name"><?php echo e($item['name']); ?></p>
                  <p><?php echo e($item['street'] . " " . $item['strnumber']); ?></p>
                  <p><?php echo e($item['areacode']); ?></p>
                  <p><?php echo $item['renttime']; ?></p>
                  <p><?php echo e($space); ?></p>
                  <p><?php echo e($item['firstName'] . " " . $item['lastName']); ?></p>
                </div>
                <div class="result-div-buttons">
                  <a class="info-button" href="details.php?id=<?php echo $item['buildingID']; ?>">Meer info</a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
          <div id="pagination-div">
          <?php for ($x=1; $x <= $pagecount; $x++) { 
            if ($x == $active) {
              $pageclass = "pagination-active";
            }
            else{
              $pageclass = "pagination";
            }
          ?>

            <a href="main.php?page=<?php echo $x; ?>" class="<?php echo $pageclass ?>"><?php echo $x ?></a>
          <?php } ?>
        </div>
      </div> 
    </div>