<form action="/profile/changeImgs" enctype='multipart/form-data' method="post">
    <label for="file">Upload Profile Img:</label>
    <input type="file" name="profile_img_url" id="file">

    <label for="file">Upload Cover Img:</label>
    <input type="file" name="cover_img_url" id="file">

    <br>
    <input type="submit" value="Upload"/>
    <input type='hidden' name='MAX_FILE_SIZE' value='100000000' />
</form>