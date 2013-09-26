<section class="magazine">
        <div class="nam_issue container">
            <header class="page-header">
                <h1>Movies in Your list</h1>
            </header>
        </div>
</section> 

<section class="container">

    <?php
         $this->table->set_heading('Number', 'Movie', 'Actions');
         echo $this->table->generate($moviesList);

    ?>

    <?php 
       echo anchor('movies/addMovie/'. $list_id , 'Add a New Movie to This List!');
    ?>

    </div>
</section>
