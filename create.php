<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Trip</b></h3>
        </div>
        <form name= "form1" role="form" class="form-horizontal">

            <div class="box-body">


                <input type="hidden" id="tmpno" class="form-control">

                <input type="hidden" id="item_count" class="form-control">

                <div class="form-group-sm">

                    <a onclick="create();" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; CREATE
                    </a>


                </div>
                <br>
                <div id="msg_box"  class="span12 text-center"></div>


                <div class="col-md-12">

                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Entry Name</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Name"  id="e_name" class="form-control Name  input-sm">
                        </div>

                    </div>


                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Attributes</label>
                        <div class="col-sm-2">
                            <textarea  placeholder="Name" cols="10" rows="2" id="Name" class="form-control  input-sm"></textarea>
                        </div>
                    </div>
               
                    
                    
                    
                   

                </div>

            </div>
        </form>
    </div>

</section>
<script src="js/create.js"></script>


<script>newent();</script>




