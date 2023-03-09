<div id="sales" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" style = "background: #823E39">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title center"><i class = "fa fa-key" style = "color: #ffffff"></i>Select Year Sales</h4>
        </div>
         <div class="modal-body">
             <div class="padd">

                  <form class="form-horizontal" method="post" action="sales_monthly.php">  
          
                   <div class="form-group">
                      <label class="control-label col-lg-3" for="inputPassword">Year</label>
                      <div class="col-lg-7">
                        <select name="year" class = "form-control">         
                         <?php $years = range(1900, strftime("%Y", time())); rsort($years); ?>
                          <?php foreach($years as $year) : ?>
                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                          <?php endforeach; ?>        
                        </select>
                      </div>
                    </div>
                  <div class="col-md-3">
                  </div>  
                  <div class="col-md-7">
                    <button type="submit" style = "background: #823E39" class="btn btn-primary pull-right">Display</button> 
                  </div><br>
                  </form>

          
              </div>
          </div>
        <div class="modal-footer" style = "background: #823E39">
        </div>        
    </div>
    </div>
</div>