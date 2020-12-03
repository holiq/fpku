<?php echo view('head'); ?>
  <div class="container mt-2 contact">
	<? if(isset($alert)): ?>
	<? endif; ?>
	<h1 class="text-center mt-2 mb-5">Contacts Us</h1>
	<form action="contact_act.php" method="post">
	  <div class="row">
	    <div class="col-md-6">
          <div class="wrap-input">
            <input class="input" type="text" name="name" required>
            <span class="focus-input" data-placeholder="NAME"></span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="wrap-input">
            <input class="input" type="email" name="email" required>
            <span class="focus-input" data-placeholder="EMAIL"></span>
          </div>
        </div>
      </div>
      <div class="wrap-input">
        <textarea class="input" name="message" required></textarea>
        <span class="focus-input" data-placeholder="MESSAGE"></span>
      </div>
      <input type="submit" class="btn btn-dark btn-block" value="Send Message">
    </form>
    <?php echo view('modalLogout'); ?>
  </div>
<?php echo view('footer'); ?>