<nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-radius:  10px 10px 0px 0px;">
  <a class="navbar-brand" href="#">
  	<img src="images/logo/<?=$logo?>" width="60">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item <?=$onsiteIndexSelect?>">
        <a class="nav-link" href="onsite_index.php?lang=<?=$lang?>"><?=$textRegis?></a>
      </li>
      <li class="nav-item <?=$onsiteReceiveSelect?>">
        <a class="nav-link" href="onsite_receive.php?lang=<?=$lang?>"><?=$textReceive?></a>
      </li>
      <li class="nav-item <?=$onsiteReportSelect?>">
        <a class="nav-link" href="onsite_report.php?lang=<?=$lang?>"><?=$textReport?></a>
      </li>
    </ul>
  </div>
</nav>
