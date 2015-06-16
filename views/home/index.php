<form action="/post/savePost" method="POST" class="form-horizontal">
  <fieldset>
    <legend>Add Post</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Title</label>
      <div class="col-lg-10">
        <input type="text" name="title" class="form-control" id="inputEmail" placeholder="Type a title">
      </div>
    </div>

    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Body</label>
      <div class="col-lg-10">
        <textarea class="form-control" name="body" rows="3" id="textArea" style="margin: 0px -3.84375px 0px 0px; width: 424px; height: 104px;"></textarea>
      </div>
    </div>


    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>