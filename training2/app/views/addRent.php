
      <h1 class="form-title">Search Rent</h1>
   <form action="index.php?action=addRent" method="POST" class="flex-col"  id="rent-form">
      
        <input type="datetime-local" name="rent_start" id="date_start" min="<?php echo date("Y-m-d H:i");?>"  class="form-input" required value="<?php echo date("Y-m-d H:i");?>" onchange="setEndMin()">
        <input type="datetime-local" name="rent_end" id="date_end" min="<?php echo date("Y-m-d H:i");?>" class="form-input" required value="<?php echo date("Y-m-d H:i", strtotime(date("Y-m-d H:i:s") . " +1 hour"))?>">
        <input type="hidden" value="" name='car_id'>
        <input type='hidden' value='search' name='action'>
        <button type="submit" class="btn">🔍</button>
    </form>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  function setEndMin(){
    const start=document.getElementById('date_start')
    const end=document.getElementById('date_end')
    console.log(end.min)
    end.min=start.value
    end.value=start.value
    
    console.log(end.min)

  }
  console.log("<?php echo date("Y-m-d H:i", strtotime(date("Y-m-d H:i") . " +1 hour"))?>")
    </script>
  