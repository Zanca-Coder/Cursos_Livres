  <!--Footer-->
  <footer class="bg-light text-lg-left fixed-bottom">
           <!-- Copyright -->
      
      <!-- Copyright -->
    </footer>
    <!--Footer-->
    
  </body>

  <!-- MDB -->
  <script type="text/javascript" src="<?=URL;?>public/MDB/js/mdb.min.js"></script>
  <script src="<?=URL;?>public/js/axios.min.js"></script> 
  <script src="<?=URL;?>public/js/libs.js"></script> 
    <?php 
    if (isset($this->js)) 
    {
        foreach ($this->js as $js)
        {
            echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
        }
    }
    ?>
</html>