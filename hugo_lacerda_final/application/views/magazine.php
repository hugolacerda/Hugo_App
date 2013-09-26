<section class="magazine">
        <div class="nam_issue container">
            <header class="page-header">
                <?php 
                    $Rottentomatoes = new Rottentomatoes();
                    $json = $this->Rottentomatoes->test();
                    echo '<h1>'.($json["title"]);
                    echo "  <small>  Audience Score: ".($json["ratings"]["audience_score"])."</small></h1>";
                ?>
            </header>
        </div>
</section> 

<section class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="cover">
                <?php echo '<img src="'.($json["posters"]["original"]).'"/>"'; ?>
            </div>
           
        </div>
      
      <div class="col-md-6">
        <h2><?php echo ($json["title"]); ?></h2> 
        
        <div class="date">
            <?php echo "<p class='lead'> Audience Ratting: " . ($json["ratings"]["audience_score"]) . "%</p>"; ?>
        </div>
        <!-- html_escape($issue->issue_date_publication) -->
        <p>Lorem Ipsum Dolor Set Ammet</p>
        
      </div>

    </div>
</section>
