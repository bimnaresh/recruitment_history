@extends('index')

@section('content')
<div id="page-wrapper">
    
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  Send Email to Agent and Employer
              </div>
              <!-- /.panel-heading -->
            {!! Form::open(['route' => 'notification.store', 'class' => '']) !!}
                                        
                <div class="form-group">
                          <div class="col-sm-12 parent-box top-row ">
              	<div class="row">
                                          <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">To:</label>
                                          <div class="col-xs-12">                                    
                                              <select class="form-control" id="to" name="to">
                                                  <option selected="" disabled="">Select </option>
                                                  <option value="a">All</option>
                                                  <option value="e">Employer</option>
                                                   <option value="g">Agent</option>
                                              </select>
                                              @if ($errors->has('to')) <p class="help-block">{{ $errors->first('to') }}</p> @endif
                                            
                                          </div>
                                         
                                      </div>
                              <div class="row">
                                 <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true"> Subject: </label>
                                 <div class="col-xs-12">                                    
                                     <div class="col-sm-12">
                                       <input type="taxt" class="form-control" id="subject" name="subject" value="{{{isset($input['subject'])?$input['subject']:''}}}">
                                       @if ($errors->has('subject')) <p class="help-block">{{ $errors->first('subject') }}</p> @endif
                                            
                                     </div>
                                 </div>
                                
                             </div>
                      
                             <div class="row">
                                 <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true"> Message: </label>
                                 <div class="col-xs-12">                                    
                                     <div class="col-sm-12">
                                       <textarea class="form-control" id="message" name="message" index="1" rows="10">{{{isset($input['message'])?$input['message']:''}}}</textarea>
                                      </div>
                                 </div>
                                
                             </div>
                           </div>
                        </div>


                  <input type="submit" name="submit" class="btn btn-success btn-md" role="button">
               <a href="{{url()}}/notification"><button type="button" class="btn-xs btn-primary">Cancel</button></a>
                                                
              
              </form>



              <!-- /.panel-body -->

          </div>
          <!-- /.panel -->

      </div>
                        
                        
   
                           
</div>
@endsection
