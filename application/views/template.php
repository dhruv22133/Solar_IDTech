<!DOCTYPE html>
<html>
  <!-- include your header view here -->
  <?php $this->load->view('Admin/Include/Header'); ?>
  
   <body>
    <!-- include your Menue view here -->
    <?php $this->load->view('Admin/Include/Menu'); ?>
    <div id='whateverworks'>
      <?= $contents ?>
    </div>

 <div id='footer'>
    <!-- include your footer view here -->
    <?php $this->load->view('Admin/Include/Footer'); ?>
 </div>
 
 </body>

</html>