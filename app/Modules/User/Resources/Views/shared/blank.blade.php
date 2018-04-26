@extends('admin::layout')

@section('content')
    <div class="row">
            {{--<h3 class="page-header">Vacancy Announcement</h3>--}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary shadow-z-2">
                        <div class="panel-heading">
                            Create
                            <a href="#" style="float:right;color:white;margin-top:1px;" class=" btn btn- btn-outline  btn-xs">
                                <i class="fa fa-backward">
                                </i>&nbsp;Cancel
                            </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="row">
                               <div class="col-lg-11">
                                   <form class="form-horizontal">
                                     <fieldset>
                                       <div class="form-group">
                                         <label for="inputEmail" class="col-md-2 control-label">Email</label>

                                         <div class="col-md-10">
                                           <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                         </div>
                                       </div>

                                      <div class="form-group">
                                        <label for="inputFile" class="col-md-2 control-label">File</label>
                                        <div class="col-md-6">
                                            <div class="col-sm-6">
                                               <div class="thumbnail img-wrap">
                                                   <span class="close" onclick="confirmFirst()"><img src="{{asset('asset/images/close.png')}}" alt="close"/></span>
                                                   <a class="standAloneFacnyBox" href="{{asset('asset/lib/filemanager/dialog.php?type=1&field_id=fileVal')}}">
                                                       <img src="http://localhost:8080/asset/uploads/newModel.jpg" alt="CoverImage"  id="previewImage"/>
                                                   </a>
                                               </div>
                                            </div>
                                           <input type="text" disabled="" class="form-control" id="fileVal" value="http://localhost:8080/asset/uploads/newModel.jpg">
                                        </div>
                                      </div>
                                       <div class="form-group">
                                         <label for="inputPassword" class="col-md-2 control-label">Password</label>

                                         <div class="col-md-10">
                                           <input type="password" class="form-control" id="inputPassword" placeholder="Password">

                                           <!--
                                           <div class="checkbox">
                                             <label>
                                               <input type="checkbox"> Checkbox
                                             </label>
                                             <label>
                                               <input type="checkbox" disabled> Disabled Checkbox
                                             </label>
                                           </div>
                                           <br>

                                           <div class="togglebutton">
                                             <label>
                                               <input type="checkbox" checked> Toggle button
                                             </label>
                                           </div>
                                           -->
                                         </div>
                                       </div>
                                       <div class="form-group" style="margin-top: 0;"> <!-- inline style is just to demo custom css to put checkbox below input above -->
                                         <div class="col-md-offset-2 col-md-10">
                                           <div class="checkbox">
                                             <label>
                                               <input type="checkbox"> Checkbox
                                             </label>
                                             <label>
                                               <input type="checkbox" disabled=""> Disabled Checkbox
                                             </label>
                                           </div>
                                         </div>
                                       </div>
                                       <div class="form-group">
                                         <div class="col-md-offset-2 col-md-10">
                                           <div class="togglebutton">
                                             <label>
                                               <input type="checkbox" checked=""> Toggle button
                                             </label>
                                           </div>
                                         </div>
                                       </div>
                                       <div class="form-group">
                                         <label for="inputFile" class="col-md-2 control-label">File</label>

                                         <div class="col-md-10">
                                           <input type="text" readonly="" class="form-control" placeholder="Browse...">
                                           <input type="file" id="inputFile" multiple="">
                                         </div>
                                       </div>

                                     <div class="form-group">
                                        <label for="inputFile" class="col-md-2 control-label">File</label>
                                        <div class="col-md-6">
                                            <div class="col-sm-6">
                                               <div class="thumbnail img-wrap">
                                                   <span class="close" onclick="confirmFirst()"><img src="{{asset('asset/images/close.png')}}" alt="close"/></span>
                                                   <a class="standAloneFacnyBox" href="{{asset('asset/lib/filemanager/dialog.php?type=1&field_id=fileVal')}}">
                                                       <img src="http://localhost:8080/asset/uploads/newModel.jpg" alt="CoverImage"  id="previewImage"/>
                                                   </a>
                                               </div>
                                            </div>
                                           <input type="text" disabled="" class="form-control" id="fileVal" value="http://localhost:8080/asset/uploads/newModel.jpg">
                                        </div>
                                      </div>

                                       <div class="form-group">
                                         <label for="textArea" class="col-md-2 control-label">Textarea</label>

                                         <div class="col-md-10">
                                           <textarea class="form-control" rows="3" id="textArea"></textarea>
                                           <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                                         </div>
                                       </div>
                                       <div class="form-group">
                                         <label class="col-md-2 control-label">Radios</label>

                                         <div class="col-md-10">
                                           <div class="radio radio-primary">
                                             <label>
                                               <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                               Option one is this
                                             </label>
                                           </div>
                                           <div class="radio radio-primary">
                                             <label>
                                               <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                               Option two can be something else
                                             </label>
                                           </div>
                                         </div>
                                       </div>
                                       <div class="form-group">
                                         <label for="select111" class="col-md-2 control-label">Select</label>

                                         <div class="col-md-10">
                                           <select id="select111" class="form-control">
                                             <option>1</option>
                                             <option>2</option>
                                             <option>3</option>
                                             <option>4</option>
                                             <option>5</option>
                                           </select>
                                         </div>
                                       </div>
                                       <div class="form-group">
                                         <label for="select222" class="col-md-2 control-label">Select Multiple</label>

                                         <div class="col-md-10">
                                           <select id="select222" multiple="" class="form-control">
                                             <option>1</option>
                                             <option>2</option>
                                             <option>3</option>
                                             <option>4</option>
                                             <option>5</option>
                                           </select>
                                         </div>
                                       </div>
                                       <div class="form-group">
                                         <div class="col-md-10 col-md-offset-2">
                                           <button type="button" class="btn btn-default">Cancel</button>
                                           <button type="submit" class="btn btn-primary">Submit</button>
                                         </div>
                                       </div>
                                     </fieldset>
                                   </form>
                               </div>
                               <!-- /.col-lg-6 (nested) -->
                           </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
    </div>
<!-- /.row -->

@stop